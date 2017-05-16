<?php defined('SYSPATH') or die('No direct script access.');

class Model_Files extends Model
{
    public function GetFile($dir,$name)
    {
        $db = DB::select('data','type')
            ->from('files')
            ->where('subdir','=',$dir)
            ->where('name','=',$name)
            ->where('deleted','=',0)
            ->limit(1)
            ->execute()
            ->as_array();
        if(!empty($db[0])){
            $result = $db[0];
            return $result;
        }else return false;
    }

}