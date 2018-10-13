<?php
//session_start();

if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");
require("functions.php");
include 'class.php';
$a = new usuario();
$a->connect();
//$a->sessionstarter();

$result = mysqli_query($a->conn,"SELECT p.name AS name, 
		p.desc AS img,
		sp.quantity AS quantity,
		sp.a_price AS price
		FROM shopping_cart AS sc,
		INNER JOIN shopped_product AS sp ON (sp.shopping_cart_id = sc.id)
		INNER JOIN product AS p ON (sp.product_id = p.id)
		");
//$stmt->bind_param();
//$stmt->close();
//$result = $stmt->execute();

if ($result == FALSE || $result == ""){
	echo "Ud no tiene elementos en el carrito de compras";
}else{
	echo "<table border = '1'>
			<tr>
			<th>Product</th>
			<th>Image</th>
			<th>Quantity</th>
			<th>Price</th>
			</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<tr>" . $row['name'] . "</tr>";
		echo "<tr>" . $row['img'] . "</tr>";
		echo "<tr>" . $row['quantity'] . "</tr>";
		echo "<tr>" . $row['price'] . "</tr>";
	}
	echo "</table>";
}


