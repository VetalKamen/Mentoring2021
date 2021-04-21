<?php

abstract class Behaviour {
	protected $actions;
	protected $count;

	public function __construct( $actions ) {
		$this->actions = $actions;
		foreach ( $this->actions as $action ) {
			if ( $this->is_valid( $action ) ) {
				$this->count ++;
			}
		}
	}

	public function get_count() {
		return $this->count;
	}

	public abstract function is_valid( $action );
}