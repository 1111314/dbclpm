<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/22/11
 * Time: 7:19 PM
 * To change this template use File | Settings | File Templates.
 */


include_once('../configs/database.php')  ;

$pattern = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
$email = $_REQUEST['email'];
 $db = new database();
if($email=="") {
   echo  'Vui lòng nhập email của bạn!';
    exit;
}
if(preg_match($pattern, $email)==0) {
   echo  'Email không hợp lệ, vui lòng nhập lại!';
    exit;
}
if($db->isExist("thanh_vien","tv_email='".$email."'")>0)
{
     echo 'Email đã tồn tại, vui lòng nhập lại!';
}

?>