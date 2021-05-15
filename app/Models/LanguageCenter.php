<?php

namespace App\Models;
use App\Models\EnglishLanguage;
class LanguageCenter
{
    const English = 0;
    public static function getString($lang, $id)
    {
        switch ($lang) 
        {
            case LanguageCenter::English:
                return EnglishLanguage::Strings[$id];
            default:
                return "";
        }
    }
}

?>