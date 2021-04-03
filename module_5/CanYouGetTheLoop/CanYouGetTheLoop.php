<?php
require_once 'Rabbit.php';
require_once 'Turtoise.php';

function loop_size( Node $node ): int {
	$turtoise = new Turtoise($node);
	$rabbit = new Rabbit($node);

	if ( $turtoise->get_position() === $rabbit->get_position() ) {
		return 1;
	}

	while ( $turtoise->get_position() !== $rabbit->get_position() ) {
		$turtoise->next_step();
		$rabbit->next_step();
	}

	$loop_size = 0;

	do {
		$loop_size += 1;
		$turtoise->next_step();
		$rabbit->next_step();
	} while ( $turtoise->get_position() !== $rabbit->get_position() );

	return $loop_size;
}