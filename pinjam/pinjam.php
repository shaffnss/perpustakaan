<?php
require_once("../conn.php");
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_GET['act']) && isset($_GET['ref'])) {
  $act = $_GET['act'];
  $ref = $_GET['ref'];

  if ($act == "add") {
    require("add-cart.php");
  } elseif ($act == "plus") {
    if (isset($_GET['buku_id'])) {
      $buku_id = $_GET['buku_id'];
      if (isset($_SESSION['items'][$buku_id])) {
        $_SESSION['items'][$buku_id] += 1;
      }
    }
  } elseif ($act == "min") {
    if (isset($_GET['buku_id'])) {
      $buku_id = $_GET['buku_id'];
      if (isset($_SESSION['items'][$buku_id])) {
        $_SESSION['items'][$buku_id] -= 1;
      }
    }
  } elseif ($act == "del") {
    require("delete-cart.php");
  } elseif ($act == "clear") {
    if (isset($_SESSION['items'])) {
      foreach ($_SESSION['items'] as $key => $val) {
        unset($_SESSION['items'][$key]);
      }
      unset($_SESSION['items']);
    }
  }

  header ("location:" . $ref);
}
