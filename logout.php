<?php
session_start();
unset($_SESSION["admin_name"]);
session_destroy();
echo "<script language=javascript>location.href='index.php';</script>";
?>