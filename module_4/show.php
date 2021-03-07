<?php

?>
<?php include 'templates/header.php'; ?>
<div>
    <h2>Showing-></h2>
	<?php if ( ! empty( $item ) ) : ?>
        <p>Id: <?php echo $item->get_id(); ?></p>
        <p>Name:<?php echo $item->get_name(); ?></p>
        <p>Desc:<?php echo $item->get_description(); ?></p>
        <p>Price:<?php echo $item->get_price(); ?></p>
	<?php endif; ?>
</div>
<div><a href="index.php">go back to list</a></div>
<?php include 'templates/footer.php'; ?>
