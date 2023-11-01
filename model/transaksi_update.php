<?php
ob_start();
require_once('../koneksi/+koneksi.php');
require_once('../model/database.php');
include "../model/m_transaksi.php";

$connection = new Database($host, $user, $pass, $database);
$transaksi = new Transaksi($connection);

$invoice = $_POST['invoice'];
$keterangan = $connection->conn->real_escape_string($_POST['keterangan']);

$transaksi->edit("UPDATE transaksi SET keterangan = '$keterangan' WHERE invoice = '$invoice'");
echo "<script>window.location='?halaman=transaksi';</script>";
