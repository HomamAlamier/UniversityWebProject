<?php

namespace App\Models;


use App\Models\User;
use Symfony\Component\VarDumper\Caster\EnumStub;
use DB;
use App\Models\DB_Ent;
use Illuminate\Support\Str;
use App\Models\XAdminUserPermissions;
use DateTime;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use App\Models\XToken;
use App\Models\HasXToken;

class XAdminUser extends DB_Ent
{
    const Permissions = "Permissions";

    private $_perms = null;

    public function __construct()
    {
        $this->_perms = new XAdminUserPermissions(null);
    }
    public function permissions() { return $this->_perms; }
    public function setId($id) { $this->_id = $id; }
    public static function fetch($id)
    {
        $admins = DB::select('select * from admins where id = ?', [$id]);
        $retVal = new XAdminUser();
        if ($admins != null && count($admins) > 0)
        {
            $retVal->setData(XAdminUser::Permissions, $admins[0]->permissions);
            $retVal->_id = $id;
        }
        return $retVal;
    }
    public function pushToDB()
    {
        DB::table('admins')->insertGetId([
            'id' => $this->_id,
            'permissions' => $this->getData(XAdminUser::Permissions)
        ]);
    }
}
class XSellerUser extends DB_Ent
{
    const MainAddress = "MainAddress";
    const CompanyName = "CompanyName";
    const StartedAt = "StartedAt";
    const AverageRate = "AverageRate";
    public static function fetch($id)
    {
        $sellers = DB::select('select * from sellers where id = ?', [$id]);
        $retVal = new XSellerUser();
        if ($sellers != null && count($sellers) > 0)
        {
            $retVal->setData(XSellerUser::MainAddress, $sellers->main_address);
            $retVal->setData(XSellerUser::CompanyName, $sellers->company_name);
            $retVal->setData(XSellerUser::StartedAt, $sellers->started_at);
            $retVal->setData(XSellerUser::AverageRate, $sellers->average_rate);
            $retVal->_id = $id;
        }
        return $retVal;
    }
    public function pushToDB()
    {
        DB::table('sellers')->insertGetId([
            'id' => $this->_id,
            'main_address' => $this->getData(XSellerUser::MainAddress),
            'company_name' => $this->getData(XSellerUser::CompanyName),
            'started_at' => $this->getData(XSellerUser::StartedAt),
            'average_rate' => $this->getData(XSellerUser::AverageRate)
        ]);
    }
}
class XUser extends DB_Ent
{
    use HasAttributes, HasXToken, HasTimestamps;

    const Username = "Username";
    const Password = "Password";
    const Email = "Email";
    const Address = "Address";
    const Description = "Description";
    const CreatedAt = "CreatedAt";
    const UserType = "UserType";
    const VerfiyToken = "VerfiyToken";
    const TokenAt = "TokenAt";
    const LastLogin = "LastLogin";
    const AddedBy = "AddedBy";

    const Admin = 0;
    const Seller = 1;
    const Customer = 2;

    const Error_IncorrectParameters = 0;
    const Error_EmailAlreadyExists = 1;

    private $_verified;
    private $_userType;
    private $_userTypeData;
    private $_media;

    protected $primaryKey = 'id';
    private function isNullOrEmpty($str)
    {
        return strlen($str) == 0 || $str == null;
    }
    public function validateData()
    {
        if ($this->isNullOrEmpty($this->getData(XUser::Username))
            || $this->isNullOrEmpty($this->getData(XUser::Email)) 
            || $this->isNullOrEmpty($this->getData(XUser::Password)) 
            || $this->isNullOrEmpty($this->getData(XUser::Address)) 
            || $this->_media == null 
            || ($this->getData(XUser::UserType) != XUser::Customer && $this->_userTypeData == null)
        )
        {
            $this->_errC = XUser::Error_IncorrectParameters;
            return false;
        }
        $q = DB::select('select * from users where email = ?', [
            $this->getData(XUser::Email)
        ]);
        if ($q != null && count($q) > 0)
        {
            $this->_errC = XUser::Error_EmailAlreadyExists;
            return false;
        }
        return true;
    }

    public function media() { return $this->_media; }
    /**
     * @param App\Models\Media $val
     */
    public function setMedia($val) { $this->_media = $val; }
    public function userTypeData() { return $this->_userTypeData; }
    /**
     * @param App\Models\DB_Ent $val
     */
    public function setUserTypeData($val) { $this->_userTypeData = $val; }
    private static function _queryUser($users)
    {
        $retVal = null;
        if ($users != null && count($users) > 0)
        {
            $retVal = new XUser();
            $retVal->setData(XUser::Username, $users[0]->username);
            $retVal->setData(XUser::Password, $users[0]->password);
            $retVal->setData(XUser::Email, $users[0]->email);
            $retVal->setData(XUser::Address, $users[0]->address);
            $retVal->setData(XUser::Description, $users[0]->description);
            $retVal->setData(XUser::CreatedAt, $users[0]->created_at);
            $retVal->setData(XUser::UserType, $users[0]->user_type);
            $retVal->setData(XUser::VerfiyToken, $users[0]->verfiy_token);
            $retVal->setData(XUser::TokenAt, $users[0]->token_at);
            $retVal->setData(XUser::LastLogin, $users[0]->last_login);
            $retVal->setData(XUser::AddedBy, $users[0]->added_by);

            $retVal->_verified = $users[0]->verfied;
            switch ($retVal->_userType) {
                case XUser::Admin:
                    $retVal->_userTypeData = XAdminUser::fetch($retVal->_id);
                    break;
                case XUser::Seller:
                    $retVal->_userTypeData = XSellerUser::fetch($retVal->_id);
                    break;
            }
            $retVal->_media = Media::fetch($users[0]->image_media_id);
            $retVal->_id = $users[0]->id;
            $retVal->setAttribute($retVal->primaryKey, $retVal->_id);
        }
        return $retVal;
    }
    public static function queryUser_Email($email)
    {
        $users = DB::select('select * from users where email = ?', [$email]);
        return XUser::_queryUser($users);
    }
    public static function fetch($id)
    {
        $users = DB::select('select * from users where id = ?', [$id]);
        return XUser::_queryUser($users);
    }
    /**
    * @return bool
    */
    public function pushToDB()
    {
        if (!$this->validateData())
            return false;
        $this->_media->pushToDB();
        $this->setData(XUser::VerfiyToken, Str::random(32));
        $this->setData(XUser::CreatedAt, now());
        $this->setData(XUser::TokenAt, now());
        $this->setData(XUser::LastLogin, now());
        $this->_id = DB::table('users')->insertGetId([
            'username' => $this->getData(XUser::Username),
            'created_at' => $this->getData(XUser::CreatedAt),
            'email' => $this->getData(XUser::Email),
            'address' => $this->getData(XUser::Address),
            'password' => $this->getData(XUser::Password),
            'user_type' => $this->getData(XUser::UserType),
            'description' => $this->getData(XUser::Description),
            'verfiy_token' => $this->getData(XUser::VerfiyToken),
            'token_at' => $this->getData(XUser::TokenAt),
            'verfied' => false,
            'last_login' => $this->getData(XUser::LastLogin),
            'added_by' => $this->getData(XUser::AddedBy),
            'image_media_id' => $this->_media->getId()
        ]);
        if ($this->_id == 0)
            return false;
        $this->setAttribute($this->primaryKey, $this->_id);
        if ($this->getData(XUser::UserType) != XUser::Customer) 
        {
            $this->_userTypeData->setId($this->_id);
            $this->_userTypeData->pushToDB();
        }
        return true;
    }
    
    public function basicInfo()
    {
        $array = [
            "Username" => $this->getData(XUser::Username),
            "CreatedAt" => $this->getData(XUser::CreatedAt),
            "Email" => $this->getData(XUser::Email),
            "Lastlogin" => $this->getData(XUser::LastLogin)
        ];
        if ($this->_userType == XUser::Seller)
        {
            $array["MainAddress"] = $this->_userTypeData->getData(XSellerUser::MainAddress);
            $array["CompanyName"] = $this->_userTypeData->getData(XSellerUser::CompanyName);
            $array["StartedAt"] = $this->_userTypeData->getData(XSellerUser::StartedAt);
            $array["AverageRate"] = $this->_userTypeData->getData(XSellerUser::AverageRate);
        }
        return $array;
    }
}
?>