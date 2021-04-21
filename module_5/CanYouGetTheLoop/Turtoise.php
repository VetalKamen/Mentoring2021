<?php
require_once 'Moveable.php';

class Turtoise implements Moveable {
	private $node;

	public function __construct( $node ) {
		$this->node = $node;
	}

	public function next_step() {
		$this->node = $this->node->getNext();
	}

	public function get_position() {
		return $this->node;
	}
}