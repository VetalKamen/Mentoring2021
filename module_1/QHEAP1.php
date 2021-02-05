<?php
$_fp = fopen( "php://stdin", "r" );
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$minHeap[] = 0;
$Q         = fgets( $_fp );
for ( $i = 0; $i < $Q; $i ++ ) {
	$line     = fgets( $_fp );
	$arr_temp = explode( ' ', $line );
	if ( intval( $arr_temp[0] ) == 1 ) {
		$minHeap[] = intval( $arr_temp[1] );
		bubbleUp( $minHeap, count( $minHeap ) - 1 );
	}
	if ( intval( $arr_temp[0] ) == 2 ) {
		$index = find( $minHeap, intval( $arr_temp[1] ) );
		remove( $minHeap, $index );
	}
	if ( ! empty( $minHeap[1] ) && intval( $arr_temp[0] ) == 3 ) {
		echo $minHeap[1] . "\r\n";
	}
}

// case = 1
function bubbleUp( &$heap, $index ) {
	if ( count( $heap ) - 1 == 1 ) {
		return;
	}
	while ( true ) {
		if ( $index == 1 ) {
			return;
		}
		if ( $heap[ $index ] > $heap[ getParentIndex( $index ) ] ) {
			break;
		}
		if ( $heap[ $index ] < $heap[ getParentIndex( $index ) ] ) {
			swap( $heap, getParentIndex( $index ), $index );
			$index = getParentIndex( $index );
		}

	}
}

function getParentIndex( $index ) {
	return $index / 2;
}

function swap( &$heap, $parentIndex, $index ) {
	$temp                 = $heap[ $index ];
	$heap[ $index ]       = $heap[ $parentIndex ];
	$heap[ $parentIndex ] = $temp;
}

// case = 2
function find( $heap, $value ) {
	for ( $i = 0; $i < count( $heap ); $i ++ ) {
		if ( $value == $heap[ $i ] ) {
			return $i;
		}
	}

	return 0;
}

function remove( &$heap, $index ) {
	$temp           = $heap[ count( $heap ) - 1 ];
	$heap[ $index ] = $temp;
	unset( $heap[ count( $heap ) - 1 ] );
	$heap = array_values( $heap );
	bubbleDown( $heap, $index );
}

function getLeftChildIndex( $heap, $index ) {
	if ( 2 * $index < count( $heap ) ) {
		return 2 * $index;
	}

	return - 1;
}

function getRightChildIndex( $heap, $index ) {
	if ( 2 * $index + 1 < count( $heap ) ) {
		return 2 * $index + 1;
	}

	return - 1;
}

function bubbleDown( &$heap, $index ) {
	while ( ( getLeftChildIndex( $heap, $index ) > 0 && $heap[ $index ] > $heap[ getLeftChildIndex( $heap, $index ) ] )
	        || getRightChildIndex( $heap, $index ) > 0 && $heap[ $index ] > $heap[ getRightChildIndex( $heap, $index ) ]
	) {
		$leftChildVal  = 0;
		$rightChildVal = 0;
		if ( getLeftChildIndex( $heap, $index ) > 0 ) {
			$leftChildVal = $heap[ getLeftChildIndex( $heap, $index ) ];
		}
		if ( getRightChildIndex( $heap, $index ) > 0 ) {
			$rightChildVal = $heap[ getRightChildIndex( $heap, $index ) ];
		}
		if ( getLeftChildIndex( $heap, $index ) > 0 && $leftChildVal < $rightChildVal ) {
			swap( $heap, getLeftChildIndex( $heap, $index ), $index );
			$index = getLeftChildIndex( $heap, $index );
		} elseif ( getRightChildIndex( $heap, $index ) > 0 ) {
			swap( $heap, getRightChildIndex( $heap, $index ), $index );
			$index = getRightChildIndex( $heap, $index );
		} else {
			swap( $heap, getLeftChildIndex( $heap, $index ), $index );
			$index = getLeftChildIndex( $heap, $index );
		}
	}
}
