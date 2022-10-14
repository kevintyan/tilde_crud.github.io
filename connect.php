<?php
$conn = mysqli_connect("localhost", "root", "", "ruang_tilde");

if (!$conn) {
    die("Connection Failed". mysqli_connect_error());
}
?>