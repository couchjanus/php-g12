<?php
class DashboardController extends Controller 
{
	public function index()
	{
		$this->_view->renderView('admin/index', ['title'=>'Dashboard Controller PAGE']);
	}
}
