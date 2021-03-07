<?php

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $price;

	public function __construct( $name, $description, $price ) {
		$this->name        = $name;
		$this->description = $description;
		$this->price       = $price;
	}

	public function get_id() {
		return $this->id;
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function get_price() {
		return $this->price;
	}

	/**
	 * @return mixed
	 */
	public function get_description() {
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function set_description( $description ): void {
		$this->description = $description;
	}

	/**
	 * @param mixed $price
	 */
	public function set_price( $price ): void {
		$this->price = $price;
	}
}