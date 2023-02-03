<?php

include("connections.php");

$select_rows = mysqli_query($connections, "SELECT * FROM thrift_shop_cart") or die('query failed');
$row_count = mysqli_num_rows($select_rows);

?>