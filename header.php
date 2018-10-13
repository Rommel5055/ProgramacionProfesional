<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");

?>

<head>
<title><?php echo $config_sitename; ?></title>

<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header">
<h1><?php echo $config_sitename; ?></h1>
</div>
<div id="menu">
<a href="<?php echo $config_basedir; ?>">Pagina Principal</a> -
<a href="<?php echo $config_basedir;?>mycart.php">Ver Carro</a>
</div>
<div id="container">
<div id="bar">
<?php
require("bar.php");
echo "<hr>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
echo "Conectado como <strong>" . $_SESSION['SESS_USERNAME']. "</strong>[<a href='" . $config_basedir. "logout.php'>Cerrar sesion</a>]";
}
else
{
echo "<a href='". $config_basedir . "login.php'>Iniciar sesion</a>";
}
?>
</div>
<div id="main">
