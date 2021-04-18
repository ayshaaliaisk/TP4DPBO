<?php

/******************************************
PRAKTIKUM RPL
 ******************************************/
class Data extends DB
{

	// Mengambil data
	function getData()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataNama()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY nama ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataNIM()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY nim ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataJurusan()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY jurusan ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataKelas()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY kelas ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataTgl()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY tanggal_lahir ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataPenyakit()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY riwayat_penyakit ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getDataKeterangan()
	{
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs ORDER BY keterangan ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertTask($data)
	{
		$tnama = $data['tnama'];
		$tnim = $data['tnim'];
		$tjurusan = $data['tjurusan'];
		$tkelas = $data['tkelas'];
		$ttanggal_lahir = $data['ttanggal_lahir'];
		$triwayat_penyakit = $data['triwayat_penyakit'];
		$tketerangan = "Belum Sembuh";

		$query = "INSERT INTO data_mhs (nama, nim, jurusan, kelas, tanggal_lahir, riwayat_penyakit, keterangan) VALUES ('$tnama', '$tnim', '$tjurusan', '$tkelas', '$ttanggal_lahir', '$triwayat_penyakit', '$tketerangan')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteData($id_data)
	{
		$query = "DELETE FROM data_mhs WHERE id=$id_data";

		return $this->execute($query);
	}

	function updateData($id)
	{
		$query = "UPDATE data_mhs SET keterangan = 'Sudah 
		Sembuh' WHERE id = $id";

		return $this->execute($query);
	}
}
