<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 11/5/11
 * Time: 9:18 AM
 * To change this template use File | Settings | File Templates.
 */
if(!isset($_REQUEST['tt']))
{

    include_once('configs/database.php');
    include_once('models/TinhThanh.php');
    $tt =  new TinhThanh();
    $dstt=$tt->danhSachTinhThanh();

   if(isset($_REQUEST['t']))
    {
        $matinhthanh=$_GET['t'];
        $maquanhuyen=$_GET['q'];
        $mucgia = $_GET['m'];
        if($matinhthanh!=0 || $maquanhuyen!=0 ||  $mucgia!=0)
        {
            $select = "a.NT_MA_SO,a.NT_TEN,a.NT_DIA_CHI,b.CLP_DON_GIA,c.QH_TEN,d.TT_TEN";
            $from ="nha_tro a, co_loai_phong b, quan_huyen c, tinh_thanh d";
            if($mucgia==1)
            {
                $money = "<700000" ;
            }
            elseif($mucgia==2)
            {
                $money = "BETWEEN 700000 AND 1000000" ;
            }
            elseif($mucgia==3)
            {
                $money = "BETWEEN 1000000 AND 2000000" ;
            }
            elseif($mucgia==4)
            {
                $money = ">2000000" ;
            }
            if($maquanhuyen!=0 && $mucgia!=0 )
            {
               $where="a.NT_MA_SO=b.NT_MA_SO and a.QH_MA_SO = c.QH_MA_SO AND c.TT_MA_SO=d.TT_MA_SO and a.QH_Ma_So='".$maquanhuyen."' and (b.CLP_DON_GIA ".$money." )";

            }
            elseif (($matinhthanh!=0 && $mucgia!=0))
            {
                $where="a.NT_MA_SO=b.NT_MA_SO and a.QH_MA_SO = c.QH_MA_SO AND c.TT_MA_SO=d.TT_MA_SO and c.TT_MA_SO='".$matinhthanh."' and (b.CLP_DON_GIA ".$money.")";
            }
            elseif ($maquanhuyen!=0)
            {
                $where="a.NT_MA_SO=b.NT_MA_SO and a.QH_MA_SO = c.QH_MA_SO AND c.TT_MA_SO=d.TT_MA_SO and a.QH_Ma_So='".$maquanhuyen."'";
            }
            elseif ($matinhthanh!=0)
            {
                 $where="a.NT_MA_SO=b.NT_MA_SO and a.QH_MA_SO = c.QH_MA_SO AND c.TT_MA_SO=d.TT_MA_SO and c.TT_MA_SO='".$matinhthanh."'";
            }
            elseif ($mucgia!=0)
            {
                 $where="a.NT_MA_SO=b.NT_MA_SO and a.QH_MA_SO = c.QH_MA_SO AND c.TT_MA_SO=d.TT_MA_SO and (b.CLP_DON_GIA ".$money.")";
            }
            $query="select ".$select." from ".$from." where ".$where;
            $db = new database();
            $db->setQuery($query);
            $dsketqua = $db->fetchAll();
        }
    }
}
// Phần dưới đây dành cho Jquery lấy dữ liệu
    if(isset($_REQUEST['tt']))
    {
        include_once('../Configs/database.php');
        include_once('../models/QuanHuyen.php');
        $t = $_GET['tt'];
        $qh = new QuanHuyen();
        $qh->setMaTinhThanh($t);
        $dsqh = $qh->danhSachQuanHuyenTheoTinhThanh();
        echo "<option value='0'>---  Chọn quận huyện  ---</option>";
        while($row = mysql_fetch_row($dsqh))
        {
            echo "<option value='".$row[0]."' >".$row[2]." </option>";
        }
    }
 ?>