 <?php session_start();
 ob_start();
 ?>


<html>
	<head>
		<title>
            home
		</title>
     <meta http-equiv="content-type" content="text/html charset=utf-8" >
       <link href="styles/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css"/>
        <link href="styles/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.16.custom.min.js"></script>

<!--Phần Script của tìm kiếm -->
        <script type="text/javascript">
    $(document).ready(function(){

        $("#chontinhthanh").change(function(){
            var tt = $(this).val();
//             $(".vd").load("controllers/TimKiemController.php?tt="+tt);
             $("#chonquanhuyen").load("controllers/TimKiemController.php?tt="+tt);
        });
        $(".btntimkiem").click(function(){
            if($("#chontinhthanh").val()!=0 || $("#chonquanhuyen").val()!=0 || $("#chonmucgia").val()!=0)
            {
            var url = "index.php?option=KetQua&t="+$("#chontinhthanh").val()+"&q="+$("#chonquanhuyen").val()+"&m="+$("#chonmucgia").val();
            $(location).attr('href',url);
            }
            else
            {
                $(".msg").html("(*) Bạn chưa chọn từ khóa tìm kiếm ");
            }
        });
    });
</script>
<!--Kết thúc phần Script của tìm kiếm -->
        
	</head>
	<body>
    <div style="background-color:#99FFCC; height:170px; font-size: 50pt"> Banner will be located here !</div>
            <div style="background-color:#CDC8FD;">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="index.php"> Trang Chủ </a>&nbsp;&nbsp;&nbsp;
			   <a href="index.php?option=NhanXet&nt=1"> Trang Nhan xet </a> &nbsp;&nbsp;&nbsp;
                <a href="index.php?option=DangNhap">    Đăng nhập </a>&nbsp;&nbsp;&nbsp;
                <a href="index.php?option=DangKy">    Đăng ký </a>

            </div>
			<div >
				<br /><br /><br />
		        <div style="height:100%; width:23% ; border:1px solid #CCCCCC; float:left">

<!--    Phần tìm kiếm (sidebar)       -->

                    <div>
                        <?php  include_once('controllers/TimKiemController.php'); ?>
                        <p>

                                <select name="chontinhthanh" id="chontinhthanh" style="width: 160px;" >
                                    <option value="0">---  Chọn tỉnh thành  ---</option>
                                    <?php
                                        while($row = mysql_fetch_row($dstt))
                                        {
                                           echo "<option value='".$row[0]."' >".$row[1]." </option>";
                                        }
                                    ?>
                                </select>
                        </p>
                         <p>

                                <select name="chonquanhuyen" id="chonquanhuyen" style="width: 160px;"  >
                                    <option value="0">---  Chọn quận huyện  ---</option>

                                </select>
                        </p>
                        <p>
                            
                                <select name="chonmucgia" id="chonmucgia" style="width: 160px;" >
                                     <option value="0" >---  Chọn Mức Giá  ---</option>
                                     <option value="1" > Dưới 700 ngàn</option>
                                     <option value="2" > 700 ngàn - 1 triệu </option>
                                     <option value="3" > 1 triệu - 2 triệu</option>
                                     <option value="4" > Trên 2 triệu</option>
                                </select>
                        </p>
                            <p class="btntimkiem" style="border: 1px solid #A4A4FF; cursor: pointer;background-color: #363636; -moz-border-radius:7px;-webkit-border-radius: 7px ;color: #ffffff; width: 90px; text-align: center; "  >
                                Tìm Kiếm
                            </p>
                            <span style="color: #ff0000; font-family: tahoma; font-size: 10pt;" class="msg"></span>
                    </div>
                </div>

<!--    đóng phần tìm kiếm            -->


<!--    Phần content            -->
                <form name="form1" method="post" >
			    <div id="content" style=" border:1px solid #CCCCCC; margin-left:1%; width:75% ; float:left; overflow: auto;" >
                    <p style="color: #0000cc; font-size: 30pt">This is content</p>
                    <?php
                   
                            if(isset($_REQUEST['option']))
                            {
                                $option=$_REQUEST['option'];
                                if($option=="NhanXet")
                                {
                                    include_once("views/NhanXet.php");
                                }
                                else
                                {
                                    include_once("views/".$option.".php");
                                }
                            }
                            else
                            {
                                include_once("views/KetQua.php");
                            }
                    ?>
				</div>
			</div>
           
		</form>
	</body>
</html>