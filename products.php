<?php
require("config.php");
require("functions.php");
require("header.php");
$prodcatsql = "SELECT * FROM product WHERE cat_id = " . $_GET['id'] . ";";
$prodcatres = $mysqli->query($prodcatsql);
$numrows = mysqli_num_rows($prodcatres);
if($numrows == 0)
{
echo "<h1>No hay productos</h1>";
echo "No hay productos en esta categoria.";
}
else
{
echo "<table cellpadding='10'>";
while($prodrow = mysqli_fetch_assoc($prodcatres))
{
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='./productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='./productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['desc'];
echo "<p><strong>Precio: &dollar;". sprintf('%.2f', $prodrow['price']) . "</strong>";
echo "<p>[<a href='addtobasket.php?id=". $prodrow['id'] . "'>Comprar</a>]";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}
require("footer.php");
?>
