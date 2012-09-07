<?php
/**
 * Cambio Rural Project Customizations
 *
 * This plugin contains minor changes to the main system to tailor the
 * functionality to follow the project's policy.
 *
 * 
 */

register_elgg_event_handler('init', 'system', 'cambiorural_init');

function cambiorural_init() {
	// Register Library

	// Register Tests

	// Register PageHandler
	elgg_register_page_handler('cambiorural', 'cambiorural_page_handler');

	// Register Group Event Handlers
	// #24 -> turn email notification on for group
	elgg_register_event_handler('join','group', 'cambiorural_join_group');

	// Run One-Time Setup
	run_function_once('cambiorural_run_once');
}

function cambiorural_test($hook, $type, $value, $params) {
	global $CONFIG;
	$value[] = "{$CONFIG->path}mod/cambiorural/tests/cambiorural_test.php";
	return $value;
}

/**
 * Run hook when a user joins a group
 */
function cambiorural_join_group($event, $type, $object) {

	if ($event == 'join' && $type == 'group') {

		$user  = $params['user'];
		$group = $params['group'];

		// #24: Automatically subscribe user to group's email notifications
		add_entity_relationship($user->guid, 'notifyemail', $group->guid);

	}
}

function cambiorural_page_handler($page) {

	switch($page[0]) {
	case '24':
		// #24: update email notification for all users in all groups
		if (elgg_is_admin_logged_in()) {
			cambiorural_update_subscriptions();
		}
        break;
	default: break;
	}

}

function cambiorural_update_subscriptions() {

	// For admins only
	if (!elgg_is_admin_logged_in()) {
		return FALSE;
	}

	// All users
	$users = elgg_get_user_entities();

	foreach ($users AS $u) {

		// Get the actual user entity
		$user_guid = $u->guid;
		$user      = get_entity($user_guid);

		// Ignore banned users
		if (!$user || $user->banned) { continue; }

		// Turn on email notification
		set_user_notification_setting($user_guid, 'email', true);

		// List subscribed groups' ids
		$groups = get_users_membership($user_guid);

		// Stop here if we don't have any group
		if (!is_array($groups)) { continue; }

		// Check subscription, and update if necessary
		foreach($groups as $group) {
			if (!check_entity_relationship($user_guid, 'notifyemail', $group->guid)) {
				// Subscribe user to that group's email notifications
				add_entity_relationship($user_guid, "notifyemail", $group->guid);
			}
		}

	}

}

// when user leaves group, stop notifications
// should be un-necessary
//function cambiorural_leave_group_hook() {}

function cambiorural_run_once() {

	if ($site = elgg_get_site_entity()) {
		if (!($site instanceof ElggSite)) {
			throw new InstallationException(elgg_echo('InvalidParameterException:NonElggSite'));
		}

		// configure site
		$site->name  = 'Red Cambio Rural';
		$site->email = 'no-reply@cambiorural.xicnet.com';
		$site->description = 'La red social del sector agrícola Argentino';
		$site->save();

		// set language to spanish
		set_config('language', 'es', $site->getGUID());

		// disable user registration
		set_config('allow_registration', FALSE, $site->getGUID());

		// disable public views
      	 set_config('walled_garden', TRUE, $site->getGUID());

		// enforce default accesses on all users
		set_config('allow_user_default_access', FALSE, $site->getGUID());

		// disable unwanted plugins
		$disabled = array(
			'admins',
			'audio_html5',
			'blog',
			'bookmarks',
// 'cambiorural',
// 'cambiorural_theme',
			'categories',
			'custom_index',
			'custom_index_widgets',
			'dashboard',
			'developers',
			'diagnostics',
			'dokuwiki',
			'elggpg',
			'embed',
			'etherpad',
			'externalpages',
			'file',
			'friendrequests',
			'garbagecollector',
			'group_alias',
			'group_operators',
			'groups',
			'habitorio_theme',
			'htmlawed',
			'identica',
			'infinite_scroll',
			'invitefriend',
			'languages',
			'likes',
			'logbrowser',
			'logrotate',
			'magic_topbar',
			'member',
			'messageboard',
			'messages',
			'minify',
			'notification',
			'oauth_api',
			'online',
			'opensearch',
			'pages',
			'powered',
			'profile',
			'purity_theme',
			'registrationterms',
			'relatedgroup',
			'reportedcontent',
			'river_privacy',
			'search',
			'simple_faq',
			'spotlight',
			'subgroups',
			'suicide',
			'tagcloud',
			'thewire',
			'tinymce',
			'translation_editor',
			'twitter',
			'twitter_api',
			'uservalidationbyemail',
			'videolist',
			'zaudio',
		);
		foreach ($disabled AS $plugin) {
			disable_plugin($plugin);
		}

		// enable plugins
		$enabled = array(
						 'developers',
						 'htmlawed',
						 'uservalidationbyemail',
						 'reportedcontent',
						 'search',
						 'tagcloud',
						 'thewire',
						 'pages',
						 'informes',
						 'garbagecollector',
						 'friendrequest',
						 'groups',
						 'group_alias',
						 'group_operators',
						 'subgroups',
						 'relatedgroups',
						 'members',
						 'dokuwiki',
						 'file',
						 'embed',
						 'dashboard',
						 'profile',
						 'messages',
						 'notifications',
						 'elggman',
						 'tasks',
						 'threads',
						 'linkup',
						 'river_privacy',
						 'languages',
						 'cambiorural',
						 'cambiorural_theme',
		);

		foreach ($enabled AS $plugin_name) {
			$plugin = elgg_get_plugin_from_id($plugin_name);
			if ($plugin) {
				$plugin->enable();
				$plugin->setPriority('last');
				$plugin->activate();
			} 

		}
	
		// configure site menu
		$custom_menu_items   = array();
		//	   $custom_menu_items['Inicio'] = '/dashboard/[username]';
		//$custom_menu_items['Perfil'] = '/profile/[username]';
		//$custom_menu_items['Correo'] = '/message/inbox/[username]';
		//$custom_menu_items['Amigxs'] = '/friends/[username]';
		//		$custom_menu_items['Grupos'] = '/groups/all';
		//		$custom_menu_items['Herramientas'] = '#';

		elgg_save_config('site_custom_menu_items', $custom_menu_items);

		$featured_menu_names = array();
		$featured_menu_names[] = 'dashboard';
		$featured_menu_names[] = 'profile';
		$featured_menu_names[] = 'messages';
		$featured_menu_names[] = 'friends';
		$featured_menu_names[] = 'groups';

		elgg_save_config('site_featured_menu_names', $featured_menu_names);

	}

}
