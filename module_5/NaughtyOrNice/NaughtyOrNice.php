<?php
require_once 'Naughty.php';
require_once 'Nice.php';

function what_list_am_i_on( array $actions ): string {
	$naughty = new Naughty( $actions );
	$nice    = new Nice( $actions );

	return $naughty->get_count() >= $nice->get_count() ? 'naughty' : 'nice';
}