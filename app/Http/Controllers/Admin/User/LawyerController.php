<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\LawyerRequest;
use App\Models\Address;
use App\Models\State;
use App\Models\User;
use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Facades\Hash;


class LawyerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:users-show');

    }

    public function index()
    {
        if (isset(request()->type) and request()->type == '1') {
            $role = Role::find(1);
            $users = $role->users()->paginate(10);

        } elseif (isset(request()->type) and request()->type == '2') {
            $role = Role::find(2);
            $users = $role->users()->paginate(10);
        } else {
            $role = Role::find(1);
            $users = $role->users()->paginate(10);
        }

        return view('admin.user.lawyer.index', compact('users'));
    }

    public function create()
    {
        $states = State::all();
        return view('admin.user.lawyer.create', compact('states'));

    }

    public function getCities(State $state)
    {
        $cities = $state->cities;
        if ($cities != null) {
            return response()->json(['status' => true, 'cities' => $cities]);
        } else {
            return response()->json(['status' => false, 'cities' => null]);
        }
    }

    public function store(LawyerRequest $request, User $user, ImageService $imageService)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->license_number_issue_date, 0, 10);
        $inputs['license_number_issue_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);

        //save profile photo
        if ($request->hasFile('profile_photo_path')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users/lawyers');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false) {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');

            }
            $inputs['profile_photo_path'] = $result;
        }

        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = '1';

        $user = User::create($inputs);

        //create address for user
        Address::create([
            'user_id' => $user->id,
            'city_id' => $inputs['city_id'],
            'state_id' => $inputs['state_id'],
            'address' => $inputs['address'],
            'status' => 1
        ]);

        //change role
        $role_id = $user->lawyer_type == 1 ? 1 : 2;
        $user->roles()->sync($role_id);

        // $details = [
        //     'message' => 'وکیل جدید در سایت ثبت شد',
        // ];
        // $adminUser = User::find(1);
        // $adminUser->notify(new NewUserRegistered($details));

        return redirect()->route('admin.user.lawyer.index')->with('swal-success', 'وکیل با موفقیت ثبت شد');
    }

    public function edit(User $user)
    {
        $states = State::all();
        return view('admin.user.lawyer.edit', compact('user', 'states'));
    }


    public function update(LawyerRequest $request, User $user, ImageService $imageService)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->license_number_issue_date, 0, 10);
        $inputs['license_number_issue_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);

        //save profile photo
        if ($request->hasFile('profile_photo_path')) {
            if (!empty($user->profile_photo_path)) {
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false) {
                return redirect()->route('admin.user.lawyer.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }


        // dd($inputs);
        $user->update($inputs);

        //edit address for user
        $user->address->update([
            'user_id' => $user->id,
            'city_id' => $inputs['city_id'],
            'state_id' => $inputs['state_id'],
            'address' => $inputs['address'],
            'status' => 1
        ]);
        return redirect()->route('admin.user.lawyer.index')->with('swal-success', 'کاربر با موفقیت ویرایش شد');
    }


    public function destroy(User $user, ImageService $imageService)
    {
        if (!empty($user->profile_photo_path)) {
            $imageService->deleteImage($user->profile_photo_path);
        }

        $user->forceDelete();
        return redirect()->route('admin.user.lawyer.index')->with('swal-success', 'ایتم مورد نظر با موفقیت حذف شد ');
    }

    // public function status(User $user)
    // {
    //     $user->status = $user->status == 0 ? 1 : 0;
    //     $result = $user->save();
    //     if ($result) {

    //         if ($user->status == 0) {
    //             return response()->json(['status' => true, 'checked' => false]);
    //         } else {
    //             return response()->json(['status' => true, 'checked' => true]);
    //         }
    //     } else {
    //         return response()->json(['status' => false]);
    //     }
    // }

    public function activation(User $user)
    {
        $user->activation = $user->activation == 0 ? 1 : 0;
        if ($user->activation == 1) {
            $user->activation_date = now();
        } else {
            $user->activation_date = null;
        }
        $result = $user->save();
        if ($result) {

            if ($user->activation == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


}
