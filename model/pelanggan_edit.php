<?php
ob_start();
require_once('../koneksi/+koneksi.php');
require_once('../model/database.php');
include "../model/m_pelanggan.php";

$connection = new Database($host, $user, $pass, $database);
$pelanggan = new Pelanggan($connection);

$id = $_POST['no_identitas'];
$nama = $connection->conn->real_escape_string($_POST['nama']);
$username = $connection->conn->real_escape_string($_POST['username']);
$password = $connection->conn->real_escape_string($_POST['password']);
$alamat = $connection->conn->real_escape_string($_POST['alamat']);
$no_hp = $connection->conn->real_escape_string($_POST['no_hp']);

$pelanggan->edit("UPDATE pelanggan SET nama = '$nama', username = '$username', password = '$password', alamat = '$alamat', no_hp= '$no_hp' WHERE no_identitas = '$id'");
echo "<script>window.location='?halaman=data_pelanggan';</script>";
