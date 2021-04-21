<?php
require_once 'NumberPosition.php';

class NumberFront implements NumberPosition {

	public function get_position() {
		return 'Front';
	}
}