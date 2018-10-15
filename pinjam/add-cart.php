<?php

if (isset($_GET['buku_id'])) {
  $buku_id = $_GET['buku_id'];
  if (isset($_SESSION['items'][$buku_id])) {
    $_SESSION['items'][$buku_id] += 1;
  } else {
    $_SESSION['items'][$buku_id] = 1;
  }
}
