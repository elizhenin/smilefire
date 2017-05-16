<?php defined('SYSPATH') or die('No direct script access.');

class Controller_News extends Controller_Tmp
{

    public function action_index()
    {
        $modelNews = new Model_News();
$alias = $this->request->param('alias');
        if($alias){
            $item = $modelNews->GetByAlias($alias);
          $oneNew = View::factory('news/one');
          $oneNew->text = $item['text'];
          $oneNew->time = $item['start'];
            $this->content =$oneNew;
            $this->description = $item['title'];
            $this->title = $item['title'].' - SmileFire! Воронеж';
            $this->canonical = 'http://smilefire.ru/novosti/'.$item['alias'];
          $this->template->vk_image="logo.png";
        }
        else {
            $this->title = 'Новости - Огненное и Световое шоу SmileFire! Воронеж';
            $this->canonical = 'http://smilefire.ru/news';
            $viewNews = View::factory('news/list');
            $viewNews->VisibleNews = $modelNews->GetVisible();
            $ignorehide = $this->request->query('ignorehide');
            if (!empty($ignorehide)) {
                $viewNews->VisibleNews = $modelNews->GetAll();
            }
            $this->content = $viewNews;
            $this->description = 'Новости Фаершоу в Воронеже';
            $this->keywords = 'Новости, Фаершоу, огнемет';
        }
        $this->template->top_menu = View::factory('menu_href');


    }
}
