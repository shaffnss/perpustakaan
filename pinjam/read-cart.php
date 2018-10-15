<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
  <tr>
    <th align="left" scope="col">ID</th>
    <th align="left" scope="col">Judul Buku</th>
    <th align="right" scope="col">Jumlah hari</th>
    <th align="right" scope="col">Aksi</th>
  </tr>
  <?php
  if (isset($_SESSION['items'])) {
    foreach ($_SESSION['items'] as $key => $val) {
      $query = mysqli_query($conn, "select buku.id, buku.judul from buku where buku.id = '$key'");
      $rs = mysqli_fetch_array($query);
      ?>
      <tr>
        <td><?php echo $rs['id']; ?></td>
        <td><?php echo $rs['judul']; ?></td>
        <td align="right"><?php echo number_format($val); ?></td>
        <td align="right"><a href="pinjam/pinjam.php?act=plus&amp;buku_id=<?php echo $key; ?>&amp;ref=../index.php">+</a> | <a href="pinjam/pinjam.php?act=min&amp;buku_id=<?php echo $key; ?>&amp;ref=../index.php">-</a> | <a href="pinjam/pinjam.php?act=del&amp;buku_id=<?php echo $key; ?>&amp;ref=../index.php">Hapus</a></td>
      </tr>
      <?php
      mysqli_free_result($query);
    }
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right"><a href="pinjam/pinjam.php?act=clear&amp;ref=../index.php">Clear</a></td>
  </tr>

  <tr>
    <td colspan="6">
      <hr/>
      <a href="pinjam/save-cart.php">Proses Peminjaman</a>
    </td>
  </tr>
</table>
