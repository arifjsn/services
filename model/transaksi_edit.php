<?php
ob_start();
require_once('../koneksi/+koneksi.php');
require_once('../model/database.php');
include "../model/m_transaksi.php";

$connection = new Database($host, $user, $pass, $database);
$transaksi = new Transaksi($connection);

$id = $_POST['invoice'];
$nama_barang = $connection->conn->real_escape_string($_POST['nama_barang']);
$nama_pemilik = $connection->conn->real_escape_string($_POST['nama_pemilik']);
$serial_number = $connection->conn->real_escape_string($_POST['serial_number']);
$kelengkapan_barang = $connection->conn->real_escape_string($_POST['kelengkapan_barang']);
$keluhan = $connection->conn->real_escape_string($_POST['keluhan']);
$keterangan = $connection->conn->real_escape_string($_POST['keterangan']);
$teknisi = $connection->conn->real_escape_string($_POST['teknisi']);
$nama_pengambil = $connection->conn->real_escape_string($_POST['nama_pengambil']);
$biaya = $connection->conn->real_escape_string($_POST['biaya']);

$transaksi->edit("UPDATE transaksi SET nama_barang = '$nama_barang', nama_pemilik = '$nama_pemilik', serial_number = '$serial_number', kelengkapan_barang = '$kelengkapan_barang', keluhan= '$keluhan', keterangan = '$keterangan', teknisi = '$teknisi', nama_pengambil = '$nama_pengambil', biaya = '$biaya' WHERE invoice = '$id'");
echo "<script>window.location='?halaman=detail&invoice=" . $id . "';</script>";
