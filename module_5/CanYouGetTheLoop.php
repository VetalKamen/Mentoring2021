<?php
function loop_size( Node $node ): int {
	$slowNode = $node;
	$fastNode = $slowNode->getNext()->getNext();

	if ( $slowNode === $fastNode ) {
		return 1;
	}

	while ( $slowNode !== $fastNode ) {
		$slowNode = $slowNode->getNext();
		$fastNode = $fastNode->getNext()->getNext();
	}

	$loop_size = 0;

	do {
		$loop_size += 1;
		$slowNode  = $slowNode->getNext();
		$fastNode  = $fastNode->getNext()->getNext();
	} while ( $slowNode !== $fastNode );

	return $loop_size;
}