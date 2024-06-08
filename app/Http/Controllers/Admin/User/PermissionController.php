<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\PermissionRequest;

class PermissionController extends Controller
{

  public function __construct()
  {
      // $this->middleware('can:permission-show');

  }
    public function index()
    {
		$permissions=Permission::orderBy('id','desc')->paginate(10)->withQueryString();
        return view('admin.user.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.user.permission.create');
    }


    public function store(PermissionRequest $request)
    {
        $inputs=$request->all();
		$permission=Permission::create($inputs);

		return redirect()->route('admin.user.permission.index')->with('swal-success','دسترسی با موفقیت ثبت شد');
    }


    public function edit(Permission $permission)
    {
         return view('admin.user.permission.edit',compact('permission'));

    }


    public function update(PermissionRequest $request, Permission $permission)
    {
        $inputs=$request->all();
		$permission->update($inputs);
		return redirect()->route('admin.user.permission.index')->with('swal-success','دسترسی با موفقیت ثبت شد');
    }

    public function destroy(Permission $permission)
    {
		$result = $permission->delete();
		return redirect()->route('admin.user.permission.index')->with('swal-success','دسترسی با موفقیت حذف شد');

    }
}
