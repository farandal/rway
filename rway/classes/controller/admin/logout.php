<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Logout extends Controller_Website {

	public function action_index()
	{
		Auth::instance()->logout();
		$this->request->redirect('admin');
	}
}
