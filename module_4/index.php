<?php
require 'ItemController.php';

$items = $controller->list();

if ( isset( $_GET['sort'] ) ) {
	if ( $_GET['sort'] == 'name' ) {
		$items = $controller->sortByName();
	} elseif ( $_GET['sort'] == 'price' ) {
		$items = $controller->sortByPrice();
	}
}
$currentPage = isset( $_GET['page'] ) ? (int) $_GET['page'] : 1;

$perPage   = 5;
$pageCount = ceil( count( $items ) / $perPage );
$items     = array_slice( $items, ( $currentPage - 1 ) * 5, 5 );

if ( isset( $_POST['name'] ) ) {
	$items = $controller->searchByName( $_POST['name'] );
}

if ( ! empty( $_POST['id'] ) ) {
	$item = $controller->find( $_POST['id'] );
	$controller->delete( $item );
}

?>

<?php include 'templates/header.php'; ?>
<main>
    <form method="post">
        <input type="text" name="name" placeholder="enter name fo search"/>
        <input type="submit" name="submit">
    </form>
    <div class="container">
        <table cellspacing="2" border="1" cellpadding="5" width="600">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col"><a href="?<?= http_build_query( array_merge( $_GET, [ 'sort' => 'name' ] ) ) ?>">
                        NAME</a>
                </th>
                <th scope="col">DESC</th>
                <th scope="col"><a href="?<?= http_build_query( array_merge( $_GET, [ 'sort' => 'price' ] ) ) ?>">
                        PRICE</a>
                </th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ( $items as $item ): ?>
                <tr>
                    <td><?php echo $item->get_id(); ?></td>
                    <td><?php echo $item->get_name(); ?></td>
                    <td><?php echo $item->get_description(); ?></td>
                    <td><?php echo $item->get_price(); ?></td>
                    <td>
                        <form action="edit.php" method="post">
                            <input name="id" hidden value="<?php echo $item->get_id() ?>"/>
                            <input type="submit" value="Edit"/>
                        </form>
                        <br>
                        <form method="post">
                            <input name="id" hidden value="<?php echo $item->get_id() ?>"/>
                            <input type="submit" value="Delete"/>
                        </form>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="navigation">
            <ul class="pagination">
				<?php for ( $i = 1; $i <= $pageCount; $i ++ ): ?>
                    <li class="page-item <?php echo $currentPage == $i ? 'active' : ''; ?>">
                        <a class="page-link" href="?<?= http_build_query( array_merge( $_GET, [ 'page' => $i ] ) ) ?>">
							<?php echo $i; ?>
                        </a>
                    </li>
				<?php endfor; ?>
            </ul>
        </nav>
        <a href="create.php" type="button">Create!</a>
    </div>
</main>
<?php include "templates/footer.php"; ?>

