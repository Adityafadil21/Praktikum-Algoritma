<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); //halaman login
exit();
?>