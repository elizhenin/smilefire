<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tmp extends Controller_Template
{
    public $template = 'three_column';
    public $title;
    public $keywords;
    public $description;
    public $content;
    public $contacts_side;
    public $menu_side;
    public $random_image;
    public $footer;

    public function before()
    {
        parent::before();
        $robots = New Robots_Logger();
        $robots->IsSearchBot($this->request->referrer());
    }

    public function after()
    {
        if (empty($this->title)) {
            $this->title = 'Огненное и Световое шоу SmileFire! Воронеж';
        }
        if (empty($this->keywords)) {
            $this->keywords = 'огненное световое шоу SmileFire Воронеж fireshow фаершоу файершоу led свадьба выпускной юбилей';
        }
        if (empty($this->description)) {
            $this->description = 'Воронежское шоу огня и света SmileFire! принимаем заказы на свадьбы, корпоративы, юбилеи, выпускные, вечеринки';
        }
        $this->menu_side = view::factory('side/menu');
        $this->contacts_side = view::factory('side/contacts');
        $random_image = view::factory('side/random_image');
        $random_image->images = Model_Gallery::GetRandomImages(10);
        $this->random_image = $random_image;
        $this->footer = view::factory('footer');
        $this->template->title = $this->title;
        $this->template->keywords = $this->keywords;
        $this->template->description = $this->description;
        $this->template->content = $this->content;
        $this->template->menu_side = $this->menu_side;
        $this->template->contacts_side = $this->contacts_side;
        $this->template->random_image = $this->random_image;
        $this->template->footer = $this->footer;

        $this->template->auth_side = View::factory('side/auth');
        parent::after();
    }

}
