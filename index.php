<?php
require_once("conn.php");
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Perpustakaan</title>
  <style>
  h1, h2, h3, p {
    margin-top:0px;
    margin-bottom:10px;
  }
</style>
</head>

<body>

  <h1>Perpustakaan</h1>
  <h2>List Buku</h2>
  <hr />
  <?php require("cari.php"); ?>
      <td>&nbsp;</td>
      <td width="40%"><p>Keranjang Anda</p>
        <hr />
        <?php require("./pinjam/read-cart.php"); ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
</body>
</html>
