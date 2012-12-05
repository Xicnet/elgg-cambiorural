<?php
/**
 * Cambio Rural Project Customizations
 *
 * This plugin contains minor changes to the main system to tailor the
 * functionality to follow the project's policy.
 *
 *
 */

elgg_register_event_handler('init', 'system', 'cambiorural_init');

function cambiorural_init() {
	// Set locale for dates
// js?	@setlocale(LC_TIME, 'es_AR');

	// Register Library

	// Register Tests

	// Register PageHandler
	elgg_register_page_handler('cambiorural', 'cambiorural_page_handler');

	// Register Group Event Handlers
	// #24 -> turn email notification on for group
	elgg_register_event_handler('join','group', 'cambiorural_join_group');

	// #44 Register login page handler
	elgg_register_event_handler('login:forward', 'user', 'cambiorural_login_forward');

	// Run on upgrades
	elgg_register_event_handler('upgrade', 'system', 'cambiorural_run_upgrades');

	// Run One-Time Setup
	run_function_once('cambiorural_run_once');

	// Force the language strings override
	register_translations(elgg_get_plugins_path() . "cambiorural/languages/");

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

function cambiorural_login_forward($hook, $type, $value, $params) {

	if ($value === TRUE) {
		return $value;
	}

	forward('/dashboard');

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
		$site->name        = 'Red Cambio Rural';
		$site->email       = 'noresponder@magyp.gob.ar';
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

		// Run regular upgrades
		cambiorural_run_upgrades();
	}

}

// Run on upgrades
function cambiorural_run_upgrades() {

	error_log('cambiorural_run_upgrades starting...');

/**
	// disable all plugins
	$plugins = elgg_get_plugins('active');
	foreach ($plugins AS $plugin) {
		error_log("cambiorural_run_upgrades disable  $plugin->title");
		if ('cambiorural' == $plugin->title) {
			// do not disable ourself!
			continue;
		}
//		$plugin->deactivate();
		$plugin->disable();
		$plugin->setPriority('top');
		error_log("cambiorural_run_upgrades DISABLED $plugin->title");
	}
*/
	// enable plugin cambiorural (do not activate :P )
//	$cambiorural = elgg_get_plugin_from_id('cambiorural');
//	if ($cambiorural) {
//		$cambiorural->enable();
//	}

	// enable plugins in order
	// 1. developers goes first
    // 2. htmlawed
    // 3. stuff that does not depend on anything
    // 4. thewire
    // 5. pages
    // 6. dependencies on page
    // 7. groups
    // 8. dependencies on groups
    // 9. languages
    // 10. cambiorural
    // 11. last: cambiorural_theme
	$enabled = array(
					 'developers',
					 'htmlawed',
					 'uservalidationbyemail',
					 'reportedcontent',
					 'search',
					 'tagcloud',
					 'thewire',
					 'pages',
					 'informer',
					 'garbagecollector',
					 'friendrequest',
					 'favorites',
					 'groups',
					 'group_alias',
					 'group_operators',
					 'subgroups',
					 'relatedgroups',
					 'members',
					 'file',
					 'embed',
					 'dashboard',
					 'profile',
					 'messages',
					 'informe',
					 'notifications',
//					 'elggman',
					 'tasks',
					 'threads',
					 'linkup',
					 'river_privacy',
					 'menu_builder',
					 // those must come last!
					 'languages',
// do not run self			 'cambiorural',
					 'cambiorural_theme',
					 );

	foreach ($enabled AS $plugin_name) {
		error_log("cambiorural_run_upgrades enable  $plugin_name");
   		$plugin = elgg_get_plugin_from_id($plugin_name);
		if ($plugin) {
			$plugin->enable();
			$plugin->setPriority('last');
			$plugin->activate();
			error_log("cambiorural_run_upgrades ENABLED  $plugin_name");
		}

	}
	// Activate these last
	$plugin = elgg_get_plugin_from_id('cambiorural');
	if ($plugin)
		$plugin->setPriority('last');
	$plugin = elgg_get_plugin_from_id('cambiorural_theme');
	if ($plugin)
		$plugin->setPriority('last');

	// empty site menu
	$custom_menu_items   = array();
	elgg_save_config('site_custom_menu_items', $custom_menu_items);

	$featured_menu_names = array();
	elgg_save_config('site_featured_menu_names', $featured_menu_names);

//	sleep(20);
}

