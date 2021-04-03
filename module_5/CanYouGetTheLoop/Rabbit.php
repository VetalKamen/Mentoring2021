<?php
require_once 'Moveable.php';

class Rabbit implements Moveable {
	private $node;

	public function __construct( $node ) {
		$this->node = $node->getNext()->getNext();
	}

	public function next_step() {
		$this->node = $this->node->getNext()->getNext();
	}

	public function get_position() {
		return $this->node;
	}
}