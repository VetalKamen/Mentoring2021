<?php
require_once dirname( dirname( __DIR__ ) ) . '/bootstrap.php';

class ItemSearchController {
	private $em;

	public function __construct( $em ) {
		$this->em = $em;
	}

	public function searchByName( $name ) {
		$qb = $this->em->createQueryBuilder();

		$qb->select( 'i' )
		   ->from( 'Item', 'i' )
		   ->where( 'i.name = :name' )
		   ->setParameter( 'name', $name );

		return $qb->getQuery()->getResult();
	}
}

$searchController = new ItemSearchController( $en );