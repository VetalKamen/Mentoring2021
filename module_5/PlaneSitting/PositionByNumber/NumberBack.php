<?php
require_once 'NumberPosition.php';

class NumberBack implements NumberPosition {

	public function get_position() {
		return 'Back';
	}
}