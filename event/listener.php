<?php
/**
*
* @package Joined Date Format Extension
* @copyright (c) 2015 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\joineddate\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor for listener
	*
	* @param \phpbb\config\config	$config	Config object
	* @param \phpbb\user			$user	User object
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\user $user)
	{
		$this->config	= $config;
		$this->user		= $user;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.viewtopic_cache_user_data'		=> 'modify_viewtopic',
			'core.memberlist_prepare_profile_data'	=> 'modify_profile',
		);
	}

	/**
	* Modify the joined date format in viewtopic
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function modify_viewtopic($event)
	{
		$user_cache_data	= $event['user_cache_data'];
		$row				= $event['row'];

		$user_cache_data['joined'] = $this->user->format_date($row['user_regdate'], $this->config['joined_dateformat_viewtopic']);

		$event->offsetSet('user_cache_data', $user_cache_data);
	}

	/**
	* Modify the joined date format in memberlist
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function modify_profile($event)
	{
		$data			= $event['data'];
		$template_data	= $event['template_data'];

		// Are we changing profile or memberlist?
		if (strlen($template_data['U_NOTES']) > 0)
		{
			$template_data['JOINED'] 		= $this->user->format_date($data['user_regdate'], $this->config['joined_dateformat_profile']);
			$template_data['LAST_ACTIVE']	= ($data['user_lastvisit']) ? $this->user->format_date($data['user_lastvisit'], $this->config['joined_dateformat_profile']) : '-';
		}
		else
		{
			$template_data['JOINED'] = $this->user->format_date($data['user_regdate'], $this->config['joined_dateformat_memberlist']);
		}

		$event->offsetSet('template_data', $template_data);
	}
}
