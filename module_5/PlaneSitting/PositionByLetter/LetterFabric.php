<?php
require_once 'LetterLeft.php';
require_once 'LetterRight.php';
require_once 'LetterMiddle.php';

class LetterFabric {
	private $secong_pos;
	private $letter;
	const LEFT = [ 'A', 'B', 'C' ];
	const MIDDLE = [ 'D', 'E', 'F' ];
	const RIGHT = [ 'G', 'H', 'K' ];

	public function __construct( $ticket ) {
		$this->letter = $ticket[ strlen( $ticket ) - 1 ];
		switch ( $this->letter ) {
			case in_array( $this->letter, self::LEFT ):
				$this->second_pos = new LetterLeft();
				break;
			case in_array( $this->letter, self::RIGHT ):
				$this->second_pos = new LetterRight();
				break;
			case in_array( $this->letter, self::MIDDLE ):
				$this->second_pos = new LetterMiddle();
				break;
			default:
				$this->second_pos = 'No Seat!';
				break;
		}
	}

	public function get_second_pos() {
		return $this->second_pos;
	}
}