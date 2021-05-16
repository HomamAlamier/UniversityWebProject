<?php 

namespace App\Models;
use App\Models\LanguageCenter;

class Responses
{
   const E_Success = 0;
   const E_BadRequest = 1;
   const E_IncorrectRequest = 2;
   const E_Email = 3;
   const E_Password = 4;
   const E_EmailExists = 5;
   const E_InvalidToken = 6;
   const E_ExpiredToken = 7;

   
   public static function Success() 
   {
      return ["ErrorCode" => Responses::E_Success
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_Success)];
   }
   public static function IncorrectRequest() 
   {
      return ["ErrorCode" => Responses::E_IncorrectRequest
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_IncorrectRequest)];
   }
   public static function BadRequest() 
   {
      return ["ErrorCode" => Responses::E_BadRequest
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_BadRequest)];
   }
   public static function InvalidToken() 
   {
      return ["ErrorCode" => Responses::E_InvalidToken
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_InvalidToken)];
   }
   public static function TokenExpired() 
   {
      return ["ErrorCode" => Responses::E_ExpiredToken
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_ExpiredToken)];
   }
   public static function EmailNotFound() 
   {
      return ["ErrorCode" => Responses::E_Email
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_Email)];
   }
   public static function EmailAlreadyExists() 
   {
      return ["ErrorCode" => Responses::E_EmailExists
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_EmailExists)];
   }
   public static function IncorrectPassword() 
   {
      return ["ErrorCode" => Responses::E_Password
      , "ErrorMessage" => LanguageCenter::getString(LanguageCenter::English, Responses::E_Password)];
   }
}
?>