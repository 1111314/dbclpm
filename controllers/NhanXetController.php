<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/27/11
 * Time: 4:31 PM
 * To change this template use File | Settings | File Templates.
 */
    ob_start();


    require_once('models/NhanXet.php');
    require_once('models/ThanhVien.php');
    $nx = new NhanXet();
    if(isset($_REQUEST['nt']))
    {
         $manhatro=$_REQUEST['nt'];
         $dsnhanxet = $nx->dsNhanXet($manhatro);
    }
    $msg="";
    $mathanhvien="";
    if(isset($_SESSION['username']))
    {
        $username= $_SESSION['username'];
        $tv= new thanhvien();
        $mathanhvienss = $tv->getDataFromWhere("tv_ten_dang_nhap='".$username."'");
         while($row = mysql_fetch_row($mathanhvienss))
         {
               $mathanhvien=$row[0];
         }
    }
    if(isset($_POST['noidung']))
    {
         $nd = $_POST['noidung'];
         if($nd!="")
         {
               if($mathanhvien!="" && isset($manhatro))
               {
                            if($nx->isExist("nhan_xet","tv_ma_so='".$mathanhvien."' and nt_ma_so='".$manhatro."'"))
                            {
                                $nx->setMasoNt($manhatro);
                                $nx->setMathanhvien($mathanhvien);
                                $nx->setNoidung($nd);
                                $action = $_POST['action'];
                                if($action=="edit")
                                {
                                     //  echo $action;
                                    $nx->suaNhanXet();
                                    header("Location: index.php?option=NhanXet&nt=".$manhatro);
                                   
                                }
                                else
                                {
                                    $msg ="<span style='color: red;'>Bạn chỉ được đăng một nhận xét cho nhà trọ này!</span>";
                                }
                            }
                            else
                            {
                                $nx->setMasoNt($manhatro);
                                $nx->setMathanhvien($mathanhvien);
                                $nx->setNoidung($nd);
                                $nx->setNgaydang(date("Y-m-d"));
                                $nx->themNhanXet();
                              //  $msg = "<span style='color: blue;'>Đăng thành công ! Hãy <a href='NhanXet.php'>reload</a> để xem nhận xét của bạn !</span>";
                              //   $nx = new NhanXet();
                                header("Location: index.php?option=NhanXet&nt=".$manhatro);
                            }
               }
               else
               {
                    $msg="<span style='color: red;'>Hãy đăng nhập để có thể đăng nhận xét của bạn</span>" ;
               }
        }
    }
?>