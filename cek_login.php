<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pegawai where peg_user='$username' and peg_pass='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['peg_level']=="1"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['peg_nama'];
		$_SESSION['level'] = "1";
		$_SESSION['header'] = "Dashboard";
		// alihkan ke halaman dashboard admin
		header("location:index.php?page=home");
 
	// cek jika user login sebagai pegawai
	}else if($data['peg_level']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['peg_nama'];
		$_SESSION['level'] = "2";
		$_SESSION['header'] = "Dashboard";
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=home");
 
	// cek jika user login sebagai user
	}else if($data['peg_level']=="3"){
		// buat session login dan user
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['peg_nama'];
		$_SESSION['level'] = "3";
		$_SESSION['header'] = "Dashboard";
		// alihkan ke halaman dashboard user
		header("location:index.php?page=home");
 
	}else{
 		$_SESSION['header'] = "Login Page";
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	$_SESSION['header'] = "Login Page";
	header("location:login.php?pesan=gagal");
}
?>