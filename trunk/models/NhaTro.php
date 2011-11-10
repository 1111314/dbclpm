<?php
    include_once("Configs/database.php");
    class NhaTro extends database{
        private $maso;
        private $ten;
        private $diachi;
		private $mota;
		private $sophong;
        private $qh_maso;
        private $hinhanh;
        private  $luotxem;
        // tong so phong
        
        /*public function __construct($maSo, $matKhau){
            $this->maSo = $maSo;
            $this->matKhau = $matKhau;
        } */

        public function setMaSo($MaSo){
            $this->maso = $MaSo;
        }
        

        public function getMaSo(){
            return $this->maso;
        }
        
        
        public function setTen($Ten){
            $this->ten = $Ten;
        }
        public function getTen(){
            return $this->ten;
        }
        public function setDiaChi($DiaChi){
            $this->diachi = $DiaChi;
        }
         public function getDiaChi(){
            return $this->maquyen;
        }
        
        public function setQHMaSo($QH_MaSo){
            $this->qh_maso = $QH_MaSo;
        }
         public function getQHMaSo(){
            return $this->qh_maso;
        }
        
        public function setMoTa($MoTa){
            $this->mota = $MoTa;;
        }
         public function getMoTa(){
            return $this->MoTa;
        }
        
        public function setSoPhong($SoPhong){
            $this->sophong = $SoPhong;
        }
         public function getSoPhong(){
            return $this->sophong;
        }
        public function setHinhanh($hinhanh)
          {
              $this->hinhanh = $hinhanh;
          }

          public function getHinhanh()
          {
              return $this->hinhanh;
          }

          public function setLuotxem($luotxem)
          {
              $this->luotxem = $luotxem;
          }

          public function getLuotxem()
          {
              return $this->luotxem;
          }

        
        public function themNhaTro(){
            $this->setQuery("insert into nha_tro(QH_MA_SO,NT_TEN,NT_DIA_CHI,NT_MO_TA,NT_SO_PHONG,NT_LUOT_XEM,NT_HINH_ANH) values
            ('".$this->getQHMaSo()."',N'".$this->getTen()."',N'".$this->getDiaChi()."',N'".$this->getMoTa()."','".$this->getSoPhong()."','".$this->getLuotxem()."','".$this->getHinhanh()."')");
            return $this->executeQuery();
        }

        //Ham sửa nhà trọ: lượt xem là tự động tăng nên t viết riêng hàm, lượt xem ko có trong hàm sửa này, còn hình ảnh có cho vào thêm ko
        // thì khi ông làm thấy cần thì cho vào, t sợ khi thêm vào câu truy vấn này nếu người ta ko sửa hình ảnh thì biến hình ảnh rỗng sợ nó báo lỗi
        // có thể viết hàm sửa hình ảnh riêng cũng dc.
        public function suaNhaTro(){
            $this->setQuery("update nha_tro set QH_MA_SO='".$this->getQHMaSo()."',NT_TEN='".$this->getTen()."',NT_DIA_CHI='".$this->getDiaChi().
                            "',NT_MO_TA='".$this->getMoTa()."',NT_SO_PHONG='".$this->getSoPhong()."' where NT_MA_SO='".$this->getMaSo()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }

        public function capnhatLuotXem()
        {
            $this->setQuery("update nha_tro set NT_LUOT_XEM ='".$this->getLuotxem()."' where NT_MA_SO='".$this->getMaSo()."'");
            return $this->executeQuery();
        }

         public function xoaNhaTro(){
            $this->setQuery("delete from nha_tro where NT_MA_SO='".$this->getMaSo()."'");
            return $this->executeQuery();
        }

        public function thongtinNhaTro(){
            $query ="select NT.NT_MA_SO,NT.NT_TEN, NT.NT_DIA_CHI,NT.NT_MO_TA,NT.NT_SO_PHONG,NT.NT_LUOT_XEM,NT.NT_HINH_ANH,QH.QH_TEN,TT.TT_TEN";
            $query.=" from nha_tro as NT, tinh_thanh as TT, quan_huyen as QH " ;
            $query.= " where NT.QH_MA_SO = QH.QH_MA_SO and QH.TT_MA_SO = TT.TT_MA_SO ";
            $query .= " and  NT.NT_MA_SO='".$this->getMaSo()."'";
            $this->setQuery($query);
            return $this->fetchAll();
        }
        
        public function dsNhaTro(){
            $this->setQuery("select * from nha_tro");
            return $this->fetchAll();
        }
        
        public function dsLoaiPhongThuocNhaTro(){
          $query = "select NT.NT_TEN, NT.NT_MA_SO,CLP.CLP_DON_GIA,CLP.CLP_MO_TA,LP.LP_TEN ";
            $query.= " from nha_tro as NT, co_loai_phong as CLP ";
            $query.=" where NT.NT_MA_SO = CLP.NT_MA_SO and CLP.LP_MA_SO = LP.LP_MA_SO" ;
            $query .= " and  NT.NT_MA_SO='".$this->getMaSo()."'";
            $this->setQuery($query);
            return $this->fetchAll();
        }



    }
?>
