<?php
/*
 * Complete the cookies function below.
 */
function cookies( $k, $A ) {
	if ( empty( $A ) || empty( $k ) ) {
		return - 1;
	}
	$num_oper = 0;
	$heap = new SplMinHeap();

	foreach ( $A as $val ) {
		$heap->insert( $val );
	}
	while ( $heap->count() !== 1 && $heap->top() < $k ) {
		$heap->insert( $heap->extract() + 2 * $heap->extract() );
		$num_oper ++;
	}

	if ( $heap->top() < $k ) {
		return - 1;
	}

	return $num_oper;
}