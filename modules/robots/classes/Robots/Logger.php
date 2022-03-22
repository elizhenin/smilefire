<?php defined('SYSPATH') or die('No direct access allowed.');

class Robots_Logger
{
    protected $_config;

    public function __construct($conf = 'default')
    {
        $this->_config = Kohana::$config->load('robots')->$conf;
    }

    private static function IsDebugEnabled($return = false)
    {
        if ($return) {
            return $return;
        } else return 'debug';
    }

    private static function IsGoogleBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            $return = false;
            $ip = Request::$client_ip;
            if (substr_count(Request::$user_agent, 'Googlebot') > 0) {
                $return = 'google';
            }

            for ($i = 160; $i <= 191; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('64.233.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }

            for ($i = 0; $i <= 15; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('66.102.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }

            for ($i = 64; $i <= 95; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('66.249.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }

            for ($i = 192; $i <= 255; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('72.14.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }
            for ($i = 128; $i <= 255; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('74.125.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }

            for ($i = 192; $i <= 255; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('209.85.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }
            for ($i = 32; $i <= 63; $i++) {
                for ($k = 0; $k <= 255; $k++) {
                    if ('216.239.' . $i . '.' . $k == $ip) {
                        $return = 'google';
                    }
                }
            }

            return $return;
        }
    }

    private static function IsYandexBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, 'Yandex') > 0) {
                return 'yandex';
            } else
                return $return;
        }
    }

    private static function IsRamblerBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, 'StackRambler/') > 0) {
                return 'rambler';
            } else
                return $return;
        }
    }

    private static function IsMailruBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, 'Mail.RU_Bot/') > 0) {
                return 'mailru';
            } else
                return $return;
        }
    }

    private static function IsMsnBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, 'msnbot/') > 0) {
                return 'msn';
            } else
                return $return;
        }
    }

    private static function IsYahooBot($return = false)
    {
        if ($return) {
            return $return;
        } else {
            if (substr_count(Request::$user_agent, 'Yahoo! Slurp') > 0) {
                return 'yahoo';
            } else
                return $return;
        }
    }

    public function IsSearchBot($referrer)
    {
        if (empty($referrer)) $referrer = '';
        $return =
            self::IsDebugEnabled(
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
                )
            );
        if ($return && $this->_config[$return]) {
            $session = Session::instance();
            $time_ses = $session->get('visitor_check', false);
            if ($time_ses == false) {
                $time_ses = time();
                $session->set('visitor_check', $time_ses);
            }
            // DB::insert('searchbots', array('type', 'page', 'created', 'session', 'referrer', 'agent','ip'))
            //     ->values(array($return, URL::site(Request::detect_uri(), TRUE) . URL::query(), DB::expr('NOW()'), $time_ses, $referrer, Request::$user_agent,Request::$client_ip))
            //     ->execute();
        } else {
            return false;
        }
    }
}
