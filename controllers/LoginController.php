<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/1/11
 * Time: 10:10 PM
 * To change this template use File | Settings | File Templates.
 */
require_once('models/ThanhVien.php');

  $result=false;
  $action=false;
  $tendangnhap="";
if(isset($_POST['tendangnhap']))
{
     $action=true;
     $tendangnhap = $_POST['tendangnhap'];
     $matkhau = $_POST['matkhau'];
     $db= new database();
     if ($db->isExist("thanh_vien","tv_ten_dang_nhap='".$tendangnhap."' and tv_mat_khau='".$matkhau."'"))
     {
         $result=true;
     }
}
?>

