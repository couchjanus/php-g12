<?php

/**
 * Контроллер для просмотра и управления 
 * списком всех товаров, имеющихся в базе
*/
require_once MODELS.'Product.php';
require_once MODELS.'Category.php';
require_once MODELS.'Picture.php';
require_once CORE.'Uploader.php';

class ProductController extends Controller
{
    private $_resource = 'products';

    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        $products = Product::index();
        $title = 'Product List Page ';
        $numRows = count($products);
        $this->_view->renderView('admin/products/index', compact('products', 'title', 'numRows'));
    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create0()
    {
        // Сохранение товара
        if (isset($_POST) and !empty($_POST)) {
            $options = [];
            //Принимаем данные из формы
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['category_id'] = $_POST['category_id'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];
        
            Product::store($options);
        
            if (isset($_FILES['image'])) {
                //Каталог загрузки картинок
                $uploadDir = 'images/products';
                    
                //Вывод ошибок
                $errors = array();
                // pathinfo — Возвращает информацию о пути к файлу
                $type = pathinfo($_FILES['image']['name']);
                $file_ext = strtolower($type['extension']);

                $extension= array("jpeg","jpg","png",'gif');
                //Определяем типы файлов для загрузки
                $fileTypes = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );

                //Проверяем пустые данные или нет
                if (empty($_FILES)) {
                    $errors[] = 'File name must have name';
                } elseif ($_FILES['image']['error'] > 0) {
                    // Проверяем на ошибки
                    $errors[] = $_FILES['image']['error'];
                } elseif ($_FILES['image']['size'] > 2097152) {
                    // если размер файла превышает 2 Мб
                    $errors[] = 'File size must be excately 2 MB';
                } elseif (in_array($file_ext, $extension) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                } elseif (!in_array($_FILES['image']['type'], $fileTypes)) {
                    // Проверяем тип файла
                    $errors[] = 'Запрещённый тип файла';
                }
                
                if (empty($errors)) {
                
                    $type = pathinfo($_FILES['image']['name']);
                    $name = uniqid('files_') .'.'. $type['extension'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.'/'.$name);

                    $opts['filename'] = $name;
                    $opts['resource_id'] = (int)Product::lastId();
                    $opts['resource'] = $this->_resource;
                    Picture::store($opts);
    
                } else {
                    print_r($errors);
                }
            }
            Helper::redirect('/admin/products');
        }
        $title = 'Add New Product ';
        $categories = Category::index();
        $this->_view->renderView('admin/products/create', compact('categories', 'title'));
    
    }

    public function create()
    {
        // Сохранение товара

        if (isset($_POST) and !empty($_POST)) {
            $options = [];
            //Принимаем данные из формы
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['category_id'] = $_POST['category_id'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];
        
            Product::store($options);
            
            if (isset($_FILES['images'])) {
                 //Каталог загрузки картинок
                $uploadDir = 'images/products';
                $countfiles = count($_FILES['images']['name']);
                // Looping all files
                for($i=0;$i<$countfiles;$i++){
                    $filename = $_FILES['images']['name'][$i];
                    $type = pathinfo($filename);
                    $name = uniqid('files_') .'.'. $type['extension'];

                    // Upload file
                    move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadDir.'/'.$name);
                    $opts['filename'] = $name;
                    $opts['resource_id'] = (int)Product::lastId();
                    $opts['resource'] = $this->_resource;
                    Picture::store($opts);
                    
            
                }
            } 
            
    
        
            Helper::redirect('/admin/products');
        }
        $title = 'Add New Product ';
        $categories = Category::index();
        $this->_view->renderView('admin/products/create', compact('categories', 'title'));
    }

    /**
     * Редатирование товара
     *
     * @param $id
     * @return bool
    */
    public function edit($vars)
    {
        //Получаем информацию о выбранном товаре
        extract($vars);
        $product = Product::getById($id);

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            
            $options['category_id'] = $_POST['category_id'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];

            Product::update($id, $options);
            Helper::redirect('/admin/products');
        }
      
        // var_dump($data['product']);
        $categories = Category::index();
        $title = 'Product Edit Page ';
        $this->_view->renderView('admin/products/edit', compact('categories', 'title', 'product'));
    }


    public function delete($vars)
    {
        extract($vars);

        if (isset($_POST['submit'])) {

            Product::destroy($id);
            Helper::redirect('/admin/products');
        
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/products');
        }

        $title = 'Delete Product ';
        $product = Product::getById($id);
        $this->_view->renderView('admin/products/sdeletehow', compact('picture', 'title', 'product'));
    }

    public function show($vars)
    {
        extract($vars);
        $title = 'Show Product ';
        $product = Product::getById($id);
        $picture = Picture::getById($id, $this->_resource);
        $this->_view->renderView('admin/products/show', compact('picture', 'title', 'product'));
    }
}