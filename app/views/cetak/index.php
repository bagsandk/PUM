<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SKTLK</title>
    <link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body style="font-family: 'Times New Roman';">
    <div class="container">
        <div class="row col-12 mt-1 mr-0 mx-auto">
            <div class="">
                <table>
                    <tbody>
                        <tr>
                            <td style="text-align: center; line-height:1px;">
                                <p><strong>POLRI DAERAH LAMPUNG</strong></p>
                                <p><strong>RESOR KOTA BANDAR LAMPUNG</strong></p>
                                <p><strong>SEKTOR KEDATON</strong></p>
                                <p><strong><u>Jl. Soekarno Hatta No.14, Bandar Lampung 0721-7691110</u></strong></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row col-12 mx-auto">
            <div class="mx-auto">
                <img src="<?= BASEURL ?>/img/polri.png" alt="logo" class=" rounded">
            </div>
        </div>
        <div class="row col-12 mx-auto mb-0">
            <div class="mx-auto mt-2" style="line-height: 1px">
                <p class="text-center font-weight-bold"><u>TANDA BUKTI LAPOR KEHILANGAN BARANG/SURAT</u></p>
                <p class="text-center ">Nomor : TBL/C-1/<?= $data['lap']['no_surat'] . '/' . $data['noromw'] ?>/LPG/RESTA BALAM/SEKTOR KDT
                </p>
            </div>
        </div>
        <div class="row col-12 mx-auto">
            <div class="">
                <p style="line-height:20px;" class=" text-break text-justify"> &emsp;&emsp;&emsp; Yang bertanda tangan dibawah ini Kepala Kepolisian Sektor Kedaton Bandar Lampung menerangkan pada hari <?= $data['harib'] . ' tanggal ' . $data['tglb'] . ', Pukul ' . $data['waktu'] ?> WIB telah datang seseorang <?= $data['kel']['jk'] ?>yang mengaku beridentitas :</p>
            </div>
        </div>
        <div class="row col-12 mx-auto">
            <div class="">
                <table style="line-height:20px;">
                    <tr>
                        <td>Nama</td>
                        <td>: </td>
                        <td><?= $data['kel']['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat/tanggal lahir</td>
                        <td>: </td>
                        <td><?= $data['kel']['tmp_lahir'] . ' / ' . $data['tgll'] ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>: </td>
                        <td><?= $data['kel']['agama'] ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: </td>
                        <td><?= $data['kel']['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>: </td>
                        <td style="text-transform: uppercase;"><?= $data['kel']['kwn'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: </td>
                        <td><?= $data['kel']['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>: </td>
                        <td><?= $data['kel']['no_hp'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row col-12 mx-auto mt-1">
            <div class="">
                <p class=" font-weight-bold"><u>Melaporkan mengaku kehilangan barang / surat berharga berupa :</u></p>
                <table style="line-height:20px;" class="mb-1">
                    <tr>
                        <td>-</td>
                        <td><?= $data['kel']['nm_brg_doc'] ?></td>
                        <td><?= $data['kel']['ket'] ?></td>
                    </tr>
                </table>
                <p style="line-height:20px;" class="text-break mb-1 text-justify"> &emsp;&emsp;&emsp; Kehilangan tersebut diketahui pada hari <?= $data['harih'] . ' tanggal ' . $data['tglh'] . ' sekitar pukul ' . $data['pukul'] ?>wib diperkirakan hilang di Sekitar <?= $data['kel']['tempat'] ?></p>
                <p style="line-height:20px;" class="text-break mb-1 text-justify"> &emsp;&emsp;&emsp; Sesuai dengan Laporan Kehilangan Nomor : TBL/C-1/<?= $data['lap']['no_surat'] . '/' . $data['noromw'] ?>/LPG/RESTA BALAM/SEKTOR KDT, tanggal <?= $data['tglb'] ?>
                </p>
                <p style="line-height:20px;" class="text-break mb-1 text-justify"> &emsp;&emsp;&emsp; Surat Keterangan ini bukan sebagai pengganti atas barang-barang yang hilang, melainkan untuk keperluan mengurus kembali barang atau surat-surat yang tealh hilang atau rusak, demikian untuk dapat dipergunakan sebagai mana mestinya.
                </p>
            </div>
        </div>
        <div class="row col-12 mx-auto mt-0">
            <div class="col-5 mt-4">
                <table style="text-align: center">
                    <tr>
                        <td>Pelapor</td>
                    </tr>
                    <tr style="line-height: 80px">
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td class=" font-weight-bold"><u><?= $data['kel']['nama'] ?></u></td>
                    </tr>
                </table>
            </div>
            <div class="col-7">
                <table align="right" style="text-align: center">
                    <tr>
                        <td>Bandar Lampung, <?= $data['tglb'] ?>
                            <br>a.n KAPOLSEK KEDATON BANDAR LAMPUNG.
                            <br>KA SPKT
                        </td>
                    </tr>
                    <tr style="line-height: 58px">
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td class=" font-weight-bold"><u>KABUL BASUKI</u>
                            <br> AIPDA NRP : 69050236
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row col-12 mx-auto">
            <div class="">
                <p class="font-weight-bold mt-2"><u>Catatan</u></p>
                <ol>
                    <li>
                        <p style="line-height:16px;" class="text-break mb-1 text-justify font-italic">Surat keterangan tanda lapor kehilangan ini bukan pengganti surat/barang yang hilang, melainkan untuk mengurus surat yang baru dan berlaku selama 14 (Empat belas) hari sejak tanggal surat dikeluarkan</p>
                    </li>
                    <li>
                        <p style="line-height:16px;" class="text-break mb-1text-justify font-italic">Apabila Laporan tersebut tidak benar/palsu maka Pelapor dapat diancam pelanggaran sebagaimana di maksud dalam pasal 266 KUHP.
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>