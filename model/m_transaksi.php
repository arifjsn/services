<?php
class Transaksi
{
	private $mysqli;

	function __construct($conn)
	{
		$this->mysqli = $conn;
	}

	public function tampil($invoice = null)
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM transaksi";
		if ($invoice != null) {
			$sql .= " WHERE invoice = $invoice";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tampil_transaksi()
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM transaksi WHERE nama_pengirim =''";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tampil_pelanggan($no_identitas)
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM transaksi WHERE nama_customer=$no_identitas";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tampil_selesai()
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM transaksi WHERE nama_pengirim !=''";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function tambah($invoice, $nama_customer, $nama_barang, $nama_pemilik, $serial_number, $kelengkapan_barang, $keluhan, $keterangan, $teknisi, $nama_pengambil)
	{
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO transaksi VALUES ('$invoice', now(),'$nama_customer','$nama_barang', '$nama_pemilik', '$serial_number', '$kelengkapan_barang' , '$keluhan','$keterangan', '$teknisi','$nama_pengambil','','','')") or die($db->error);
	}

	public function tampil_tanggal($tgl1, $tgl2)
	{
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM transaksi WHERE tanggal_masuk BETWEEN '$tgl1' AND '$tgl2' ";
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	public function edit($sql)
	{
		$db = $this->mysqli->conn;
		$db->query($sql) or die($db->error);
	}

	public function hapus($invoice)
	{
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM transaksi WHERE invoice = '$invoice' ") or die($db->error);
	}

	public function nama_customer($no_identitas)
	{
		$db = $this->mysqli->conn;
		$data = $db->query("SELECT * FROM pelanggan WHERE no_identitas = '$no_identitas'") or die($db->error);
		return $data;
	}

	function __destruct()
	{
		$db = $this->mysqli->conn;
		$db->close();
	}
}
