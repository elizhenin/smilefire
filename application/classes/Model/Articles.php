<?php defined('SYSPATH') or die('No direct script access.');

class Model_Articles extends Model
{

    public function NewArticle($article)
    {
        $article['name'] = trim(htmlspecialchars($article['name']));
        if ($article['title'] == '') {
            $article['title'] = $article['name'];
        }
        $article['description'] = trim(htmlspecialchars($article['description']));
        if ($article['description'] == '') {
            $article['description'] = $article['name'];
        }
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::insert('articles', array('name', 'title', 'keywords', 'description', 'text', 'alias', 'active', 'created', 'modificated','user_id'))
            ->values(array($article['name'], $article['title'], $article['keywords'], $article['description'], $article['text'], $article['alias'], $article['active'], DB::expr('NOW()'), DB::expr('NOW()'), $user_id))
            ->execute();
    }

    public function UpdateArticle($article)
    {
        $article['name'] = trim(htmlspecialchars($article['name']));
        if(empty($article['active'])){$article['active']='0';}
        if ($article['title'] == '') {
            $article['title'] = $article['name'];
        }
        $article['description'] = trim(htmlspecialchars($article['description']));
        if ($article['description'] == '') {
            $article['description'] = $article['name'];
        }
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::update('articles')
            ->set(array(
                    'name' => $article['name'],
                    'title' => $article['title'],
                    'keywords' => $article['keywords'],
                    'description' => $article['description'],
                    'text' => $article['text'],
                    'alias' => $article['alias'],
                    'active' => $article['active'],
                    'modificated' => DB::expr('NOW()'),
                'user_id'=> $user_id
                )
            )
            ->where('alias', '=', $article['alias'])
            ->execute();
    }

    public function GetByAlias($alias)
    {
        $select = DB::select()
            ->from('articles')
            ->where('alias', '=', $alias)
            ->limit(1)
            ->execute()
            ->as_array();
        if (!empty($select)) {
            return $select[0];
        } else {
            return false;
        }
    }

    public function GetById($id)
    {
        $select = DB::select()
            ->from('articles')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->as_array();
        if (!empty($select)) {
            return $select[0];
        } else {
            return false;
        }
    }

    public function GetAll()
    {
        $select = DB::select()
            ->from('articles')
            ->execute()
            ->as_array();
        if (!empty($select)) {
            return $select;
        } else {
            return false;
        }
    }

    public function SetVisibilityById($id, $active)
    {
        DB::update('articles')
            ->set(array('active' => $active))
            ->where('id', '=', $id)
            ->execute();
    }
}