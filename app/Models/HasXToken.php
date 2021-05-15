<?php
namespace App\Models;
use DB;
use Illuminate\Support\Str;
use App\Models\XUser;
use DateInterval;
trait HasXToken
{
    private $_token;
    public function createTokenSession($deviceName)
    {
        $token = "";
        do{
            $token = Str::random(32);
        } while(count(DB::select('select devicename from tokenSessions where token = ?', [$token])) > 0);
        session_start();
        $id = $this->getId();
        $_SESSION['userID'] = $id;
        DB::table('tokenSessions')->insertGetId([
            "devicename" => $deviceName,
            "token" => $token,
            "session_id" => session_id(),
            "at" => now(),
            "expire" => now()->add(new DateInterval('PT' . 1 . 'H'))
        ]);
        $this->_token = $token;
        return $token;
    }
    public function getToken()
    {
        return $this->_token;
    }
}


?>