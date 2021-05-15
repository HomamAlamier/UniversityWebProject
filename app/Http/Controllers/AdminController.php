<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\JsonResp;
class AdminController extends Controller
{
    public function view_ManageAdmins(){
        return view('admin.admin_madmins', [
                'array_admins' => DB::select('select * from users,admins where users.id = admins.id')]);
    }
    public function view_ManageSellers(){
        return view('admin.admin_msellers', [
            'array_sellers' => DB::select('select * from users,sellers where users.id = sellers.id')]);
    }
    public function view_ManageUsers() {
        return view('admin.admin_musers', [
            'array_users' => DB::select('select * from users where user_type = 0')
        ]);
    }
    public function postHandle_ManageAdmins(Request $request){
        $action = $request->input('action');
        $uname = $request->input('uname');
        $email = $request->input('email');
        $pass = $request->input('pass');
        $address = $request->input('address');
        $pall = $request->input('pall');
        $pada = $request->input('paddadmin');
        $pads = $request->input('paddseller');
        $pdla = $request->input('pdeladmin');
        $pdls = $request->input('pdelseller');
        $pdlu = $request->input('pdeluser');
        $peds = $request->input('peditseller');
        $peda = $request->input('peditadmin');
        $perms = "";
        if ($pall == 'on'){
            $perms = "PERM_ALL";
        }
        else {
            if ($pada == 'on')
                $perms = $perms . "PERM_ADD_ADMIN,";
            if ($pads == 'on')
                $perms = $perms . "PERM_ADD_SELLER,";
            if ($pdla == 'on')
                $perms = $perms . "PERM_DEL_ADMIN,";
            if ($pdls == 'on')
                $perms = $perms . "PERM_DEL_SELLER,";
            if ($pdlu == 'on')
                $perms = $perms . "PERM_DEL_USER,";
            if ($peds == 'on')
                $perms = $perms . "PERM_EDIT_SELLER,";
            if ($peda == 'on')
                $perms = $perms . "PERM_EDIT_ADMIN,";
        }
        if ($action == "add"){
            $users = DB::select('select * from users where email = ?', [$email]);
            if ($users == null || count($users) == 0){
            $media_id = DB::table('media')->insertGetId(
                ['media_value' => '', 'media_type' => 0]
            );
            $data = [
                    'username' => $uname,
                    'created_at' => date("Y-m-d H:i:s"),
                    'email' => $email,
                    'address' => $address,
                    'password' => $pass,
                    'user_type' => '1',
                    'verfiy_token' => '',
                    'token_at' => date("Y-m-d H:i:s"),
                    'verfied' => '1',
                    'description' => '',
                    'last_login' => date("Y-m-d H:i:s"),
                    'image_media_id' => $media_id,
                    'added_by' => session('uid')
            ];
            $uid = DB::table('users')->insertGetId($data);
            DB::table('admins')->insertGetId([
                    'id' => $uid,
                    'permissions' => $perms
            ]);
            echo (new JsonResp(200, "Success"))->json();
            }
            else {
            echo (new JsonResp(201, "Email is already in use !"))->json();
            }
        }
        else if ($action == "delete"){
            $p = session('perms');
            if ($p->PERM_DEL_ADMIN == false && $p->PERM_ALL == false){
                echo (new JsonResp(603, "Permissions Denied !"))->json();
                return;
            }
            $id = $request->input('id');
            $uid = session('uid');
            DB::table('admins')->where('id', $id)->delete();
            DB::table('sellers')->where('added_by', $id)->update(['added_by' => $uid]);
            DB::table('admins')->where('added_by', $id)->update(['added_by' => $uid]);
            DB::table('users')->where('id', $id)->delete();
            echo (new JsonResp(200, "Success"))->json();
        }
    }
    public function postHandle_ManageSellers(Request $request){
        $action = $request->input('action');
        $uname = $request->input('uname');
        $cname = $request->input('cname');
        $email = $request->input('email');
        $pass = $request->input('pass');
        $address = $request->input('address');
        $startedAt = $request->input('startedat');
        if ($action == "add"){
            $users = DB::select('select * from users where email = ?', [$email]);
            if ($users == null || count($users) == 0){
                $media_id = DB::table('media')->insertGetId(
                    ['media_value' => '', 'media_type' => 0]
                );
                $data = [
                        'username' => $uname,
                        'created_at' => date("Y-m-d H:i:s"),
                        'email' => $email,
                        'address' => $address,
                        'password' => $pass,
                        'user_type' => '2',
                        'verfiy_token' => '',
                        'token_at' => date("Y-m-d H:i:s"),
                        'verfied' => '1',
                        'description' => '',
                        'last_login' => date("Y-m-d H:i:s"),
                        'image_media_id' => $media_id,
                        'added_by' => session('uid')
                ];
                $uid = DB::table('users')->insertGetId($data);
                DB::table('sellers')->insertGetId([
                        'id' => $uid,
                        'started_at' => $startedAt,
                        'main_address' => $address,
                        'company_name' => $cname,
                        'average_rate' => 0
                ]);
                echo (new JsonResp(200, "Success"))->json();
            }
            else {
            echo (new JsonResp(201, "Email is already in use !"))->json();
            }
        }
        else if ($action == 'delete'){
            $p = session('perms');
            if ($p->PERM_DEL_SELLER == false && $p->PERM_ALL == false){
                echo (new JsonResp(603, "Permissions Denied !"))->json();
                return;
            }
            $id = $request->input('id');
            $uid = session('uid');
            DB::table('products')->where('seller_id', $id)->delete();
            DB::table('sellers')->where('id', $id)->delete();
            DB::table('users')->where('id', $id)->delete();
            echo (new JsonResp(200, "Success"))->json();
        }
    }
}
