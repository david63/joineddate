<?php
/**
*
* @package Joined Date Format Extension
* @copyright (c) 2015 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\joineddate\acp;

class joineddate_options_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container;

		$this->tpl_name		= 'joineddate_options';
		$this->page_title	= $phpbb_container->get('language')->lang('JOINED_DATE_FORMAT');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('david63.joineddate.admin.controller');

		$admin_controller->display_options();
	}
}
