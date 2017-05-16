<?php defined('SYSPATH') or die('No direct script access.');

class Model_Gallery extends Model
{
    public function CheckPath($alias)
    {
        $check = true;
        $path = explode('/', $alias);
        $parent = 0;
        if (!empty($alias)) {
            foreach ($path as $try) {
                $item = DB::select()
                    ->from('images')
                    ->where('alias', '=', $try)
                    ->where('parent_id', '=', $parent)
                    ->execute()
                    ->as_array();
                if (empty($item[0])) {
                    $check = false;
                } else {
                    $parent = $item[0]['id'];
                }

                if (!$check) break;
            }
        } else {
            $item[0]['id'] = '0';
            $item[0]['type'] = 'directory';
            $item[0]['parent_id'] = false;
        }
        if ($check) {
            return $item[0];
        } else
            return false;

    }

    public function GetByIdAlias($id,$alias)
    {
        $return = false;
        if(
            (!empty($id) ) &&
            (!empty($alias) )
        )
        {
            $item = DB::select()
                ->from('images')
                ->where('alias', '=', $alias)
                ->where('id', '=', $id)
                ->execute()
                ->as_array();
            if(!empty($item[0])) $return = $item[0];
        }else{
            if(
                (empty($id) ) &&
            (empty($alias) )
            ){
                $item[0]['id'] = '0';
                $item[0]['type'] = 'directory';
                $item[0]['parent_id'] = false;
              $item[0]['order'] = 'alias:DESC';
                $return = $item[0];
            }
        }
        return $return;
    }
    
    static function GetRandomImages($count)
    {
       return DB::select()
        ->from('images')
        ->where('type','=','image')
        ->order_by(DB::expr('RAND()'))
        ->limit($count)
        ->execute()
        ->as_array();
    }

    public function GetRandomAlboums($parent,$count)
    {
        $alboums =  DB::select()
            ->from('images')
            ->where('type','=','alboum')
          ->where('parent_id','=',$parent)
            ->order_by(DB::expr('RAND()'))
            ->limit($count)
            ->execute()
            ->as_array();
        if($alboums){
            foreach($alboums as $key=>$item){
                $parent = $this->GetItemById($item['parent_id']);
                $alboums[$key]['parent_alias'] = $parent['alias'];
            }
            return $alboums;
        }
    }

    public function GetVisibleGallery($item)
    {
        $now = time();
      $order = explode(':',$item['order']);
        $records = DB::select()
            ->from('images')
            ->where('parent_id', '=', $item['id'])
            ->where('start', '<', $now)
            ->and_where_open()
            ->where('stop', '>', $now)
            ->or_where('stop', '=', NULL)
            ->or_where('stop', '=', '0')
            ->and_where_close()
            ->order_by($order[0], $order[1])
            ->execute()
            ->as_array();
        return $records;
    }

    public function GetItemById($id)
    {
        $records = DB::select()
            ->from('images')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->as_array();
        if(empty($records[0])){
                return false;
            }else {
        return $records[0];
            }
    }
    
    public function GetGallery($item)
    {
        $records = DB::select()
            ->from('images')
            ->where('parent_id', '=', $item['id'])
            ->order_by('id', 'DESC')
            ->execute()
            ->as_array();
        return $records;
    }

    public function AddDirectory($item,$parent_id)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));

        if (!empty($_FILES['image']['name'])) {
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $filename = time() . '_' . Text::random('alnum', 4);
            $image_file = substr(strrchr(Upload::save($_FILES['image'], $filename . '_tmp.' . $ext, 'images/gallery/'), DIRECTORY_SEPARATOR), 1);

            $image = Image::factory('images/gallery/' . $image_file);
            if (($image->width > 700) || ($image->height > 700)) {
                $image->resize(700, 700);
                $image->save('images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            } else {
                copy('images/gallery/' . $image_file, 'images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            }
            $image = $filename . '.' . $ext;
        } else {
            $image = '';
        }



        DB::insert('images', array(
            'parent_id',
            'type',
            'image',
            'name',
            'alias',
            'user_id',
            'created',
            'modificated'
        ))
            ->values(array(
                $parent_id,
                'directory',
                $image,
                trim(htmlspecialchars($item['name'])),
                Goodies::textToAlias(trim($item['name'])),
                $user_id,
                time(),
                time()
            ))
            ->execute();
    }
    public function AddAlboum($item,$parent_id)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));

        if (!empty($_FILES['image']['name'])) {
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $filename = time() . '_' . Text::random('alnum', 4);
            $image_file = substr(strrchr(Upload::save($_FILES['image'], $filename . '_tmp.' . $ext, 'images/gallery/'), DIRECTORY_SEPARATOR), 1);

            $image = Image::factory('images/gallery/' . $image_file);
            if (($image->width > 700) || ($image->height > 700)) {
                $image->resize(700, 700);
                $image->save('images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            } else {
                copy('images/gallery/' . $image_file, 'images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            }
            $image = $filename . '.' . $ext;
        } else {
            $image = '';
        }

        DB::insert('images', array(
            'parent_id',
            'type',
            'image',
            'name',
            'alias',
            'user_id',
            'created',
            'modificated'
        ))
            ->values(array(
                $parent_id,
                'alboum',
                $image,
                trim(htmlspecialchars($item['name'])),
                Goodies::textToAlias(trim($item['name'])),
                $user_id,
                time(),
                time()
            ))
            ->execute();
    }
    public function AddImages($item,$parent_id)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        if (!empty($_FILES['image']['name'])) {
            foreach($_FILES['image']['error'] as $key=>$error){

                if ($error == UPLOAD_ERR_OK) {
                    $ext = substr(strrchr($_FILES['image']['name'][$key], '.'), 1);
                    $filename = time() . '_' . Text::random('alnum', 4);
                    $tmp_name = $_FILES['image']['tmp_name'][$key];
                    $image_file = $filename . '_tmp.' . $ext;
                    move_uploaded_file($tmp_name, 'images/gallery/'. $image_file);

                    $image = Image::factory('images/gallery/' . $image_file);
                    if (($image->width > 700) || ($image->height > 700)) {
                        $image->resize(700, 700);
                        $image->save('images/gallery/' . $filename . '.' . $ext);
                        unlink('images/gallery/' . $image_file);
                    } else {
                        copy('images/gallery/' . $image_file, 'images/gallery/' . $filename . '.' . $ext);
                        unlink('images/gallery/' . $image_file);
                    }
                    $image = $filename . '.' . $ext;

                    DB::insert('images', array(
                        'parent_id',
                        'type',
                        'image',
                        'name',
                        'alias',
                        'user_id',
                        'created',
                        'modificated'
                    ))
                        ->values(array(
                            $parent_id,
                            'image',
                            $image,
                            $image,
                            $image,
                            $user_id,
                            time(),
                            time()
                        ))
                        ->execute();
                }
            }
        }
    }

    public function UpdateRecord($item)
    {
        $session = Session::instance();
        $user_id = Model_Users::UserId($session->get('user', false));
        if(!empty($item['start'])){
            $item['start']=strtotime($item['start']);
        }
        if(!empty($item['stop'])){
            $item['stop']=strtotime($item['stop']);
        }
        if (!empty($_FILES['image']['name'])) {
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $filename = time() . '_' . Text::random('alnum', 4);
            $image_file = substr(strrchr(Upload::save($_FILES['image'], $filename . '_tmp.' . $ext, 'images/gallery/'), DIRECTORY_SEPARATOR), 1);

            $image = Image::factory('images/gallery/' . $image_file);
            if (($image->width > 700) || ($image->height > 700)) {
                $image->resize(700, 700);
                $image->save('images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            } else {
                copy('images/gallery/' . $image_file, 'images/gallery/' . $filename . '.' . $ext);
                unlink('images/gallery/' . $image_file);
            }
            $image = $filename . '.' . $ext;
        } else {
            $image = $item['prev_image'];
            }

        DB::update('images')
            ->set(array(
                'name' => trim(htmlspecialchars($item['name'])),
                'text' => trim(htmlspecialchars($item['text'])),
                'keywords' => trim(htmlspecialchars($item['keywords'])),
                'description' => trim(htmlspecialchars($item['description'])),
                'start'=>$item['start'],
                'stop'=>$item['stop'],
                'image' => $image,
                'modificated' => time(),
                'user_id' => $user_id,
              	'order' => trim(htmlspecialchars($item['order']))
            ))
            ->where('id', '=', $item['id'])
            ->execute();
    }
}