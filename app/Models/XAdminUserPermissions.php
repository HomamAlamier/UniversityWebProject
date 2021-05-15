<?php 

namespace App\Models;

class XAdminUserPermissions
{
    const ALL = "ALL";
    const AddAdmin = "AddAdmin";
    const AddSeller = "AddSeller";
    const DeleteAdmin = "DeleteAdmin";
    const DeleteSeller = "DeleteSeller";
    const DeleteUser = "DeleteUser";
    const EditAdmin = "EditAdmin";
    private $_boolArray = [];
    public function setOption($constKey, $boolValue)
    {
        $this->_boolArray[$constKey] = $boolValue;
    }
    public function option($constKey)
    {
        return $this->_boolArray[$constKey];
    }
    public function toDB()
    {
        $retVal = "";
        if ($this->_boolArray[XAdminUserPermissions::ALL] == true)
        {
            return "PERM_ALL";
        }
        if ($this->_boolArray[XAdminUserPermissions::AddAdmin] == true)
        {
            $retVal = $retVal . "PERM_ADD_ADMIN";
        }
        if ($this->_boolArray[XAdminUserPermissions::AddSeller] == true)
        {
            $retVal = $retVal . "PERM_ADD_SELLER";
        }
        if ($this->_boolArray[XAdminUserPermissions::DeleteAdmin] == true)
        {
            $retVal = $retVal . "PERM_DEL_ADMIN";
        }
        if ($this->_boolArray[XAdminUserPermissions::DeleteSeller] == true)
        {
            $retVal = $retVal . "PERM_DEL_SELLER";
        }
        if ($this->_boolArray[XAdminUserPermissions::DeleteUser] == true)
        {
            $retVal = $retVal . "PERM_DEL_USER";
        }
        if ($this->_boolArray[XAdminUserPermissions::EditAdmin] == true)
        {
            $retVal = $retVal . "PERM_EDIT_ADMIN";
        }
        return $retVal;
    }
    public function __construct($perms) {
        if ($perms == null || $perms == '')
            return;
        $a = explode(',', $perms);
        foreach($a as $val){
            if ($val == "")
                continue;
            if (strtoupper($val) == 'PERM_ALL')
            {
                $this->setOption(XAdminUserPermissions::ALL, true);
                return;
            }
            else if (strtoupper($val) == 'PERM_ADD_ADMIN')
                $this->setOption(XAdminUserPermissions::AddAdmin, true);
            else if (strtoupper($val) == 'PERM_ADD_SELLER')
                $this->setOption(XAdminUserPermissions::AddSeller, true);
            else if (strtoupper($val) == 'PERM_DEL_ADMIN')
                $this->setOption(XAdminUserPermissions::DeleteAdmin, true);
            else if (strtoupper($val) == 'PERM_DEL_SELLER')
                $this->setOption(XAdminUserPermissions::DeleteSeller, true);
            else if (strtoupper($val) == 'PERM_DEL_USER')
                $this->setOption(XAdminUserPermissions::DeleteUser, true);
            else if (strtoupper($val) == 'PERM_EDIT_ADMIN')
                $this->setOption(XAdminUserPermissions::EditAdmin, true);
        }
    }
}
?>  