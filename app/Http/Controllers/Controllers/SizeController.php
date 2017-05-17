<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::all();
        return view('admin.size.listsize', compact('size'));
    }
    public function create()
    {
        $size = Size::all();
        $parent = Size::select('size_name', 'id')->get()->toArray();
        return view('admin.size.addsize', compact('size', 'parent'));
    }
    public function store(Request $request)
    {
        $size = new Size;
        $size->status = $request->status;
        $size->size_name = $request->size;
        $size->save();
        return redirect()->route('size-list.index')
        ->with(['flash_level' => 'primary', 'flash_message' => 'Thêm size thành công']) ;
    }
    public function destroy($id)
    {
          $size = Size::findOrFail($id);
          $size->delete();
          return redirect()->route('size-list.index')
          ->with(['flash_level' => 'primary', 'flash_message' => 'Xóa size thành công']) ;
    }
    public function edit(Request $request)
    {
        $size = Size::find($request->id);
        $parent = Size::select('size_name', 'id')->get()->toArray();
        return view('admin.size.updatesize', compact('size', 'parent'));
    }
    public function xem(Request $request)
    {
          $size = Size::where('id', $request->id)
          ->select('id', 'size_name', 'status', 'created_at', 'updated_at')->get();
          $parent = Size::select('size_name', 'status', 'id')->get()->toArray();
         return view('admin.size.viewsize', compact('size', 'parent'));
    }
    public function update($id, Request $request)
    {
          $size = Size::find($id);
          $size->size_name = $request->size;
          $size->status = $request->status;
          $size->save();
          return redirect()->route('size-list.index')
          ->with(['flash_level' => 'primary', 'flash_message' => 'Cập nhật size thành công']) ;
    }
}
