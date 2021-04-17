<?php

require_once dirname( __DIR__ ) . '/Model/Item.php';
require_once dirname( __DIR__ ) . '/View/View.php';
require_once dirname( dirname( __DIR__ ) ) . '/bootstrap.php';

class ItemController {
	private $em;

	public function __construct( $em ) {
		$this->em = $em;
	}

	public function create( $name, $description, $price ) {
		$item = new Item( $name, $description, $price );

		$this->em->persist( $item );
		$this->em->flush();
		$view = new View( 'show' );

		$view->assign( 'item', $item );
	}

	public function find( $id ) {
		return $this->em->find( 'Item', $id );
	}

	public function edit( $id, $name, $description, $price ) {

		$item = $this->em->getRepository( Item::class )->find( $id );
		$item->set_name( $name );
		$item->set_description( $description );
		$item->set_price( $price );
		$this->em->flush();

		$view = new View( 'show' );
		$view->assign( 'item', $item );
	}

	public function list() {
		$itemRepository = $this->em->getRepository( 'Item' );
		$items          = $itemRepository->findAll();

		return $items;
	}

	public function delete( $item ) {
		$this->em->remove( $item );
		$this->em->flush();
		header( 'Location: index.php' );
	}

	public function show( $id ) {
		$item = $en->find( 'Item', $id );

		if ( $item === null ) {
			echo "No item found.\n";
			exit( 1 );
		}
		$view = new View( 'show' );
		$view->assign( 'item', $item );
	}
}

$controller = new ItemController( $en );