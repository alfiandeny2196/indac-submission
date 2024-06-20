<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
header("location: login.php");
} else {
    include "_config/config-main.php";
    include "function/global.php";
    include "head.php";
    include "top-nav.php";
    include "side-menu.php";
    include "content.php";
    include "sidebar-right.php";
    include "footer.php";
}
?>