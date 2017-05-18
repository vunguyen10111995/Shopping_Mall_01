<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        
        return view('admin.User.listuser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.User.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->Name;
        $user->full_name = $request->txtfullname;
        $user->email = $request->txtemail;
        $user->password = bcrypt($request->txtpassword);
        $user->phone = $request->txtphone;
        $user->sex = $request->sex;
        $user->address = $request->txtaddress;
        $user->level = $request->level;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('User.index')
                         ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.User.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->Name;
        $user->full_name = $request->txtfullname;
        $user->email = $request->txtemail;
        $user->phone = $request->txtphone;
        $user->sex = $request->sex;
        $user->address = $request->txtaddress;
        $user->level = $request->level;
        $user->status = $request->status;
        $user->save();
            
        return redirect()->route('User.index')
                         ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('User.index')
                         ->with(['flash_level' => 'success', 'flash_message' => trans('messages.success')]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $keyword = str_replace("%", "[%]", $request->search);
            $user = User::where('full_name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->get();

            return view('admin.User.partial-user', compact('user'));
        }
    }
}
