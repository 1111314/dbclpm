<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/21/11
 * Time: 9:00 PM
 * To change this template use File | Settings | File Templates.
 */
    require_once('configs/database.php');
    class NhanXet extends database{
        private  $mathanhvien;
        private  $maso_nt;
        private $ngaydang;
        private $noidung;

        public function setMasoNt($maso)
        {
            $this->maso_nt = $maso;
        }

        public function getMasoNt()
        {
            return $this->maso_nt;
        }

        public function setMathanhvien($mathanhvien)
        {
            $this->mathanhvien = $mathanhvien;
        }

        public function getMathanhvien()
        {
            return $this->mathanhvien;
        }

        public function setNgaydang($ngaydang)
        {
            $this->ngaydang = $ngaydang;
        }

        public function getNgaydang()
        {
            return $this->ngaydang;
        }

        public function setNoidung($noidung)
        {
            $this->noidung = $noidung;
        }

        public function getNoidung()
        {
            return $this->noidung;
        }
        public function themNhanXet(){
            $query = "INSERT INTO nhan_xet (`TV_MA_SO`, `NT_MA_SO`, `NX_NGAY_NHAN_XET`, `NX_NOI_DUNG`) VALUES('".$this->getMathanhvien()."',";
            $query .= "'".$this->getMasoNt()."','".$this->getNgaydang()."',N'".$this->getNoidung()."')";
            $this->setQuery($query);
            //echo $this->getQuery();
            return $this->executeQuery();
        }
        public function suaNhanXet(){
            $this->setQuery("update Nhan_xet set NX_NOI_DUNG='".$this->getNoidung()."' where tv_ma_so='".$this->getMathanhvien()."' and NT_MA_SO=".$this->getMasoNt());
			// echo $this->getQuery();
            return $this->executeQuery();
        }
        public function xoaNhanXet(){
            $this->setQuery("delete Nhan_xet where tv_ma_so='".$this->getMathanhvien()."' and NT_MA_SO=".$this->getMasoNt());
            return $this->executeQuery();
        }
        public function dsNhanXet($manhatro){
            $strquery ="SELECT a.tv_ma_so,b.tv_ho, b.tv_ten, DATE_FORMAT( a.nx_ngay_nhan_xet, '%d-%m%-%Y lúc %h:%m:%s' ) , a.nx_noi_dung ";
            $strquery .="FROM Nhan_Xet a, thanh_vien b WHERE a.tv_ma_so = b.tv_ma_so and a.nt_ma_so='".$manhatro."' Order by a.nx_ngay_nhan_xet desc";
            $this->setQuery($strquery);
            return $this->fetchAll();
        }
    }
?>
