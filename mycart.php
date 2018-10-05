<?php
session_start();

$con = mysqli_connect("localhost","root","","mydb");

if(mysqli_connect_errno())
{
	echo "Error :". mysqli_connect_error();
}

include 'class.php';
$a = new usuario();
$a->sessionstarter();

$stmt = $a->conn->prepare("SELECT p.name AS name, 
		p.desc AS img,
		sp.quantity AS quantity,
		sp.a_price AS price
		FROM shopping_cart AS sc,
		INNER JOIN shopped_product AS sp ON (sp.shopping_cart_id = sc.id)
		INNER JOIN product AS p ON (sp.product_id = p.id)
		WHERE sc.user_id = ?");
$stmt->bind_param($_SESSION[id]);
$result = $stmt->execute();

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


