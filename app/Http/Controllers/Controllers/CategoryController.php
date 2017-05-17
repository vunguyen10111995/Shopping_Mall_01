<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index()
    {
        $parent = Categories::select('cate_name', 'id', 'parent_id')->get()->toArray();
        $cate = Categories::all();
        $categories = Categories::where('parent_id', 0)->get();
        return view('admin.category.listcategory', compact('cate', 'parent', 'categories'));
    }
    public function create()
    {
        $cate = Categories::all();
        $categories = Categories::select('id', 'cate_name')->pluck('cate_name', 'id');
        return view('admin.category.addcategory', compact('cate', 'categories'));
    }
    public function edit(Request $request)
    {
        $category = Categories::find($request->id);
        $categories = Categories::select('id', 'cate_name')->pluck('cate_name', 'id');
        return view('admin.category.updatecategory', compact('category', 'categories'));
    }
    public function store(Request $request)
    {
        $cate= new Categories;
        $cate->cate_name = $request->name;
        $cate->parent_id = $request->catparent;
        $cate->status=$request->status;
        $cate->save();
        return redirect()->route('category-list.index')
        ->with(['flash_level' => 'primary', 'flash_message' => 'Thêm danh mục thành công']) ;
    }
    public function destroy($id)
    {
          $parent = Categories::where('parent_id', $id)->count();
        if ($parent == 0) {
            $cate = Categories::find($id);
            $cate->delete();
            return redirect()->route('category-list.index')
            ->with(['flash_level' => 'primary', 'flash_message' => 'Xoá danh mục thành công']);
        } else {
            return redirect()->route('category-list.index')
            ->with(['flash_level' => 'danger', 'flash_message' => 'Không được xóa danh mục này']);
        }
    }
    public function update($id, Request $request)
    {
        $cate = Categories::find($id);
        $cate->cate_name = $request->cate_name;
        $cate->parent_id = $request->catparent;
        $cate->status = $request->status;
        $cate->save();
          return redirect()->route('category-list.index')
          ->with(['flash_level' => 'primary', 'flash_message' => 'Cập nhật danh mục thành công']) ;
    }
    public function xem(Request $request)
    {
          $category = Categories::where('id', $request->id)
          ->select('cate_name', 'id', 'parent_id', 'created_at', 'updated_at', 'status')->get();
          $parent = Categories::select('Cate_name', 'id', 'parent_id')->get()->toArray();
         return view('admin.category.viewcategory', compact('category', 'parent'));
    }
    public function frontend(Request $request)
    {
        $category = Categories::where('parent_id', 0);
        $cate_parent = Categories::where('parent_id', $request->id);
        return view('frontend.blocks.section-menu', compact('category', 'cate_parent'));
    }
}
