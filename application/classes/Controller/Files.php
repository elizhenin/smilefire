<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Files extends Controller
{

    public function action_index()
    {
        $file = htmlspecialchars(trim($this->request->param('alias')));
        $path = explode('/', $file);
        $name = array_pop($path);
        $dir='';
        if(!empty($path))
        {
            foreach($path as $one) $dir.=$one.'/';
        }
        $modelFiles = New Model_Files();
        $file = $modelFiles->GetFile($dir,$name);
        $this->response->headers('Content-type',$file['type']);
        $this->response->body($file['data']);
    }

}