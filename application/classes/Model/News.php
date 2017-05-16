<?php defined('SYSPATH') or die('No direct script access.');

class Model_News extends Model
{
    public function GetVisible($limit = false)
    {
        $now = time();
        $news = DB::select()
            ->from('news')
            ->order_by('start', 'DESC')
            ->where('start', '<', $now)
            ->and_where_open()
            ->where('stop', '>', $now)
            ->or_where('stop', '=', NULL)
            ->or_where('stop', '=', '0')
            ->and_where_close();
        if($limit)
            $news->limit($limit);
        $news=$news
            ->execute()
            ->as_array();


        return $news;
    }

    /**
     * Get all articles
     * @return array
     */
    public function GetAll()
    {

        $news = DB::select()
            ->from('news')
            ->order_by('start', 'DESC')
            ->execute()
            ->as_array();


        return $news;
    }

    public function GetById($id)
    {

        $news = DB::select()
            ->from('news')
            ->where('id','=',$id)
            ->limit(1)
            ->execute()
            ->as_array();


        return $news[0];
    }

    public function GetByAlias($alias)
    {

        $news = DB::select()
            ->from('news')
            ->where('alias','=',$alias)
            ->limit(1)
            ->execute()
            ->as_array();


        return $news[0];
    }

    public function RegenAlias()
    {
        $news = $this->GetAll();
        foreach($news as $one){
            $alias = Goodies::textToAlias(trim(htmlspecialchars($one['title'])));
            DB::update('news')
                ->set(
                    array(
                        'alias'=>$alias
                    )
                )
                ->where('id','=',$one['id'])
                ->execute();
        }
    }

    public function NewRecord($article)
    {
        if(!empty($article['start'])){
            $article['start']=strtotime($article['start']);
        }
        if(!empty($article['stop'])){
            $article['stop']=strtotime($article['stop']);
        }
if(empty($article['start'])){$article['start']=time();}

        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::insert('news', array('title', 'text', 'start','stop','user_id','alias'))
            ->values(array(trim(htmlspecialchars($article['title'])), $article['text'], $article['start'], $article['stop'],$user_id,Goodies::textToAlias(trim(htmlspecialchars($article['title'])))))
            ->execute();
    }

    public function UpdateRecord($article)
    {

        if(!empty($article['start'])){
            $article['start']=strtotime($article['start']);
        }
        if(!empty($article['stop'])){
            $article['stop']=strtotime($article['stop']);
        }
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::update('news')
            ->set(array(
                    'title' => trim(htmlspecialchars($article['title'])),
                    'text' => $article['text'],
                    'start' => $article['start'],
                    'stop' => $article['stop'],
                'user_id' => $user_id
            ))
            ->where('id', '=', $article['id'])
            ->execute();
    }

}