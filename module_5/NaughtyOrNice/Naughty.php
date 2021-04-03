<?php
require_once 'Behaviour.php';

class Naughty extends Behaviour {

	public function is_valid( $action ) {
		if ( strpos( 'bfk', $action[0] ) !== false ) {
			return true;
		}

		return false;
	}
}