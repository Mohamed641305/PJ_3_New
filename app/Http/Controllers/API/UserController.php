<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function index() {
        $user = UserResource::collection( User::all() );
        $data = [
            'msg' => 'All Users',
            'status' => 200,
            'data' => $user
        ]; 
        return response()->json( $data );
    }

    public function show( $id ) {
        $user = User::find( $id );
        if ( !$user ) {
            return response()->json( [
                'msg' => 'User not found',
                'status' => 404,
                'data' => null
            ] );
        } else {
            $data = [
                'msg' => 'User Details',
                'status' => 200,
                'data' => new UserResource( $user )
            ];
        }
        return response()->json( $data );
    }

    public function delete( Request $request ) {
        $id = $request->id;
        $user = User::find( $id );
        if ( $user ) {

            if ( File::exists( public_path( '/images/user/' . $user->user_img ) ) ) {
                File::delete( public_path( '/images/user/' . $user->user_img ) );
            }
            $user->delete();
            $data = [
                'msg' => 'User deleted successfully',
                'status' => 200,
                'data' => null
            ];
        } elseif ( !$user ) {
            $data = [
                'msg' => 'User not found',
                'status' => 404,
                'data' => null
            ];
        }

        return response()->json( $data );
    }

    public function store( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'user_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11",
            'address' => 'required|max:255'
        ] );

        if ( $validator->fails() ) {
            $data = [
                'msg' => 'Validation failed',
                'status' => 422,
                'data' => $validator->errors()
            ];
            return response()->json( $data, 422 );
        }

        if ( $request->hasFile( 'user_img' ) ) {
            $img = $request->file( 'user_img' );
            $imgName = random_int( 1, 10000 ) . '_' . time() . '.' . $img->extension();
            $img->move( public_path( 'images/users' ), $imgName );
        } else {
            $imgName = 'default.jpg';
            // صورة افتراضية داخل public/images/users
        }
        $user = User::create( [
            'user_img' => $imgName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'phone_number' => $request->phone_number,
            'address' => $request->address

        ] );
        $data = [
            'msg' => 'User created successfully',
            'status' => 201,
            'data' => new UserResource( $user )
        ];
        return response()->json( $data );
    }

    public function update( Request $request, $id ) {

        $user = User::find( $id );
        if ( !$user ) {
            $data = [
                'msg' => 'User not found',
                'status' => 404,
                'data' => null
            ];
            return response()->json( $data, 404 );
        }

        if ( $user ) {
            $validator = Validator::make( $request->all(), [
                'user_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
                'phone_number' => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11",
                'address' => 'required|max:255'
            ] );

            if ( $validator->fails() ) {
                $data = [
                    'msg' => 'Validation failed',
                    'status' => 422,
                    'data' => $validator->errors()
                ];
                return response()->json( $data, 422 );
            }
            if ( $request->hasFile( 'user_img' ) ) {
                if ( File::exists( public_path( '/images/users/' . $user->user_img ) ) ) {
                    File::delete( public_path( '/images/users/' . $user->user_img ) );
                }
                $img = $request->file( 'user_img' );
                $imgName = random_int( 1, 10000 ) . '_' . time() . '.' . $img->extension();
                $img->move( public_path( 'images/users' ), $imgName );
            } else {
                $imgName = $user->user_img;
                // الاحتفاظ بالصورة القديمة إذا لم يتم تحميل صورة جديدة
            }

            $user->update( [
                'user_img' => $imgName,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make( $request->password ) : $user->password,
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ] );

            $data = [
                'msg' => 'User updated successfully',
                'status' => 200,
                'data' => new UserResource( $user )
            ];
        }

        return response()->json( $data );
    }
}
