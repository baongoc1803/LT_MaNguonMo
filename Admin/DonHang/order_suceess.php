<?php 
  require '../../Connect/Connect.php';
  require '../../Class/DonHang.php';
  require '../../Class/ChiTietDonHang.php'; 
if(!empty($_POST['MaDH'])){
    $maDH = $_POST['MaDH'];
    ChiTietDonHang::deleteByMaDH($maDH);
    DonHang::delete($maDH);
    header('location: ./index.php?Order=successly');
    exit;
}
header("location: ./index.php?Order=Can't find MaDH");
?>