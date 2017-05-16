<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Articles extends Controller_Tmp
{

    public function action_index()
    {
        $trash = $this->request->query('module');
        if (!empty($trash)) {
            throw new HTTP_Exception_404;
        }
        $alias = htmlspecialchars($this->request->param('alias'));
        $this->canonical = 'http://smilefire.ru/' . $alias;

        $Articles = New Model_Articles();

        $ArticlesOne = $Articles->GetByAlias($alias);
        if (empty($ArticlesOne)) {
            throw new HTTP_Exception_404;
        }
        $this->title = $ArticlesOne['title'];
        $this->description = $ArticlesOne['description'];
        $this->keywords = $ArticlesOne['keywords'];

        $this->content = $ArticlesOne['text'];
        $this->template->top_menu = View::factory('menu_href');
        $this->template->top_menu->alias = $alias;


    }

}
