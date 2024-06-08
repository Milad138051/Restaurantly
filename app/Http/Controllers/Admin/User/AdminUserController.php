<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\AdminUserRequest;

class AdminUserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can:admin-user-show');
    }

    public function index(Request $request)
    {
        $admins=User::where('user_type',1)->orderBy('id','DESC')->paginate(10)->withQueryString(); 
        return view('admin.user.admin-user.index', compact('admins'));

    }

    public function create()
    {
        return view('admin.user.admin-user.create');

    }

    public function store(AdminUserRequest $request, User $user, ImageService $imageService)
    {
         $inputs = $request->all();
        //  dd($inputs);

        if($request->hasFile('profile_photo_path'))
        {	
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            
			if($result === false)
            {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            
			}
            
			$inputs['profile_photo_path'] = $result;
        }
		
		$inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 1;
        $user = User::create($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین جدید با موفقیت ثبت شد');
    }


    public function edit(User $user)
    {
        return view('admin.user.admin-user.edit',compact('user'));
    }


    public function update(AdminUserRequest $request, User $user, ImageService $imageService)
    {
         $inputs = $request->all();

        if($request->hasFile('profile_photo_path'))
        {
            if(!empty($user->profile_photo_path))
            {
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if($result === false)
            {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
		
		
        $user->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین سایت شما با موفقیت ویرایش شد');
    }


    public function destroy(User $user, ImageService $imageService)
    {
		 if(!empty($user->profile_photo_path))
            {
                $imageService->deleteImage($user->profile_photo_path);
            }
			
        $user->forceDelete();
        return redirect()->route('admin.user.admin-user.index')->with('swal-success','ایتم مورد نظر با موفقیت حذف شد ');
    }


    public function createAdmin()
    {
        $users = User::where('user_type', 0)->orderBy('id','DESC')->get();
        // dd($users);
        return view('admin.user.admin-user.create-admin',compact('users'));
    }

    public function storeAdmin(Request $request)
    {
		$validated=$request->validate([
            'userIds'=>'required|exists:users,id|array',
            ]);
             
            $ids=$request->userIds;
            // dd($ids);

            User::whereIn('id',$ids)->update([
                'user_type'=>1
            ]);
            
            return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'یوزر ها با موفقیت ثبت شدند');
    }
	
	
    // public function status(User $user)
    // {
    //   $user->status=$user->status==0 ? 1 : 0 ;
    //   $result=$user->save();
    //   if ($result) {
		  
    //     if ($user->status==0) {
    //       return response()->json(['status'=>true,'checked'=>false]);
    //     }else {
    //       return response()->json(['status'=>true,'checked'=>true]);
    //     }
    //   }
	//   else{
    //     return response()->json(['status'=>false]);
    //  }
	// }
	
	public function activation (User $user)
    {
     $user->activation=$user->activation==0 ? 1 : 0 ;
     if($user->activation==1){
        $user->activation_date=now();
     }else{
        $user->activation_date=null;
     }
      $result=$user->save();
      if ($result) {
		  
        if ($user->activation==0) {
          return response()->json(['status'=>true,'checked'=>false]);
        }else {
          return response()->json(['status'=>true,'checked'=>true]);
        }
      }
	  else{
        return response()->json(['status'=>false]);
     }
	}
	
	
	public function roles(User $admin)
	{
		//dd($admin->roles);
	    $roles=Role::all();
	    return view('admin.user.admin-user.roles',compact('admin','roles'));
	}
	
	public function rolesStore(Request $request,User $admin)
	{
		$validated=$request->validate([
		'roles'=>'sometimes|exists:roles,id|array',
		]);
		
		$admin->roles()->sync($request->roles);
		return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'نقش ها با موفقیت ثبت شدند');
	}
	
	
	public function permissions(User $admin)
	{
	    $permissions=Permission::all();
	    return view('admin.user.admin-user.permissions',compact('admin','permissions'));
	}
	
	public function permissionsStore(Request $request,User $admin)
	{
		$validated=$request->validate([
		'permissions'=>'sometimes|exists:permissions,id|array',
		]);
		
		$admin->permissions()->sync($request->permissions);
		return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'دسترسی ها با موفقیت ثبت شدند');
	}

	
}
