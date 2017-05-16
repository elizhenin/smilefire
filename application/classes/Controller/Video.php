<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Video extends Controller_Tmp
{

    public function action_index()
    {
        $VideoModel = New Model_Video();
        $video_id = $this->request->query('video');
        $this->title = 'SmileFire! Видеозаписи';
        if (empty($video_id)) {
            $content = View::factory('video/index');
            $content->videos = $VideoModel->GetVisible();
        }else{
            $content = View::factory('video/video');
            $content->back = $this->request->referrer();
            $content->video = $VideoModel->GetById($video_id);
            if($content->video['active'] == '0'){
                throw new HTTP_Exception_404;
            }
            $this->title = $content->video['short'].' - '.$this->title;
        }
        $this->content = $content;
        $this->template->top_menu = View::factory('menu_href');
    }
}
