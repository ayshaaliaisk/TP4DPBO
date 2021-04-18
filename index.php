<?php

/******************************************
PRAKTIKUM RPL
 ******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Data.class.php");

// Membuat objek dari kelas task
$odata = new Data($db_host, $db_user, $db_password, $db_name);
$odata->open();

// Memanggil metho pada di kelas Task
if (isset($_POST['nama'])) {
	$otask->getDataNama();
} else if (isset($_POST['nim'])) {
	$otask->getDataNIM();
} else if (isset($_POST['jurusan'])) {
	$otask->getDataJurusan();
} else if (isset($_POST['kelas'])) {
	$otask->getDataKelas();
} else if (isset($_POST['tanggal_lahir'])) {
	$otask->getDataTgl();
} else if (isset($_POST['riwayat_penyakit'])) {
	$otask->getDataPenyakit();
} else if (isset($_POST['keterangan'])) {
	$otask->getDataKeterangan();
} else if (isset($_POST['reset'])) {
	$odata->getData();
} else {
	$odata->getData();
}
// Proses mengisi tabel dengan data
$data = null;
$no = 1;

if (isset($_POST['add'])) {
	$odata->insertTask($_POST);

	header("Location:index.php");
}

while (list($id, $tnama, $tnim, $tjurusan, $tkelas, $ttanggal_lahir, $triwayat_penyakit, $tketerangan) = $odata->getResult()) {
	// Tampilan jika keterangan task nya sudah dikerjakan
	if ($tketerangan == "Sudah Sembuh") {
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tnama . "</td>
		<td>" . $tnim . "</td>
		<td>" . $tjurusan . "</td>
		<td>" . $tkelas . "</td>
		<td>" . $ttanggal_lahir . "</td>
		<td>" . $triwayat_penyakit . "</td>
		<td>" . $tketerangan . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	} else {
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tnama . "</td>
		<td>" . $tnim . "</td>
		<td>" . $tjurusan . "</td>
		<td>" . $tkelas . "</td>
		<td>" . $ttanggal_lahir . "</td>
		<td>" . $triwayat_penyakit . "</td>
		<td>" . $tketerangan . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success'><a href='index.php?id_edit=" . $id . "' style='color: white; font-weight: bold;'>Sembuh</a></button>
		</td>
		</tr>";
		$no++;
	}
}

if (isset($_GET['id_hapus'])) {
	$id_data = $_GET['id_hapus'];

	$odata->deleteData($id_data);

	unset($_GET['id_hapus']);

	header("Location: index.php");
}

if (isset($_GET['id_edit'])) {
	$id_data = $_GET['id_edit'];

	$odata->updateData($id_data);

	header("Location: index.php");
}

// Menutup koneksi database
$odata->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();
