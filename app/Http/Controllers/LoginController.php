<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use App\User;
use App\Models\AdminPermissions;
use App\Models\Media;
use App\Models\Responses;
use App\Models\XUser;

class LoginController extends Controller {
   private function _login($email, $pass, $mobile, $devName)
   {
      $user = XUser::queryUser_Email($email);
      if ($user == null)
      {
         http_response_code(400);
         return Responses::EmailNotFound();
      }
      if ($user->getData(XUser::Password) == $pass)
      {
         http_response_code(200);
         $a = $user->basicInfo();
         if ($mobile)
         {
            $a['token'] = $user->createTokenSession($devName);
         }
         return $a;
      }
      else
      {
         http_response_code(400);
         return Responses::IncorrectPassword();
      }
   }
   private function _signup($email, $pass, $uname, $address, $desc, $mediaV, $userType)
   {
      $user = new XUser();
      $user->setData(XUser::Username, $uname);
      $user->setData(XUser::Password, $pass);
      $user->setData(XUser::Email, $email);
      $user->setData(XUser::Address, $address);
      $user->setData(XUser::Description, $desc);
      $user->setData(XUser::UserType, XUser::Customer);
      $user->setData(XUser::AddedBy, 0);
      $user->setMedia(new Media(Media::Image, $mediaV));
      if ($user->pushToDB())
      {
         return Responses::Success();
      }
      else
      {
         switch ($user->lastErrorCode()) {
            case XUser::Error_EmailAlreadyExists:
               return Responses::EmailAlreadyExists();
            case XUser::Error_IncorrectParameters:
               return Responses::IncorrectRequest();
         }
      }
   }
   public function webLogin(Request $request)
   {
      if (!$request->has('email') || !$request->has('password'))
      {
         http_response_code(400);
         return response()->json(Responses::BadRequest());
      }
      return response()->json($this->_login($request->input('email'), $request->input('password'), false, ""));
   }
   public function mobileLogin(Request $request)
   {
      if (!$request->has('email') || !$request->has('password') || !$request->has('devicename'))
      {
         http_response_code(400);
         return response()->json(Responses::BadRequest());
      }
      return response()->json($this->_login($request->input('email'), $request->input('password'), true, $request->input('devicename')));
   }
   public function mobileSignUp(Request $request)
   {
      if (!$request->has('username') || !$request->has('email') || !$request->has('password') || !$request->has('address') || !$request->has('description'))
      {
         http_response_code(400);
         return response()->json(Responses::BadRequest());
      }
      return response()->json($this->_signup($request->input('email'), $request->input('username'), $request->input('password') , $request->input('address') , $request->input('description'), "", XUser::Customer));
   }
}