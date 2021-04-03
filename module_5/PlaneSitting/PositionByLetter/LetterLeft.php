<?php
require_once 'LetterPosition.php';

class LetterLeft implements LetterPosition {

	public function get_position() {
		return 'Left';
	}
}