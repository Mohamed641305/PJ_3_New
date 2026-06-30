<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct() {
        $this->middleware( 'guest' );
    }

    protected function validator( array $data ) {
        return Validator::make( $data, [

            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'phone_number' => [ 'required', 'string', 'max:20' ],
            'address' => [ 'required', 'string', 'max:255' ],
            'password' => [ 'required', 'string', 'min:6', 'confirmed' ],
            'profile_image' => [ 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048' ],

        ] );
    }

    protected function create( array $data ) {
        if ( request()->hasFile( 'user_img' ) ) {
            $img = request()->file( 'user_img' );
            $imageName = time() . '_' . $img->getClientOriginalName();
            // اسم فريد
            $img->move( public_path( 'images/users' ), $imageName );
            // حفظ في public/images/users
        } else {
            $imageName = null;
            // لو الصورة اختيارية
        }
        return User::create( [
            'profile_image' => $imageName,
            'name' => $data[ 'name' ],
            'email' => $data[ 'email' ],
            'phone_number' => $data[ 'phone_number' ],
            'address' => $data[ 'address' ],
            'password' => Hash::make( $data[ 'password' ] ),
        ] );
    }
}
