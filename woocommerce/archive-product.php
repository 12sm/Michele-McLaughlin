<?php
echo "archive-product.php";
$catId = get_the_category( $post->ID );
echo $catId;
?>