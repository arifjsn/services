<?php
class Pelayanan
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Pelanggan 
    public function tampil_pelanggan($no_identitas = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM pelanggan";
        if ($no_identitas != null) {
            $sql .= " WHERE no_identitas = $no_identitas";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah_pelanggan($no_identitas, $nama, $alamat, $no_hp)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO pelanggan VALUES ('$no_identitas','$nama', '$alamat', '$no_hp')") or die($db->error);
    }

    public function edit_pelanggan($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus_pelanggan($no_identitas)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM pelanggan WHERE no_identitas = '$no_identitas' ") or die($db->error);
    }

    // Transaksi
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

    public function tampil_transaksi_selesai()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM transaksi WHERE nama_pengirim !=''";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah_transaksi($invoice, $nama_customer, $nama_barang, $nama_pemilik, $serial_number, $kelengkapan_barang, $keluhan, $keterangan, $teknisi, $nama_pengambil)
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

    public function edit_transaksi($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus_transaksi($invoice)
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

    // Riwayat
    public function tampil_riwayat($id_riwayat = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM riwayat";
        if ($id_riwayat != null) {
            $sql .= " WHERE id_riwayat = $id_riwayat";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function lihat_riwayat($no_identitas)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM transaksi,riwayat,pelanggan WHERE riwayat.no_pelanggan=pelanggan.no_identitas AND transaksi.nama_customer=pelanggan.no_identitas AND transaksi.invoice=riwayat.no_transaksi AND riwayat.no_pelanggan=$no_identitas";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah_riwayat($no_pelanggan, $no_transaksi)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO riwayat VALUES ('','$no_pelanggan', '$no_transaksi')") or die($db->error);
    }

    // Destruct
    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
