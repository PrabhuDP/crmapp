<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\User;
use App\Models\CompanySettings;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $type = $request->segment(2);
        $url = 'change';
        if( empty($type) ){
            $url = 'profile';
        }
        $params['type'] = $url;
        return view('crm.account.account_index', $params);
    }

    public function get_settings_tab(Request $request)
    {
        $type = $request->type;
        $id = Auth::id();
        $info = User::find($id);
        
        $params = ['type' => $type, 'info' => $info];
        $view = 'crm.account._account_'.$type;
        return view($view, $params);
    }

    public function save(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        if( $type == 'profile' ) {
            $validator   = [
                'first_name'      => [ 'required', 'string', 'max:255' ],
                'email'      => [ 'required', 'string', 'max:255' ],
                'mobile_no'      => [ 'required', 'string', 'max:255' ],
                'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg']
            ];
        }
        //Validate the product
        $validator                     = Validator::make( $request->all(), $validator );
        
        if ($validator->passes()) {
            $id = Auth::id();
            $user = User::find($id);
            $user->name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            if( $request->hasFile( 'profile_image' ) ) {
                $file                       = $request->file( 'profile_image' )->store( 'account', 'public' );
                $user->image                  = $file;
            }
            $user->save();
            $success = 'Account settings saved';
            return response()->json(['error'=>[$success], 'status' => '0']);
        }
        return response()->json(['error'=>$validator->errors()->all(), 'status' => '1']);
    }

    public function company_save(Request $request)
    {
        $type = $request->type;
        if( isset($type ) && ( $type != 'api' && $type != 'link')) {
            if( $type == 'company' ) {
                $validator   = [
                    'site_name' => [ 'required', 'string', 'max:255' ],
                    'site_logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
                    'site_favicon' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
                ];
            } else {
                $validator   = [
                    'current_password' => [ 'required', 'string', 'max:255' ],
                    'password' => ['required', 'confirmed', 'min:8'],
                    'password_confirmation' => ['required', 'min:8'],
                ];
            }
            
            //Validate the product
            $validator                     = Validator::make( $request->all(), $validator );
            
            if ($validator->passes()) {
                $id = Auth::id();
                
                $user = User::find($id);
                if( $type == 'company' ) {
                    $ins['site_name' ] = $request->site_name;
                    $ins['site_url' ] = $request->site_url;
                    if( $request->hasFile( 'site_logo' ) ) {
                        $file                       = $request->file( 'site_logo' )->store( 'account', 'public' );
                        $ins['site_logo']             = $file;
                    }
                    if( $request->hasFile( 'site_favicon' ) ) {
                        $file                       = $request->file( 'site_favicon' )->store( 'account', 'public' );
                        $ins['site_favicon']          = $file;
                    }
                    CompanySettings::whereId($user->company->id)->update($ins);
                    $success = 'Account settings saved';
                    return response()->json(['error'=>[$success], 'status' => '0']);
                } else {
                    if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                        // The passwords matches
                        $success = 'Current password does not match with this password';
                        return response()->json(['error'=>[$success], 'status' => '1']);
                    }
                    $user->password = Hash::make($request->password);
                    $user->save();
                    $success = 'Password changed successfully';
                    return response()->json(['error'=>[$success], 'status' => '0']);
                }
                
                
            }
            return response()->json(['error'=>$validator->errors()->all(), 'status' => '1']);
        } else {
            $id = Auth::id();
            $user = User::find($id);
            if( $type == 'api') {
                $ins['aws_access_key' ] = $request->aws_access_key;
                $ins['aws_secret_key' ] = $request->aws_secret_key;
                $ins['fcm_token' ] = $request->fcm_token;
            } else if($type == 'link') {
                $ins['facebook_url' ] = $request->facebook_url;
                $ins['twitter_url' ] = $request->twitter_url;
                $ins['instagram_url' ] = $request->instagram_url;
            }
            
            CompanySettings::whereId($user->company->id)->update($ins);
            $success = 'Account settings saved';
            return response()->json(['error'=>[$success], 'status' => '0']);
        }
        
    }
}