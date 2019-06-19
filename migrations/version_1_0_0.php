<?php
/**
*
* @package Joined Date Format Extension
* @copyright (c) 2015 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\joineddate\migrations;

class version_1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('joined_dateformat_memberlist', '|F Y|')),
			array('config.add', array('joined_dateformat_profile', '|F Y|')),
			array('config.add', array('joined_dateformat_viewtopic', '|F Y|')),
			array('config.add', array('version_joineddate', '1.0.0')),

			// Add the ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'JOINED_DATE_FORMAT')),
			array('module.add', array(
				'acp', 'JOINED_DATE_FORMAT', array(
					'module_basename'	=> '\david63\joineddate\acp\joineddate_options_module',
					'modes'				=> array('main'),
				),
			)),
		);
	}
}
