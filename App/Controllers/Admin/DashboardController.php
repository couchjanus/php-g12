<?php
require_once MODELS.'User.php';

class DashboardController extends Controller 
{
	public function index()
	{

		$userId = Helper::checkLog();
		$user = User::getById($userId);
		
		// var_dump($user);

        if ($user['role_id']==1) {
            $this->_view->renderView('admin/index', compact('user'));
        } else {
            Helper::redirect('/profile');
        }

		// $this->_view->renderView('admin/index', ['title'=>'Dashboard Controller PAGE']);
	}
}
