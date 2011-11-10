<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/7/11
 * Time: 10:39 AM
 * To change this template use File | Settings | File Templates.
 */



if(isset($_GET['nt']))
{
    include_once('models/NhaTro.php');
    $nt= $_GET['nt'];
    $nhatro = new NhaTro();
    $nhatro->setMaSo($nt);
    $nhatro->capnhatLuotXem();
    $thongtinnhatro=$nhatro->thongtinNhaTro();
    $cacloaiphong = $nhatro->dsLoaiPhongThuocNhaTro();
    while($row = mysql_fetch_row($thongtinnhatro))
    {
        $hinhanh = $row[6];
        $maso = $row[0];
        $tennhatro = $row[1];
        $diachi = $row[2];
        $mota = $row[3];
        $sophong = $row[4];
        $luotxem = $row[5];
    }

}
?>