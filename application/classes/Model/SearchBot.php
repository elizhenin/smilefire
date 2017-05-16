<?php defined('SYSPATH') or die('No direct script access.');

class Model_SearchBot extends Model
{

    private static function IsGoogleBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'Googlebot/') > 0) {
                return 'google';
            } else
                return $return;
        }

    }

    private static function IsYandexBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'YandexBot/') > 0) {
                return 'yandex';
            } else
                return $return;
        }
    }

    private static function IsRamblerBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'StackRambler/') > 0) {
                return 'rambler';
            } else
                return $return;
        }
    }

    private static function IsMailruBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'Mail.RU_Bot/') > 0) {
                return 'mailru';
            } else
                return $return;
        }
    }

    private static function IsMsnBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'msnbot/') > 0) {
                return 'msn';
            } else
                return $return;
        }
    }

    private static function IsYahooBot($return = false)
    {
        if($return){
            return $return;
        }else {
            if (substr_count(Request::$user_agent, 'Yahoo! Slurp') > 0) {
                return 'yahoo';
            } else
                return $return;
        }
    }

    static function IsSearchBot()
    {
        return
            self::IsGoogleBot(
                self::IsYandexBot(
                    self::IsRamblerBot(
                        self::IsMailruBot(
                            self::IsMsnBot(
                                self::IsYahooBot()
                            )
                        )
                    )
                )
            );
    }
}