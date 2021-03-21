<?php
function what_list_am_i_on(array $actions): string {
	$naughty = 0;
	$nice = 0;

	foreach($actions as $action){
		if(str_starts_with($action, 'b') || str_starts_with($action, 'f') || str_starts_with($action, 'k')){
			$naughty++;
		} elseif(str_starts_with($action, 'g') || str_starts_with($action, 's') || str_starts_with($action, 'n')){
			$nice++;
		}
	}

	return $naughty >= $nice ? 'naughty' : 'nice';
}