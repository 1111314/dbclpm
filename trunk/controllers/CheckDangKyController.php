<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/25/11
 * Time: 9:15 AM
 * To change this template use File | Settings | File Templates.
 */

require_once("models/CheckUsername.php");
require_once("models/ThanhVien.php");
    global $loi;
    $loi=false;
    $msg="";

    if(isset( $_POST['tendangnhap'])){
        $username = $_POST['tendangnhap'];
        $valid = check_username($username);
        $ho = $_POST['holot'];
        $ten = $_POST['ten'];
        $diachi = $_POST['diachi'];
        $ngaysinh = $_POST['ngaysinh'];
        
        if(!$valid['ok'])
        {
            $msg= '(*) '.$valid['msg'].'<br />' ;
            $loi=true;
        }
        if($ho=="")
        {
             $msg .= '(*) Bạn chưa nhập họ lót <br />' ;
             $loi=true;
        }
        if($ten=="")
        {
             $msg .= '(*) Bạn chưa nhập tên <br />' ;
             $loi=true;
        }
        if($diachi=="")
        {
             $msg .= '(*) Bạn chưa nhập địa chỉ <br />' ;
             $loi=true;
        }
         if($ngaysinh=="")
        {
             $msg .= '(*) Bạn chưa nhập ngày sinh <br />' ;
             $loi=true;
        }
        else
        {
            $tv = new thanhvien();
            $pattern = "/([0-3]{1})([0-9]{1})\/([0-1]{1})([0-9]{1})\/([1-2]{1})([0-9]{3})/";
            if(preg_match($pattern, $ngaysinh)==0) {
                $msg .= '(*) Ngày sinh không hợp lệ <br />' ;
                    $loi=true;
            }
            else{
                $day = substr($ngaysinh,0,2);
                $month =  substr($ngaysinh,3,2);
                $year =  substr($ngaysinh,6,4);
                if(!checkdate($month,$day,$year))
                {
                    $msg .= "(*) Ngày sinh '".$day."-".$month."-".$year."' không có thật <br />" ;
                    $loi=true;
                }
            }
        }
    }

    if(isset($_POST['matkhau']))
    {

        $pass1 = $_POST['matkhau'];
        if($pass1=="")
        {
             $msg .= '(*) Bạn chưa nhập vào mật khẩu <br />' ;
             $loi=true;
        }
        else if(isset($_POST['matkhau2']))
        {
            $pass2 = $_POST['matkhau2'];
            if(strlen($pass1)<4)
            {
                $msg .= '(*) Mật khẩu phải có độ dài từ 4 đến 20 kí tự  <br />' ;
                $loi=true;
            }
            else
            if($pass2=="")
            {
                $msg .= '(*) Ban chưa nhập xác nhận mật khẩu! <br />' ;
                $loi=true;
            }
            else if($pass1!=$pass2)
            {
                $msg .= '(*) Mật khẩu xác nhận không đúng! <br />' ;
                $loi=true;
            }

        }
    }
     $db = new database();
   if(isset( $_POST['email'])){
        $email = $_POST['email'];
        $pattern = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';

        if($email=="") {
            $msg .=  '(*) Bạn chưa nhập email của bạn! <br />';
            $loi=true;
        }
        else if(preg_match($pattern, $email)==0) {
             $msg .=  '(*) Email không hợp lệ, vui lòng nhập lại! <br />';
             $loi=true;
        }
        else if($db->isExist("thanh_vien","tv_email='".$email."'")>0)
        {
            $msg .= '(*) Email đã tồn tại, vui lòng nhập lại! <br />';
            $loi=true;
        }
   }
    $_SESSION['LOI'] = $loi;

    if($loi==false)
    {

        if(isset($_POST['holot']))
        {
            $tv = new thanhvien();
            $ho= $_POST['holot'];
            $ten= $_POST['ten'];
            $gt= $_POST['gioitinh'];
            $tendangnhap= $_POST['tendangnhap'];
            $matkhau= $_POST['matkhau'];
            $ngaysinh= $_POST['ngaysinh'];
            $email= $_POST['email'];
            $diachi = $_POST['diachi'];

            $tv->setHo($ho);
            $tv->setTen($ten);
            $tv->setTenDangNhap($tendangnhap);
            $tv->setMatKhau($matkhau);
            $tv->setDiaChi($diachi);
            $tv->setGioiTinh($gt);
            $tv->setNgaySinh($tv->convert_in($ngaysinh));
            $tv->setEmail($email);
            $tv->setNgayDangKy(date("Y-m-d"));
            $tv->setMaQuyen(1);
            $kq = $tv->themThanhVien();

        }
    }

?>