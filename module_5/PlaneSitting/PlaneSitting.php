<?php
require_once 'PositionByNumber/NumberFabric.php';
require_once 'PositionByLetter/LetterFabric.php';

function planeSeat( $ticket ) {
	$number = new NumberFabric( $ticket );
	$letter = new LetterFabric( $ticket );


	$first_pos = $number->get_first_pos();

	$second_pos = $letter->get_second_pos();

	if ( 'No Seat!' === $first_pos || 'No Seat!' === $second_pos ) {
		return 'No Seat!';
	}

	return $first_pos->get_position() . '-' . $second_pos->get_position();
}