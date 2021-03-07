<?php

require 'ItemController.php';

if ( isset( $_POST['submit'] ) ) {
	$controller->create(
		$_POST['name'],
		$_POST['description'],
		$_POST['price']
	);
}
?>
<?php include 'templates/header.php'; ?>
<?php if ( isset( $_POST['submit'] ) && $controller ) { ?>
	<?php echo escape( $_POST['name'] ); ?> successfully added.
<?php } ?>
<h2>Create item here:</h2>
<div>
    <form method="post">
        <input type="text" name="name"/>
        <input type="text" name="description"/>
        <input type="number" name="price"/>
        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>
</div>
<?php include 'templates/footer.php'; ?>

