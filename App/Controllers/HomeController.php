<?php
// HomeController.php
namespace App\Controllers;

use Core\Controller;
use App\Models\Product;

require_once MODELS.'Product.php';

class HomeController extends Controller
{
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        $this->_view->renderView('pages/index', ['title'=>$title]);
    }

    public function getProducts()
    {
        $products = Product::getProducts();
        echo json_encode($products);
        
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = Product::getProduct($id);
        echo json_encode($product);
        
    }
}

