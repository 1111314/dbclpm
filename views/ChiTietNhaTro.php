<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/5/11
 * Time: 6:25 PM
 * To change this template use File | Settings | File Templates.
 */
include_once('controllers/ChiTietNhaTroController.php');
?>

<div style="margin: 5px;">
     <p style="color: #003366; font-size: 13pt; font-family: tahoma; font-weight: bolder; padding-left: 15px">Thông tin nhà trọ</p>
    <table style="font-family: tahoma; font-size: 10pt; ">
        <tr>
            <td>
                <table style="font-family: tahoma; font-size: 10pt;" >
                    <tr>
                        <td valign="top" class="col2">
                            <img src="photos/<?php echo @$hinhanh; ?>" alt="Nhatro" width="200px">
                            <p>Lượt xem:  <span style="color: red; font-weight: bolder;"><?php echo@@$luotxem ?></span>  </p>
                        </td>
                        <td valign="top" class="col1">
                           <p><span style="color: #006400; font-weight: bold;"> Tên nhà trọ:</span> <?php echo @$tennhatro ;  ?> </p>
                           <p><span style="color: #006400;font-weight: bold;"> Địa chỉ : </span> <?php echo @$diachi ;  ?> </p>
                           <p><span style="color: #006400;font-weight: bold;"> Mô tả nhà trọ : </span> <?php echo @$mota ; ?> </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" class="col1">
                <p style="color: #003366; font-size: 13pt; font-family: tahoma; font-weight: bolder;">Các loại phòng:</p>
                <table style="font-size: 10pt">
                    <tr>
                          <td style="width: 120px; text-align: center; background-color: #9A95FD;">
                              Loại phòng
                          </td>
                          <td style="width: 300px; text-align: center; background-color: #9A95FD;">
                              Mô tả
                          </td>
                          <td style="width: 120px; text-align: center; background-color: #9A95FD;">
                              Đơn giá
                          </td>
                      </tr>
                <?php
                    $temp =0;
                    while($row = mysql_fetch_row($cacloaiphong))
                    {
                        if($temp % 2==1)
                        {
                            $color ="#dcedfc";
                        }
                        else
                        {
                            $color ="#e6e8f9";
                        }
                ?>
                      <tr>
                          <td style="background-color: <?php echo $color ?>; padding-left: 5px " >
                              <?php echo $row[4] ?>
                          </td>
                           <td style="background-color: <?php echo $color ?>; padding-left: 5px">
                               <?php echo $row[3] ?>
                          </td>
                           <td style="background-color: <?php echo $color ?>; padding-left: 5px">
                               <?php echo number_format($row[2],0) ?> VND
                          </td>
                      </tr>
                <?php
                        $temp +=1;
                    }
                ?>
                </table>
                <br />
            </td>
        </tr>
    </table>
</div>



<!-- Phần nhận xét -->
<p style="color: #003366; font-size: 13pt; font-family: tahoma; font-weight: bolder; padding-left: 15px">Nhận xét của thành viên</p>
<?php include_once("NhanXet.php"); ?>
<!--Kết thúc phần nhận xét-->