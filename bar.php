<h1>Productos</h1>
<ul>
<?php
$catsql = "SELECT * FROM categories;";
$catres = $mysqli->query($catsql);
while($catrow = $catres->fetch_object())
{
echo "<li><a href='" . $config_basedir. "products.php?id=" . $catrow->id . "'>". $catrow->name . "</a></li>";
}
?>
</ul>
