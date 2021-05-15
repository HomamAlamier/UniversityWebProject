<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class VerfiyController extends Controller
{
    public function index(){
        if (count($_GET) > 0){
            $token = $_GET['token'] ?? null;
            $email = $_GET['email'] ?? null;
            $p = $_GET['p'] ?? null;
            if ($p != null && $p == '1'){
                return view('account-verfiy');
            }
            if ($email != null && $token != null){
                $affected = DB::update('update users set verfiy_token = "", verfied = true where email = ? and verfiy_token = ? and verfied = false',
                [
                    $email, $token
                ]);
                if ($affected > 0){
                    echo "Account Verfied !";
                }
                else {
                    echo "Error verfing account ! maybe old or wrong url ?";
                }
            }
            else {
                return redirect('/account');
            }
        }
        else return redirect('/account');

    }
}
