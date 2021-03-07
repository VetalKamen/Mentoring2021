<?php
require 'ItemController.php';

if ( isset( $_POST['submit'] ) ) {
	$controller->edit(
		$_POST['id'],
		$_POST['name'],
		$_POST['description'],
		$_POST['price']
	);
} else {
	$current_item = $controller->find( $_POST['id'] );
}
?>

<?php include 'templates/header.php'; ?>
    <div>
        <h2>Edit item here:</h2>
        <form method="post">
            <input type="number" name="id" hidden value="<?php echo $current_item->get_id(); ?>"/>
            <input type="text" name="name" value="<?php echo $current_item->get_name(); ?>"/>
            <input type="text" name="description" value="<?php echo $current_item->get_description(); ?>"/>
            <input type="number" name="price" value="<?php echo $current_item->get_price(); ?>"/>
            <input type="submit" name="submit" value="Submit!">
        </form>
        <div><a href="index.php">go back to list</a></div>
    </div>
<?php include 'templates/footer.php'; ?>