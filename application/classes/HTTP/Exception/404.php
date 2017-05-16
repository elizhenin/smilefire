<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404
{
    public function get_response()
    {
        $view = view::factory('404');

        $response = Response::factory()
            ->status(404)
            ->body($view->render());

        return $response;
    }
}
