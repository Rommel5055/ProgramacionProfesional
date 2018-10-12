<?php
if(@$_SESSION['SESS_ADMINLOGGEDIN'] == 1)
{
echo "[<a href='" . $config_basedir . "adminorders.php'>admin</a>][<a href='". $config_basedir. "adminlogout.php'>admin logout</a>]";
}
?>
</div>
</div>
</body>
</html>

