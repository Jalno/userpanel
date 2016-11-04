<?php
namespace packages\userpanel\listeners\settings;
use \packages\userpanel\usertype\permissions;
class usertype{
	public function permissions_list(){
		$permissions = array(
			'users_list',
			'users_add',
			'users_view',
			'users_edit',
			'users_delete',

			'settings_usertypes_list',
			'settings_usertypes_add',
			'settings_usertypes_edit',
			'settings_usertypes_delete',

		);
		foreach($permissions as $permission){
			permissions::add('userpanel_'.$permission);
		}
	}
}
