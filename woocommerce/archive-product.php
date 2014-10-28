<?php
echo "archive-product.php  ";
$catId = get_the_terms( $post->ID );
echo $catId;
?>