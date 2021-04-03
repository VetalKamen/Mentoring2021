<?php
require_once 'LetterPosition.php';

class LetterRight implements LetterPosition {

	public function get_position() {
		return 'Right';
	}
}