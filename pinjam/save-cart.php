<?php

require_once("../conn.php");
if (!isset($_SESSION)) {
  session_start();
}

// masukkan dalam tabel peminjaman
$tanggal = date('Y-m-d');
$query = mysqli_query($conn, "INSERT INTO `peminjaman` (`tanggal`) VALUES ('$tanggal')") or die(mysqli_error());
if ($query) {
  $peminjaman_id = mysqli_insert_id($conn);

  if (isset($_SESSION['items'])) {
    foreach ($_SESSION['items'] as $key => $value) {
      $buku_id = $key;
      $hari = $value;
      mysqli_query($conn, "INSERT INTO `dipinjam` (`peminjaman_id`, `buku_id`, `hari`) VALUES ('$peminjaman_id', '$buku_id', '$hari')");
    }
  }

  if ($query) {
    echo "Penyimpanan data sukses";

    // clear session
    foreach ($_SESSION['items'] as $key => $val) {
      unset($_SESSION['items'][$key]);
    }
    unset($_SESSION['items']);
  }
}
