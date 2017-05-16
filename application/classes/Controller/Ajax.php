<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{

    public function action_imageUpload()
    {
        if (HTTP_Request::POST == $this->request->method()) {
            if (isset($_FILES['file'])  && $_FILES['file']['size'] > 0) {
                $Name = $_FILES['file']['name'];
                $tmpName  = $_FILES['file']['tmp_name'];
                $fileType = $_FILES['file']['type'];
                $fp      = fopen($tmpName, 'r');
                $content = fread($fp, filesize($tmpName));
                $content = $content;
                fclose($fp);
                $ext = substr(strrchr($Name, '.'), 1);
                    $filename=time().'.'.$ext;
                DB::insert('files',array('name','data','type','subdir'))
                    ->values(array($filename,$content,$fileType,'uploads/'))
                    ->execute();
                $array = array('filelink' => '/files/uploads/' . $filename);
                echo stripslashes(json_encode($array));
            }
        }
    }
}