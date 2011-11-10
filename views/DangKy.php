<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/18/11
 * Time: 9:54 AM
 * To change this template use File | Settings | File Templates.
 */
 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Untitled Document</title>
    <script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.ui.datepicker-vi.js"></script>
    <script type="text/javascript"  >
           $(document).ready(function () {
               $("#email").blur(function(){
                       $(".erroremail").load("controllers/checkmailcontroller.php?email=" + $('#email').val());
               });
               $('#tendangnhap').keyup(function () {
                       $("#validateUsername").load("controllers/checkusernamecontroller.php?username=" + $('#tendangnhap').val());
               });
           });

    </script>

 <script>
	$(function() {
		$.datepicker.setDefaults( $.datepicker.regional[ "vi" ] );
        $( "#ngaysinh" ).datepicker({
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true,
            startTime: "-20y",
            yearRange: '1940:2000',
            changeMonth: true,
			changeYear: true,
            defaultDate: "-20y"
		});
	});
</script>
<style type="text/css">

</style>

<script type="text/javascript" language="javascript" >
		function mFocus(text)
		{
			text.className="textfocus";
		}
        function lostFocus(text)
		{
			text.className="input1";
		}
</script>

</head>

<body>

<blockquote>


        <?php
            include('controllers/CheckDangKyController.php');
            $loi = $_SESSION['LOI'];

            if($loi)
            {
           ?>
            <table width="520px"  align="center" cellspacing="0" class="table">
                <tr>
                    <td class="header">
                        Thông báo các lỗi khi bạn đăng ký
                    </td>
                </tr>
                <tr>
                    <td>
                    <p style="color: red ; padding: 10px;">
                        <?php
                                echo $msg;
                        ?>
                    </p>
                    </td>
                </tr>
            </table>
                <br />
          <?php
                }
          ?>

    <table width="520px"  align="center" cellspacing="0" class="table" >
      <tr>
        <td colspan="2" class="header"  >Đăng ký thành viên </td>
      <tr>
        <td colspan="2" style="background-color:#EEEEEE; font-size:12px; color:#2E2E2E; font-weight: bolder; height:22px ; padding:3px 5px 3px 10px ">Th&ocirc;ng tin b&#7855;t bu&#7897;c </td>
      </tr>
      <tr>
        <td class="col1" valign="top"><p>Họ và tên đệm: </p>
        <p>Tên : </p></td>
        <td class="col2" valign="top"><input name="holot" type="text" class="input1" onFocus="mFocus(holot)" onBlur="lostFocus(holot)" value="<?php echo @$_POST['holot'] ; ?>" size="40" maxlength="40" />
          <p>
           <input name="ten" type="text" class="input1" onFocus="mFocus(ten)" onBlur="lostFocus(ten)" value="<?php echo @$_POST['ten'] ?>" size="40" maxlength="40" />
         </p>
        <span style="color:#999999; font-size:11px; "> Xin hãy nhập vào họ tên sẽ hiển thị trên website </span> </label></td>
      </tr>
       <tr>
        <td valign="top" class="col1" >Ngày sinh : </td>
        <td valign="top" class="col2" >
          <div class="demo">
                 <input id="ngaysinh" name="ngaysinh" type="text" class="input1" onFocus="mFocus(ngaysinh)" onBlur="lostFocus(ngaysinh)" >
       </td>
      </tr>
      <tr>
        <td class="col1">Giới tính : </td>
        <td class="col2"><p>
          <label>
            <input name="gioitinh" type="radio" value="1" checked="checked" />
            Nam</label>
          <label>
            <input type="radio" name="gioitinh" value="0" />
            Nữ</label>
          <br />
        </p></td>
      </tr>
         <tr>
        <td class="col1">Địa chỉ: </td>
        <td class="col2"><p>
           <input name="diachi" type="text" class="input1" id="diachi" onFocus="mFocus(diachi)" onBlur="lostFocus(diachi)" value="<?php echo @$_POST['diachi'] ; ?>" size="40" maxlength="100" />
        </p></td>
      </tr>
      <tr>
        <td class="col1" valign="top" >Tên đăng nhập : </td>
        <td class="col2"><input name="tendangnhap" type="text" class="input1" id="tendangnhap" onFocus="mFocus(tendangnhap)" onBlur="lostFocus(tendangnhap)" value="<?php echo @$_POST['tendangnhap'] ; ?>" size="40" maxlength="20" />
        <p> <span id="validateUsername"></span></p> 
		  
        </td>
      </tr>
      <tr>
        <td valign="top" class="col1" ><p>Mật khẩu: </p>
          <p>
          Xác nhận mật khẩu : </p></td>
        <td valign="top" class="col2" >
          <p>
            <input name="matkhau" type="password" class="input1" size="40" maxlength="20" onFocus="mFocus(matkhau)" onBlur="lostFocus(matkhau)" />
          </p>
            <p>
              <input name="matkhau2" type="password" class="input1" size="40" maxlength="20" onFocus="mFocus(matkhau2)" onBlur="lostFocus(matkhau2)" />
          </p>
            <span style="color:#999999; font-size:11px; ">Hãy nhập mật khẩu có độ dài từ 4-20 kí tự </span>

        </td>
      </tr>
      <tr>
        <td valign="top" class="col1" ><p>Email : </p>
        <p>Xác nhận email : </p></td>
        <td valign="top" class="col2" ><p>
          <input  name="email" type="text" class="input1" id="email" onFocus="mFocus(email)" onBlur="lostFocus(email)" value="<?php echo @$_POST['email'] ?>" size="40" maxlength="100" />
         </p>
        <p>
          <input id="mail2" name="email2" type="text" class="input1" size="40" maxlength="100" onFocus="mFocus(email2)" onBlur="lostFocus(email2)" />
  </p>       <span class="erroremail"></span></td>
            <input name="error_email" type="hidden" id="error_email">

      </tr>
        <tr>
        <td class="col1" valign="top" >Mã xác nhận : </td>
        <td class="col2">
           <p> <img src="models/random_image.php"/></p> 
             <input type="text" name="txtCaptcha" maxlength="5" size="9" style="border: 1px solid #A4A4FF; font-weight: bolder; font-size: 11pt; text-align: center; height: 26px"  />
        </td>

    </table>
	  <div align="center" style="padding-top:10px; ">
	  <input id="btdangky" name="btdangky"  type="submit" value="Đăng ký"  />
	  &nbsp; &nbsp; &nbsp;
	  <input name="bthuybo" type="reset" id="bthuybo" value="Hủy bỏ" />

	</div>



</blockquote>
</body>
</html>