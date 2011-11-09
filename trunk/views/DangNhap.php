<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/1/11
 * Time: 2:32 PM
 * To change this template use File | Settings | File Templates.
 */
ob_start();

?>

<meta http-equiv="content-type" content="text/html charset=utf-8" >

    <div style="border: 1px solid #555555; width: 250px; padding: 10px">
        <table>
            <tr>
                <td><label class="style1">Tên đăng nhập: </label></td>
                <td><input type="text" maxlength="20" name="tendangnhap" class="input1" /></td>
            </tr>
            <tr>
                <td><label class="style1">Mật khẩu:</label></td>
                <td><input type="password" maxlength="20" class="input1"  name="matkhau" /></td>
            </tr>
            <tr>
                <td>
                    <div style="text-align: right;"><input type="submit" name="login" id="login" value="Đăng nhập" /></div>
                </td>
            </tr>
        </table>

     <?php
          require_once('controllers/LoginController.php');

        if( $action==true)
        {
            if($result==true)
            {
                $_SESSION['username']= $tendangnhap ;

                header("Location: views/Loading.php");
            }
            else
            {
                echo '<p style="color: red">sai mat khau !</p>';
            }
        }
?>
    </div>


