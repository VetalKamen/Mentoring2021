<?php

$_fp = fopen( "php://stdin", "r" );
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf( $_fp, "%d", $number_of_queries );
$main_heap = new SplMinHeap();
$to_remove = new SplMinHeap();

for ( $i = 0; $i < $number_of_queries; $i ++ ) {
	$number = null;
	fscanf( $_fp, "%d%d", $command, $number );

	if ( ! empty( $number ) ) {

		if ( $command == 1 ) {

			$main_heap->insert( $number );
		} else {

			$to_remove->insert( $number );
		}
	} else {

		while ( ! $to_remove->isEmpty() ) {

			if ( $main_heap->top() == $to_remove->top() ) {

				$main_heap->extract();
				$to_remove->extract();
			} else {

				break;
			}
		}

		echo $main_heap->top() . "\n";
	}
}
?>
