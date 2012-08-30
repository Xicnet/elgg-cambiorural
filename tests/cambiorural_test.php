<?php
/**
 * Elgg Test for Cambiorural plugin
 *
 * register_plugin_hook('unit_test', 'system', 'cambiorural_test');
 *
 * function cambiorural_test($hook, $type, $value, $params) {
 *   $value[] = "path/to/my/unit_test.php";
 *   return $value;
 * }
 *
 * @package Elgg
 * @subpackage Test
 */
class ElggCambioruralTicket24Test extends ElggCoreUnitTest {

	var $ticket24;

	/**
	 * Called before each test object.
	 */
	public function __construct() {
		parent::__construct();

		// all __construct() code should come after here

		// A user for ticket #24
		$ticket24 = new ElggUser();
		$ticket24->username = 'ticket24';
		$ticket24->password = 'testuser';
		$ticket24->salt     = 'weaksalt';
		$ticket24->email    = 'ticket24@example.com';
		$ticket24->save();
		enable_entity($ticket24->guid);
		// Subscribe it to some groups
		$groups = get_data("SELECT guid FROM elgg_groups_entity LIMIT 5");
		foreach ($groups AS $group) {
			add_entity_relationship($ticket24->guid, 'member', $group->guid);
		}
		$this->ticket24 = $ticket24;
	}

	/**
	 * Called before each test method.
	 */
	public function setUp() {

	}

	/**
	 * Called after each test method.
	 */
	public function tearDown() {
		// do not allow SimpleTest to interpret Elgg notices as exceptions
		$this->swallowErrors();
	}

	/**
	 * Called after each test object.
	 */
	public function __destruct() {

		// Remove user ticket24
		delete_entity($this->ticket24);

		// all __destruct() code should go above here
		parent::__destruct();
	}

	/**
	 * Ticket #15: tags -> palabras claves
	 */
	public function testTicket15() {
		$this->assertEqual(elgg_echo('tag'), 'palabra clave');
		$this->assertEqual(elgg_echo('tags'), 'Palabras claves');
	}

	/**
	 * Ticket #24: group notifyemail on
	 */
	public function testTicket24() {
		$user = $this->ticket24;
		$groups = get_users_membership($user->guid);
		foreach ($groups AS $group) {
			$this->assertTrue(check_entity_relationship($user->guid, 'notifyemail', $group->guid));
		}
	}
}
