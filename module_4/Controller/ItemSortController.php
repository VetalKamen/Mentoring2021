<?php
require_once dirname( dirname( __DIR__ ) ) . '/bootstrap.php';

class ItemSortController {
	private $em;

	public function __construct( $em ) {
		$this->em = $em;
	}

	public function sortByName() {
		$qb = $this->em->createQueryBuilder();

		$qb->select( 'i' )
		   ->from( 'Item', 'i' )
		   ->OrderBy( 'i.name', 'ASC' );

		return $qb->getQuery()->getResult();
	}

	public function sortByPrice() {
		$qb = $this->em->createQueryBuilder();

		$qb->select( 'i' )
		   ->from( 'Item', 'i' )
		   ->OrderBy( 'i.price', 'ASC' );

		return $qb->getQuery()->getResult();
	}
}

$sortController = new ItemSortController( $en );