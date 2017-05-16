<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Redirect extends Controller_Tmp
{
    public function action_index()
    {
        $GalleryModel = New Model_Gallery();
        $alias = $this->request->param('alias');
        $check = $GalleryModel->CheckPath($alias);
        if ($check) {
           HTTP::redirect('/fotografii/'.$check['id'].'_'.$check['alias'],301);
        }// else throw new HTTP_Exception_404;
    }
}
