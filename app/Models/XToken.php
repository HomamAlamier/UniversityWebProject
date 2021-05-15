<?php
namespace App\Models;
use DB;
use Illuminate\Support\Str;
use App\Models\XUser;
use DateInterval;
class XToken
{
    const E_Success = 0;
    const E_InvalidToken = 1;
    const E_ExpiredToken = 2;
    public static function restoreSession($token)
    {
        $q = DB::select('select * from tokenSessions where token = ?', [$token]);
        if ($q != null && count($q) > 0)
        {
            if ($q[0]->expire < now())
                return XToken::E_ExpiredToken;
            session_id($q[0]->session_id);
            session_start();
            return XToken::E_Success;
        }
        else
        {
            return XToken::E_InvalidToken;
        }
    }
    public static function user()
    {
        return XUser::fetch($_SESSION['userID']);
    }
}

?>