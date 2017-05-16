<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Tmp
{

    public function action_index()
    {
        $trash = $this->request->query('module');
        if (!empty($trash)) {
            throw new HTTP_Exception_404;
        }
        $content = view::factory('welcome/index');
        $modelNews = New Model_News();
        $modelGallery = New Model_Gallery();
        $modelVideo = New Model_Video();
        $lastnews = View::factory('welcome/news');
        $lastnews->items = $modelNews->GetVisible(5);
        $content->lastnews = $lastnews;
        $randomgallery = View::factory('welcome/gallery');
        $randomgallery->items = $modelGallery->GetRandomAlboums(79,3);
        $content->randomgallery = $randomgallery;
        $randomvideo = View::factory('welcome/video');
        $randomvideo->video = $modelVideo->GetRandom();
        $content->randomvideo = $randomvideo;
      $this->content = $content;

        $this->template->top_menu = View::factory('menu_href');
        $this->template->top_menu->alias = '';


    }

}
