<?php

namespace App\Models;

use App\Models\DB_Ent;
use DB;

class Media extends DB_Ent
{


    const MediaValue = "MediaValue";
    const Image = 0;
    const Other = 1;

    private $_mediaType = Media::Other;
    public function __construct($type, $value)
    {
        $this->_mediaType = $type;
        $this->setData(Media::MediaValue, $value);
    }
    public function type() 
    {
        return $this->_mediaType;
    }
    public static function fetch($id)
    {
        $retVal = new Media(Media::Other, null);
        $q = DB::select('select * from media where media_id = ?', [$id]);
        if ($q != null && count($q) > 0)
        {
            $retVal->setData(Media::MediaValue, $q[0]->media_value);
            $retVal->_mediaType = $q[0]->media_type;
        }
        return $retVal;
    }
    public function pushToDB()
    {
        $mt = $this->_mediaType;
        $mv = $this->getData(Media::MediaValue);
        $this->_id = DB::table('media')->insertGetId([
            'media_value' => $mv, 
            'media_type' => $mt
        ]);
        if ($this->_id == 0)
            return false;
        return true;
    }
}

?>