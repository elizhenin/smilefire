<?php defined('SYSPATH') or die('No direct script access.');

class Model_Video extends Model
{
    static function GetRandom()
    {
        $video =  DB::select()
            ->from('video')
            ->where('active','=','1')
            ->order_by(DB::expr('RAND()'))
            ->limit(1)
            ->execute()
            ->as_array();
        if($video) return $video[0];
    }


    public function GetVisible()
    {
        $records = DB::select()
            ->from('video')
            ->where('active', '=', '1')
  //          ->order_by('id', 'DESC')
  ->order_by('created', 'DESC')
            ->execute()
            ->as_array();


        return $records;
    }

    /**
     * Get all articles
     * @return array
     */
    public function GetAll()
    {

        $records = DB::select()
            ->from('video')
            ->execute()
            ->as_array();


        return $records;
    }

    public function GetById($id)
    {

        $records = DB::select()
            ->from('video')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->as_array();
         return $records[0];
    }

    public function NewRecord($video)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::insert('video', array(
            'short',
            'full',
            'comment',
            'video',
            'image',
            'type',
            'created',
            'modificated',
            'user_id',
            'active'
        ))
            ->values(array(
                trim(htmlspecialchars($video['short'])),
                trim(htmlspecialchars($video['full'])),
                trim(htmlspecialchars($video['comment'])),
                $video['video'],
                $video['image'],
                $video['type'],
                time(),
                time(),
                $user_id,
                '1'
            ))
            ->execute();
    }

    public function UpdateRecord($video)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        DB::update('video')
            ->set(array(
                'short' => trim(htmlspecialchars($video['short'])),
                'full' => trim(htmlspecialchars($video['full'])),
                'comment' => trim(htmlspecialchars($video['comment'])),
                'video' => $video['video'],
                'image' => $video['image'],
                'type' => $video['type'],
                'modificated' => time(),
                'user_id' => $user_id
            ))
            ->where('id', '=', $video['id'])
            ->execute();
    }

    public function EnableVideo($id)
    {
        DB::update('video')
            ->set(array(
                'active' => '1'
            ))
            ->where('id', '=', $id)
            ->execute();
    }

    public function DisableVideo($id)
    {
        DB::update('video')
            ->set(array(
                'active' => '0'
            ))
            ->where('id', '=', $id)
            ->execute();
    }
}