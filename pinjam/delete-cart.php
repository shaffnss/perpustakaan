<?php

if (isset($_GET['buku_id'])) {
  $buku_id = $_GET['buku_id'];
  if (isset($_SESSION['items'][$buku_id])) {
    unset($_SESSION['items'][$buku_id]);
  }
}
