<?php
require_once 'LetterPosition.php';

class LetterMiddle implements LetterPosition {

	public function get_position() {
		return 'Middle';
	}
}