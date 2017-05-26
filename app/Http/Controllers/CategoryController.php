<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use DB;
use App\Models\Factory;

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
    public function store(CategoryRequest $request)
    {
        $cate = new Categories;
        $cate->cate_name = $request->cate_name;
        $cate->parent_id = $request->catparent;
        $cate->status = $request->status;
        $cate->save();

        return redirect()->route('category-list.index')
            ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }
    public function destroy($id)
    {
        $parent = Categories::where('parent_id', $id)->count();
        if ($parent == 0) {
            $cate = Categories::find($id);
            $cate->delete();

            return redirect()->route('category-list.index')
                ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success') ]);
        } else {
            return redirect()->route('category-list.index')
                ->with(['flash_level' => 'danger', 'flash_message' => trans('messages.danger') ]);
        }
    }
    public function update($id, Request $request)
    {
        $cate = Categories::find($id);
        $cate->cate_name = $request->name;
        $cate->parent_id = $request->catename;
        $cate->status = $request->status;
        $cate->save();

        return redirect()->route('category-list.index')
                         ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }
    public function show(Request $request)
    {
        $category = Categories::where('id', $request->id)
            ->select('cate_name', 'id', 'parent_id', 'created_at', 'updated_at', 'status')->get();
        $parent = Categories::select('Cate_name', 'id', 'parent_id')->get()->toArray();

        return view('admin.category.viewcategory', compact('category', 'parent'));
    }


    public function optionCategory($id)
    {
        $productCategory = Product::select(
            'id',
            'product_name',
            'product_image',
            'cate_id',
            'price',
            'saleoff',
            'start_sale',
            'end_sale'
        )->where('cate_id', $id)
        ->get();

        $category = Categories::category();
        $factories = Factory::factory();

        return view('frontend.blocks.listproduct', compact('productCategory', 'category', 'factories'));
    }
}
