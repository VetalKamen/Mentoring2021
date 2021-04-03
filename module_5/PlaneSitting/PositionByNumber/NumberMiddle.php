<?php
require_once 'NumberPosition.php';

class NumberMiddle implements NumberPosition {

	public function get_position() {
		return 'Middle';
	}
}