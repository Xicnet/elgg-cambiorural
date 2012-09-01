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
	register_page_handler('cambiorural', 'cambiorural_page_handler');

	// Register Group Event Handlers
	// #24 -> turn email notification on for group
	register_elgg_event_handler('join','group', 'cambiorural_join_group');

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
		if (isadminloggedin()) {
			cambiorural_update_subscriptions();
		}
        break;
	default: break;
	}

}

function cambiorural_update_subscriptions() {

	// For admins only
	if (!isadminloggedin()) {
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

		// Check supscription, and update if necessary
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

function cambiorural_runonce() {

	// Disable user registration
	set_config('disable_registration', true);
}
