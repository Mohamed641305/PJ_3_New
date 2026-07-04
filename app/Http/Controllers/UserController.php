<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index() {
        $users = User::all();

        $usercount = User::count();

        return view( 'user', compact( 'users', 'usercount' ) );
    }

    function show( $id ) {
        $user = User::findOrFail( $id );
        return view( 'user.show', [ 'result'=> $user ] );
    }

    function delete( $id ) {
        $user = User::findOrFail( $id );
        $user->delete();
        return redirect()->route( 'user' )->with( 'success', 'User deleted successfully.' );
    }

    function create() {
        return view( 'user.create' );
    }

    public function store( Request $request ) {
        $validated = $request->validate( [
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'address' => 'required|max:255',
        ] );

        if ( $request->hasFile( 'profile_image' ) ) {
            $img = $request->file( 'profile_image' );
            $imgName = rand( 1000, 9999 ) . '_' . time() . '.' . $img->extension();
            $img->move( public_path( 'images/users' ), $imgName );
        } else {
            $imgName = 'default.jpg';
        }

        User::create( [
            'profile_image' => $imgName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'phone_number' => $request->phone_number,
            'address' => $request->address,

            // لو موجودين هياخدهم، ولو مش موجودين هيستخدم القيم الافتراضية
            'role' => $request->input( 'role', 'user' ),
            'status' => $request->input( 'status', 1 ),
        ] );

        return redirect()
        ->route( 'user' )
        ->with( 'success', 'User added successfully.' );
    }

    public function edit( $id ) {
        $user = User::findOrFail( $id );
        return view( 'user.edit', [ 'result' => $user ] );
    }

    public function update( Request $request, $id ) {
        $validated = $request->validate( [
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'address' => 'required|max:255',
            'role' => 'required|in:user,admin',
            'status' => 'required|in:0,1',
        ] );

        $user = User::findOrFail( $id );

        if ( $request->hasFile( 'profile_image' ) ) {

            if (
                $user->profile_image != 'default.jpg' &&
                File::exists( public_path( 'images/users/' . $user->profile_image ) )
            ) {
                File::delete( public_path( 'images/users/' . $user->profile_image ) );
            }

            $img = $request->file( 'profile_image' );
            $imgName = rand( 1000, 9999 ) . '_' . time() . '.' . $img->extension();
            $img->move( public_path( 'images/users' ), $imgName );

        } else {
            $imgName = $user->profile_image;
        }

        $user->update( [
            'profile_image' => $imgName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled( 'password' )
            ? Hash::make( $request->password )
            : $user->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->input( 'status', $user->status ),
        ] );

        return redirect()
        ->route( 'user' )
        ->with( 'success', 'User updated successfully.' );
    }
}
