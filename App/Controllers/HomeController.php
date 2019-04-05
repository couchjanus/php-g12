<?php
// HomeController.php

class HomeController extends Controller
{
    
    public function index()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';

        $this->_view->renderView('pages/index', ['title'=>$title]);
    }
}

