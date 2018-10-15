<form action="index.php" method="get">
  <label>Cari :</label>
  <input type="text" name="cari">
  <input type="submit" value="Cari">
</form>

<?php
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td width="55%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($conn, "select * from buku where judul like '%".$cari."%'");
      }else{
        $data = mysqli_query($conn, "select * from buku");
      }
      $no = 1;
      while($rs = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td valign="top"><h3><?php echo $rs['judul']; ?></h3>
            <p>
              ID : <?php echo $rs['id']; ?> - <a href="pinjam/pinjam.php?act=add&amp;buku_id=<?php echo $rs['id']; ?>&amp;ref=../index.php">Pinjam</a>
              <?php if (isset($_SESSION['items'][$rs['id']])) echo "(telah dimasukkan dalam keranjang)"; ?>
            </p>
          </td>
        </tr>
        <?php
      }
      ?>
    </table></td>
