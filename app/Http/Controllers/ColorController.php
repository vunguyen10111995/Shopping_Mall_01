<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Models\Colors;

class ColorController extends Controller
{
    public function index()
    {
        $color = Colors::all();
        return view('admin.color.listcolor', compact('color'));
    }
    public function create()
    {
        $color = Colors::all();
        $parent = Colors::select('color_name', 'id', 'Status')->get()->toArray();
        return view('admin.color.addcolor', compact('color', 'parent'));
    }
    public function store(Request $request)
    {
        $color = new Colors;
        $color->color_name = $request->color;
        $color->status = $request->status;
        $color->save();
        return redirect()->route('color-list.index')
        ->with(['flash_level' => 'primary', 'flash_message' => 'Thêm màu thành công']);
    }
    public function destroy($id)
    {
          $color = Colors::findOrFail($id);
          $color->delete();
          return redirect()->route('color-list.index')
          ->with(['flash_level' => 'primary', 'flash_message' => 'Xóa màu thành công']);
    }
    public function edit(Request $request)
    {
        $color = Colors::find($request->id);
        $parent = Colors::select('Color_name', 'id', 'Status')->get()->toArray();
        return view('admin.Color.updatecolor', compact('color', 'parent'));
    }
    public function show(Request $request)
    {
          $color = Colors::where('id', $request->id)
          ->select('id', 'Color_name', 'Status', 'created_at', 'updated_at')->get();
          $parent = Colors::select('Color_name', 'id', 'Status')->get()->toArray();
         return view('admin.Color.viewcolor', compact('color', 'parent'));
    }
    public function update($id, Request $request)
    {
          $color = Colors::find($id);
          $color->Color_name = $request->color;
          $color->Status = $request->status;
          $color->save();
          return redirect()->route('color-list.index')
          ->with(['flash_level' => 'primary', 'flash_message' => 'Cập nhật màu thành công']);
    }
}
