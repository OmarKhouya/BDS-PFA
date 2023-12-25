<?php 
if (isset($_GET['redirect'])) {
    $link = $_GET['redirect'];
    header("Location: $link.php");
    exit;
}
?>