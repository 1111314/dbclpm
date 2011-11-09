<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/5/11
 * Time: 9:32 AM
 * To change this template use File | Settings | File Templates.
 */
 
?>

<div>
    <p class="style1">Kết quả tìm kiếm: </p>
    <?php
        if(isset($_GET['chontinhthanh'])) {
        echo $_GET['chontinhthanh'];
    }
         if(@$dsketqua!=null)
         {

            while($row = mysql_fetch_row($dsketqua) )
            {
    ?>
                <div style="border: 1px solid #999999; padding: 5px; margin:10px">
                    <table>
                        <tr>
                            <td style="vertical-align: top; padding: 10px">
                                <img src="photos/nhatro1.jpg" width="100px" height="100px" >
                            </td>
                            <td style="vertical-align: top; padding: 10px">
                               <span class="style1" >Tên nhà trọ:</span>  <span style="color: #993366;  font-family: tahoma;font-size: 10pt;"> <?php echo $row[1] ;?> </span>
                                <br /> <span class='style1' > Địa chỉ:</span> <span style="color: #993366;  font-family: tahoma;font-size: 10pt;"> <?php echo $row[2] ;?> </span>
                                <?php $number=$row[3];?>
                                <br /> <span class='style1' >Giá tiền:</span>  <span style="color: #993366;  font-family: tahoma;font-size: 10pt;"> <?php echo number_format($row[3],0)  ; ?> VND </span>
                                <br /> <br />
                                <a style="text-decoration: none; font-style: italic;" href="index.php?option=ChiTietNhaTro&nt=<?php echo $row[0] ?>"> Xem chi tiết... </a>
                            </td>
                        </tr>
                    </table>
                </div>
    <?php
            }

         }
    ?>
</div>