<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $inputs=$request->validated();
        Category::create($inputs);
        return to_route('admin.category.index')->with('swal-success', 'ایتم با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $inputs=$request->validated();
        $category->update($inputs);
        return to_route('admin.category.index')->with('swal-success', 'ایتم با موفقیت ویرایش شد');   
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->with('swal-success', 'ایتم با موفقیت ویرایش شد');   

    }

    public function status(Category $category)
    {
      $category->status=$category->status==0 ? 1 : 0 ;
      $result=$category->save();
      if ($result) {
        if ($category->status==0) {
          return response()->json(['status'=>true,'checked'=>false]);
        }else {
          return response()->json(['status'=>true,'checked'=>true]);
        }
      }
	  else{
        return response()->json(['status'=>false]);
     }
	}
}
