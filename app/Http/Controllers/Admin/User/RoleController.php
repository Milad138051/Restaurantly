<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RoleRequest;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:role-show');

    }

    public function index()
    {
		$roles=Role::orderBy('id','desc')->paginate(10)->withQueryString();
        return view('admin.user.role.index',compact('roles'));
    }

    public function create()
    {
		$permissions=Permission::all();
        return view('admin.user.role.create',compact('permissions'));
    }


    public function store(RoleRequest $request)
    {

        $inputs=$request->all();
		$role=Role::create($inputs);
		
		$inputs['permissions']=$inputs['permissions'] ?? [];
		$role->permissions()->sync($inputs['permissions']);
		return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش شما با موفقیت ایجاد شد');

    }


    public function edit(Role $role)
    {
		$permissions=Permission::all();
        return view('admin.user.role.edit',compact('role','permissions'));
    }

 
    public function update(RoleRequest $request, Role $role)
    {
        $inputs=$request->all();
		$role->update($inputs);
		return redirect()->route('admin.user.role.index')->with('swal-success','نقش با موفقیت ویرایش شد');
    }


   public function destroy(Role $role)
    {
        $result = $role->delete();
        return redirect()->route('admin.user.role.index')->with('swal-success', 'نقش شما با موفقیت حذف شد');
    }
	
	
	public function permissionForm(Role $role)
	{
		$permissions=Permission::all();
		return view('admin.user.role.set-permission',compact('role','permissions'));
	}
	
	  public function permissionUpdate(RoleRequest $request, Role $role)
    {
        $inputs = $request->all();
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'دسترسی ها با موفقیت ویرایش شد');

    }
}
