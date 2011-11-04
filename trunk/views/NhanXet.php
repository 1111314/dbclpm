<meta http-equiv="content-type" content="text/html charset=utf-8" >

<script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
     $('#noidung').keyup(function() {
                var len = this.value.length;
                if (len >= 100) {
                    this.value = this.value.substring(0, 100);
                }
                $('#kytuconlai').text(100 - len );
     });
     $('#noidung').keydown(function(event){
         if (event.keyCode == '13') {
              event.preventDefault();
            }
     });
     $('.suanhanxet').click(function(){
         $('#noidung').html($('.suanhanxet').parent().find('p').contents().text());
         $('#action').attr("value","edit");
     });
});
</script>
 <?php if(isset($_REQUEST['nt']))
         $nt = $_GET['nt'];
    ?>

  <div class="div1">
     <img src="images/Client.png" width="25px" height="25px"/> <span class="style1">Nhận xét:</span>
	 <input type="hidden" id="action" name="action"  />
      <div class="baidadang">
        <?php
                require_once('controllers/NhanXetController.php');

        while($row = mysql_fetch_row($dsnhanxet))
        {
            if($mathanhvien!="" && $row[0] == $mathanhvien)
            {
                 echo "<div style='padding: 0 0 10px 5px; background-color: #e8ffff;'>";
            }
            else
            {
                 echo "<div style='padding: 0 0 10px 5px'>";
            }
            echo "<img src='images/icon1.gif' width='15px' height='15px'/>";
            echo "<span class='style1' >Đăng bởi:</span><span class='style2'> ".$row[1]." ".$row[2]." </span> ;<span class='style1' > ngày đăng:</span><span class='style2'> ".$row[3]."</span>";
            if($mathanhvien!="" && $row[0] == $mathanhvien)
            {
                echo "<a style='text-decoration: none' class='suanhanxet' >  [ sửa ]</a>";
            }
            else
            {
                 echo "<br />";
            }
            echo "<p class='style4'>".$row[4]."</p>";
            echo "</div>";
        }
        ?>
	</div>

    <div class="style3"  >
        <img src="images/text.png" width="30px" height="25px"/>
        Viết nhận xét của bạn:
    </div>
	<div>
	  <textarea id="noidung" name="noidung" cols="80" rows="3" ></textarea>
      <p style="color: #999999; font-size: 10pt">
       Chỉ được nhập tối đa 100 ký tự. Số ký tự còn lại là : <span id ="kytuconlai">100</span> 
      </p>
        <span id="message" >
        <?php
        if ($msg!="")
        {
            echo $msg;
        }
        ?>
         </span>
	</div>
	 <div >
		<input type="submit" id="dangnhanxet" name="dangnhanxet" value="Đăng nhận xét" />
         <br />
         <p style="color: #999999; font-size: 10pt"> 
             Lưu ý:
               <br /> - Chỉ thành viên đăng nhập mới được đăng nhận xét.
               <br /> - Mỗi thành viên chỉ được đăng 1 nhận xét cho mỗi nhà trọ.
         </p>
	</div>
      
  </div>	

