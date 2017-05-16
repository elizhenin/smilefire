<?php defined('SYSPATH') OR die('No direct access allowed.');

class SearchBot
{
    static $_config;

    public function __construct()
    {

    }

    static function IsBot()
    {
        self::$_config = Kohana::$config->load('searchbot')->searchbot;
        $return = false;
        foreach (self::$_config as $BotReturn => $BotString) {
            $return = self::CheckBot($BotString, $BotReturn, $return);
        }
        return $return;
    }

    private static function CheckBot($BotString, $BotReturn, $return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, $BotString) > 0) {
                return $BotReturn;
            } else
                return $return;
        }
    }

    public function __destruct()
    {

    }


}