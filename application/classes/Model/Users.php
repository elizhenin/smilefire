<?php defined('SYSPATH') or die('No direct script access.');

class Model_Users extends Model
{


    public function checkUser($login, $password)
    {
        $login = htmlspecialchars(trim($login));
        $password = trim($password);
        $user = DB::select_array(array('login'))
            ->from('users')
            ->where('login', '=', $login)
            ->and_where('password', '=', md5($password))
            ->execute();
        if (!empty($user)) {
            return $user[0]['login'];
        }else{
            return false;
        }

    }
    static function UserId($login)
    {
        $login = htmlspecialchars(trim($login));

        $id = DB::select('id')
            ->from('users')
            ->where('login', '=', $login)
            ->limit(1)
            ->execute();
        if (!empty($id)) {
            return $id[0]['id'];
        }else{
            return false;
        }

    }

    static function UserName($id)
    {
        $name = DB::select('login')
            ->from('users')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute();
        if (!empty($name)) {
            return $name[0]['id'];
        }else{
            return false;
        }

    }

    public function changePassword($login, $password)
    {
        $result = false;
        if (DB::update('users')
            ->set(array('password' => md5($password)))
            ->where('login', '=', $login)
            ->execute()
        ) {
            $result = true;
        }

        return $result;
    }

}