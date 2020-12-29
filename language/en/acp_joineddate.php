<?php
/**
*
* @package Joined Date Format Extension
* @copyright (c) 2015 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'CUSTOM_DATEFORMAT'				=> 'Custom ...',

	'JOINED_DATE_FORMAT_EXPLAIN'	=> 'Here you can set the “Joined” date format that will appear on Viewtopic, Memberlist and the member’s profile.',

	'MEMBERLIST_FORMAT'				=> 'Joined date format for Memberlist',
	'MEMBERLIST_FORMAT_EXPLAIN'		=> 'Set the date format for the “joined” date on Memberlist.<br>Leave blank to use the user default date format.',

	'PROFILE_FORMAT'				=> 'Joined date format for profile',
	'PROFILE_FORMAT_EXPLAIN'		=> 'Set the date format for the “joined” date on a member’s profile.<br>Leave blank to use the user default date format.',

	'VERSION'						=> 'Version',
	'VIEWTOPIC_FORMAT'				=> 'Joined date format for Viewtopic',
	'VIEWTOPIC_FORMAT_EXPLAIN'		=> 'Set the date format for the “joined” date on Viewtopic.<br>Leave blank to use the user default date format.',

	'dateformats'	=> array_merge($lang['dateformats'], array(
		'F Y'		=> 'January 2008',
		'd F Y'		=> '1 January 2008',
		'|F Y|'		=> 'Today / January 2008',
		'|d F Y|'	=> 'Today / 1 January 2008',
	)),
));
