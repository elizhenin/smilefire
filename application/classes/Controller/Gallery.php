<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Gallery extends Controller_Tmp
{
    public function action_index()
    {
        $this->title = 'SmileFire! Фотографии';
        $GalleryModel = New Model_Gallery();
        $alias = $this->request->param('alias');
        $id = $this->request->param('id');
        $check = $GalleryModel->GetByIdAlias($id,$alias);
            $parent = $GalleryModel->GetItemById($check['parent_id']);
        if ($check) {
            $current =  $GalleryModel->GetItemById($check['id']);
            if(!empty($current['description'])){
                $this->description = $current['description'];
            }
            if(!empty($current['keywords'])){
                $this->keywords = $current['keywords'];
            }
            if(!empty($current['name'])){
                $this->title = $current['name']. ' - '.$this->title;
            }
            switch ($check['type']) {
                case 'directory':
                    $content = View::factory('gallery/directory');
                    $content->items = $GalleryModel->GetVisibleGallery($check);
                    break;
                case 'alboum':
                    $content = View::factory('gallery/alboum');
                    $content->current = $current;
                    $content->items = $GalleryModel->GetVisibleGallery($check);
                    break;
                case 'image':
                    $content = View::factory('gallery/image');
                    $content->item = $check;
                    break;
                default:
                    throw new HTTP_Exception_404;
            }
        } else throw new HTTP_Exception_404;
        $back = View::factory('gallery/button_back');
        $back->parent = $parent;
        $back->current = $current;
        $content->back = $back;
        $this->content = $content;
        $this->template->top_menu = View::factory('menu_href');
    }
}
