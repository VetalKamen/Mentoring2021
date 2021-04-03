<?php
require_once 'Behaviour.php';

class Nice extends Behaviour {

	public function is_valid( $action ) {
		if ( strpos( 'gsn', $action[0] ) !== false ) {
			return true;
		}

		return false;
	}
}