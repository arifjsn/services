<?php
require_once('../koneksi/+koneksi.php');
require_once('../model/database.php');
include('../model/m_transaksi.php');
include('../library/phpqrcode/qrlib.php');
include "../model/m_tampilan.php";

$connection = new Database($host, $user, $pass, $database);
$tampilan = new Tampilan($connection);
$transaksi = new Transaksi($connection);
$tampil = $transaksi->tampil(@$_GET['invoice']);
$link = $tampilan->tampil();
$data = $link->fetch_object();
$web = $data->url;
$nama_toko = $data->nama_web;
$telepon = $data->telepon;
$alamat = $data->alamat;
while ($data = $tampil->fetch_object()) {
    $getcustomer = $transaksi->nama_customer($data->nama_customer);
    $nama = "";
    foreach ($getcustomer as $getcustomers) {
        $nama = $getcustomers['nama'];
        $alamat = $getcustomers['alamat'];
        $no_hp = $getcustomers['no_hp'];
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Invoice <?= $data->invoice; ?></title>
        <link rel="stylesheet" href="style.css" media="all" />
        <style>
            .kolombawahposting {
                padding: 10px;
                overflow: hidden;
            }

            .kolom-kiri,
            .kolom-kanan {
                font-weight: bold;
                color: #555555;
                font-size: 15px;
                float: left;
                width: 300px;
                height: 100px;
                line-height: 20px;
                text-align: center;
                border-style: solid;
                border-width: 1.5px;
                border-color: #555555;
            }

            .kolom-kanan {
                float: right;
            }

            @media screen and (max-width:500px) {
                .kolom-kiri {
                    display: none;
                }

                .kolom-kanan {
                    width: 100%;
                }

            }

            .kepala {
                text-decoration: underline;
                text-align: center;
            }
        </style>
    </head>

    <body onload="window.print();">
        <header class="clearfix">
            <div id="logo">
                <img src="https://jasanet-online.com/assets/img/logo2.png" alt="logo">
            </div>
            <div id="company">
                <br>
                <h1>JASANET COMP</h1>
            </div>
        </header>
        <main>

            <h1 class="kepala">TANDA TERIMA SERVICE</h1>

            <div class="kolombawahposting">
                <div class="kolom-kiri">Dari :
                    <hr>MANGGA DUA MALL LT 5 BLOK C 225 MANGGA DUA RAYA, JAKARTA PUSAT <br>TELP : 021-62303663 ; 0858-9471-1377
                </div>
                <div class="kolom-kanan">Kirim ke :
                    <hr><?= $nama . ', ' . $alamat ?>
                </div>
            </div>

            <div id="details" class="clearfix">
                <div id="client">
                    <div class="to">RMA : <?= $data->invoice; ?></div>
                </div>
                <div id="invoice">
                    <div class="date">Tanggal : <?= date('d/m/Y'); ?></div>
                </div>
            </div>
            <table border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td>Nama Barang :</td>
                        <td colspan="4"><?= $data->nama_barang; ?></td>
                    </tr>
                    <tr>
                        <td>Keluhan :</td>
                        <td colspan="4"><?= $data->keluhan; ?></td>
                    </tr>
                    <tr>
                        <td>Kelengkapan :</td>
                        <td colspan="4"><?= $data->kelengkapan_barang; ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan :</td>
                        <td colspan="4"><?= $data->keterangan; ?></td>
                    </tr>
                </thead>
            </table>
            <table border="0" cellspacing="0" cellpadding="0">
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <p align="center">Diantar oleh <br> <br> <br> <br><br>
                                <hr>
                            </p>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <p align="center">Diterima oleh <br> <br> <br> <br><br>
                                <hr>
                            </p>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
        </main>
    </body>

    </html>