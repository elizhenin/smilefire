<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_AdminTmp
{

    public function before()
    {
        parent::before();
        $this->session = Session::instance();
        $action = $this->request->action();
        if (!$this->session->get('user', false) && $action != 'login') {
            HTTP::redirect('/administrator/login');
        };
        $this->menu_side = view::factory('admin/menu');
        $this->menu_side->user = $this->session->get('user', false);
    }

    public function action_login()
    {
        if ($this->session->get('user', false)) {
            HTTP::redirect('/administrator');
        } else {
            if (HTTP_Request::POST == $this->request->method()) {
                $adminUsersPOST = $this->request->post();
                $UsersModel = New Model_Users();
                $user = $UsersModel->checkUser($adminUsersPOST['username'], $adminUsersPOST['password']);
                if ($user) {
                    $this->session->set('user', $user);
                    HTTP::redirect('/administrator');
                } else {
                    $this->menu_side->login_error = true;
                }

            }
            $this->content = 'Пожалуйста, авторизуйтесь';
            $this->template->top_menu = View::factory('menu_href');
            $this->template->top_menu->alias = '';

        }
    }

    public function action_index()
    {
        HTTP::redirect('/administrator/news');

    }

    public function action_logout()
    {
        $this->session->delete('user');
        HTTP::redirect('/administrator/login');
    }

    public function action_changepass()
    {
        $login = $this->session->get('user', false);
        $this->content = view::factory('admin/changepass');
        if (HTTP_Request::POST == $this->request->method()) {
            $adminUsersPOST = $this->request->post();
            if (!($adminUsersPOST['newpass1'] == $adminUsersPOST['newpass2'])) {
                $this->content->login_error = 'Новые пароли не совпадают';
            }
            $UsersModel = New Model_Users();
            $user = $UsersModel->checkUser($login, $adminUsersPOST['oldpass']);
            if ($user) {
                if (empty($this->content->login_error)) {
                    $UsersModel->changePassword($login, $adminUsersPOST['newpass1']);
                    HTTP::redirect('administrator/logout');
                }
            } else {
                $this->content->login_error = 'Неверный старый пароль';
            }

        }
        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = 'gallery';
    }


    public function action_articles()
    {

        $adminArticlesPOST = $this->request->post();
        if (empty($adminArticlesPOST['operation'])) {
            $adminArticlesPOST['operation'] = 'list';
        }
        $ArticlesModel = New Model_Articles();
        switch ($adminArticlesPOST['operation']) {
            case 'list':
                $content = View::factory('admin/articles/show_articles');
                $content->articles = $ArticlesModel->GetAll();
                break;
            case 'new':
                $ArticlesModel->NewArticle($adminArticlesPOST);
                $content = View::factory('admin/articles/show_articles');
                $content->articles = $ArticlesModel->GetAll();
                break;
            case 'update':
                $ArticlesModel->UpdateArticle($adminArticlesPOST);
                $content = View::factory('admin/articles/show_articles');
                $content->articles = $ArticlesModel->GetAll();
                break;
            case 'delete':
                break;
            case 'edit':
                $content = View::factory('admin/articles/edit_article');
                $content->article = $ArticlesModel->GetById($adminArticlesPOST['article_id']);
                $content->operation = 'update';

                break;
            case 'add':
                $content = View::factory('admin/articles/edit_article');
                $content->operation = 'new';

                break;
            case 'hide':
                $ArticlesModel->SetVisibilityById($adminArticlesPOST['article_id'], '0');
                $content = View::factory('admin/articles/show_articles');
                $content->articles = $ArticlesModel->GetAll();

                break;
            case 'show':
                $ArticlesModel->SetVisibilityById($adminArticlesPOST['article_id'], '1');
                $content = View::factory('admin/articles/show_articles');
                $content->articles = $ArticlesModel->GetAll();

                break;
        }

        $this->content = $content;
        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = 'articles';
    }

    public function action_gallery()
    {
        $adminGalleryPOST = $this->request->post();
        if (empty($adminGalleryPOST['operation'])) {
            $adminGalleryPOST['operation'] = 'list';
        }
        $GalleryModel = New Model_Gallery();
        switch ($adminGalleryPOST['operation']) {
            case 'list':
                $alias = $this->request->param('alias');
                $check = $GalleryModel->CheckPath($alias);
                if ($check) {
                    switch ($check['type']) {
                        case 'directory':
                            $content = View::factory('admin/gallery/list_directory');
                            $content->alias = $alias;
                            $content->items = $GalleryModel->GetGallery($check);
                            break;
                        case 'alboum':
                            $content = View::factory('admin/gallery/list_alboum');
                            $content->alias = $alias;
                            $content->items = $GalleryModel->GetGallery($check);
                            break;
                        case 'image':
                            $content = View::factory('admin/gallery/edit_image');
                            $content->alias = $alias;
                            $content->item = $check;
                            $content->operation = 'update';
                            break;
                    }
                } else throw new HTTP_Exception_404;
                break;
            case 'edit':
                $alias = $this->request->param('alias');
                $check = $GalleryModel->CheckPath($alias);
                $id = $this->request->post('id');
                $type = $this->request->post('type');

                if ($type) {
                    switch ($type) {
                        case 'directory':
                            $content = View::factory('admin/gallery/edit_directory');
                            $content->item = $GalleryModel->GetItemById($id);
                            $content->alias = $alias;
                            $content->operation = 'update';
                            break;
                        case 'alboum':
                            $content = View::factory('admin/gallery/edit_alboum');
                            $content->item = $GalleryModel->GetItemById($id);
                            $content->alias = $alias;
                            $content->operation = 'update';
                            break;
                    }
                } else throw new HTTP_Exception_404;
                break;
            case 'update':
                $GalleryModel->UpdateRecord($adminGalleryPOST);
                $this->redirect($this->request->referrer());
                break;
            case 'add':
                if ($adminGalleryPOST['type']) {
                    $alias = $this->request->param('alias');
                    $check = $GalleryModel->CheckPath($alias);
                    switch ($adminGalleryPOST['type']) {
                        case 'directory':
                            $GalleryModel->AddDirectory($adminGalleryPOST,$check['id']);
                            $this->redirect($this->request->referrer());
                            break;
                        case 'alboum':
                            $GalleryModel->AddAlboum($adminGalleryPOST,$check['id']);
                            $this->redirect($this->request->referrer());
                            break;
                        case 'image':
                            $GalleryModel->AddImages($adminGalleryPOST,$check['id']);
                            $this->redirect($this->request->referrer());
                            break;
                    }
                } else throw new HTTP_Exception_404;
                break;
        }


        $this->content = $content;
        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = 'gallery';

    }

    public function action_video()
    {

        $adminVideoPOST = $this->request->post();
        if (empty($adminVideoPOST['operation'])) {
            $adminVideoPOST['operation'] = 'list';
        }
        $VideoModel = New Model_Video();
        switch ($adminVideoPOST['operation']) {
            case 'enable':
                $VideoModel->EnableVideo($adminVideoPOST['id']);
                $content = View::factory('admin/video/show_videos');
                $content->videos = $VideoModel->GetAll();
                break;
            case 'disable':
                $VideoModel->DisableVideo($adminVideoPOST['id']);
                $content = View::factory('admin/video/show_videos');
                $content->videos = $VideoModel->GetAll();
                break;
            case 'list':
                $content = View::factory('admin/video/show_videos');
                $content->videos = $VideoModel->GetAll();
                break;
            case 'new':
                $VideoModel->NewRecord($adminVideoPOST);
                $content = View::factory('admin/video/show_videos');
                $content->videos = $VideoModel->GetAll();
                break;
            case 'update':
                $VideoModel->UpdateRecord($adminVideoPOST);
                $content = View::factory('admin/video/show_videos');
                $content->videos = $VideoModel->GetAll();
                break;
            case 'delete':
                break;
            case 'edit':
                $content = View::factory('admin/video/edit_video');
                $content->video = $VideoModel->GetById($adminVideoPOST['video_id']);
                $content->operation = 'update';

                break;
            case 'add':
                $content = View::factory('admin/video/edit_video');
                $content->operation = 'new';

                break;
        }

        $this->content = $content;
        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = 'video';

    }

    public function action_news()
    {

        $adminNewsPOST = $this->request->post();
        if (empty($adminNewsPOST['operation'])) {
            $adminNewsPOST['operation'] = 'list';
        }
        $NewsModel = New Model_News();
        switch ($adminNewsPOST['operation']) {
            case 'list':
                $content = View::factory('admin/news/show_news');
                $content->articles = $NewsModel->GetAll();
                break;
            case 'new':
                $NewsModel->NewRecord($adminNewsPOST);
                $content = View::factory('admin/news/show_news');
                $content->articles = $NewsModel->GetAll();
                break;
            case 'update':
                $NewsModel->UpdateRecord($adminNewsPOST);
                $content = View::factory('admin/news/show_news');
                $content->articles = $NewsModel->GetAll();
                break;
            case 'regen':
                $NewsModel->RegenAlias();
                $content = View::factory('admin/news/show_news');
                $content->articles = $NewsModel->GetAll();
                break;
            case 'delete':
                break;
            case 'edit':
                $content = View::factory('admin/news/edit_new');
                $content->article = $NewsModel->GetById($adminNewsPOST['article_id']);
                $content->operation = 'update';

                break;
            case 'add':
                $content = View::factory('admin/news/edit_new');
                $content->operation = 'new';

                break;
        }

        $this->content = $content;
        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = 'news';


    }

    public function action_searchbots()
    {
        $content = View::factory('admin/show_searchbots');
        $content->bots = DB::select()
            ->from('searchbots')
          //   ->order_by('type')
          ->order_by('created','DESC')
            ->execute()
            ->as_array();
        $this->content = $content;

        $this->template->top_menu = View::factory('admin/menu_href');
        $this->template->top_menu->alias = '';
    }
}
