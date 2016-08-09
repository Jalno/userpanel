<?php
namespace packages\userpanel\views\users;
use \packages\userpanel\views\listview as list_view;
use \packages\userpanel\authorization;

class listview extends  list_view{
	protected $canView;
	protected $canEdit;
	protected $canDelete;
	function __construct(){
		$this->canView = authorization::is_accessed('users_view');
		$this->canEdit = authorization::is_accessed('users_edit');
		$this->canDelete = authorization::is_accessed('users_delete');
	}
}
