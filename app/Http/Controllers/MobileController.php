<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\XAdminUser;
use App\Models\XAdminUserPermissions;
use App\Models\XUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MobileController extends Controller
{
    public function handle(Request $request)
    {
        Auth::user();
        $user = XUser::queryUser_Email("owner@laravel.com");
        echo $user->createToken("desktop-test")->plainTextToken;
        return $user->dataJson();
    }
    public function handle2(Request $request)
    {
        $user = new XUser();
        $user->setData(XUser::Username, "TestName");
        $user->setData(XUser::Email, "TestEmail@test.com");
        $user->setData(XUser::Password, "testtesttest");
        $user->setData(XUser::Address, "TestAddress");
        $user->setData(XUser::UserType, XUser::Admin);
        $user->setData(XUser::AddedBy, 0);


        $admin = new XAdminUser();
        $admin->permissions()->setOption(XAdminUserPermissions::ALL, true);
        $user->setUserTypeData($admin);
        $user->setMedia(new Media(Media::Image, ""));

        return $user->pushToDB() ? "True" : "False";
    }
}
