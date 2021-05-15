<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class DB_Ent extends Model
{
    private $_dataArray = [];
    protected $_id = 0;
    protected $_errC = 0;
    public function getId() 
    {
        return $this->_id;
    }
    public function setData($dataKey, $dataValue)
    {
        $this->_dataArray[$dataKey] = $dataValue;
    }
    public function getData($dataKey)
    {
        if (array_key_exists($dataKey, $this->_dataArray))
            return $this->_dataArray[$dataKey];
        return "";
    }
    public function dataArray()
    {
        return $this->_dataArray;
    }
    public function lastErrorCode()
    {
        return $this->_errC;
    }

    abstract public static function fetch($id);
    abstract public function pushToDB();
    
}

?>