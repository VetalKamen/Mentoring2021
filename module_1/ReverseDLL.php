<?php

function reverse($head) {
	$next = $head->next;
	$head->next = $head->prev;
	$head->prev = $next;

	return $next == null ? $head : reverse($next);
}
