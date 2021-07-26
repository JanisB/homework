<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserEditController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index',[
            'userList' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function update(Request $request, User $user)
    {
        $statusCategory = $user->fill(
            $request->only([
                'name',
                'email',
                'is_admin', 
            ]))->save();
        if($statusCategory){
            return redirect()->route('admin.users.index')
                ->with('success', 'User updated!');
        }
        return back()->with('error', 'User not updated!');
    }
}
