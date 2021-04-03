<?php
require_once 'NumberBack.php';
require_once 'NumberFront.php';
require_once 'NumberMiddle.php';


class NumberFabric {
	private $first_pos;
	private $number;

	public function __construct( $ticket ) {
		preg_match_all( '!\d+!', $ticket, $number );
		$this->number = $number[0][0];
		switch ( $this->number ) {
			case $this->number >= 0 && $this->number <= 20:
				$this->first_pos = new NumberFront();
				break;
			case $this->number >= 21 && $this->number <= 40:
				$this->first_pos = new NumberMiddle();
				break;
			case $this->number > 40 && $this->number <= 60:
				$this->first_pos = new NumberBack();
				break;
			default:
				$this->first_pos = 'No Seat!';
				break;
		}
	}

	public function get_first_pos() {
		return $this->first_pos;
	}
}