<?php defined('SYSPATH') or die('No direct script access.');

class Controller_AdminTmp extends Controller_Template
{
    public $template = 'admin/template';
    public $title;
    public $content;
    public $contacts_side;
    public $menu_side;
    public $random_image;
    public $footer;


    public function after()
    {
        if (empty($this->title)) {
            $this->title = 'Огненное и Световое шоу SmileFire! Воронеж';
        }

        $this->contacts_side = view::factory('side/contacts');
        $this->random_image = '';
        $this->footer = view::factory('footer');
        $this->template->title = $this->title;
        $this->template->content = $this->content;
        $this->template->menu_side = $this->menu_side;
        $this->template->contacts_side = $this->contacts_side;
        $this->template->random_image = $this->random_image;
        $this->template->footer = $this->footer;
        parent::after();
    }

}
