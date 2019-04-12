<?php
// HomeController.php

require_once MODELS.'Product.php';

class HomeController extends Controller
{
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        $this->_view->renderView('pages/index', ['title'=>$title]);
    }

    public function getProducts($vars)
    {
        $products = Product::getProducts();
        echo json_encode($products);
        
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = Product::getBySlug($id);
        echo json_encode($product);
        // var_dump($product);
        
    }
}

