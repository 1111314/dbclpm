<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/18/11
 * Time: 9:54 AM
 * To change this template use File | Settings | File Templates.
 */

include_once('../configs/database.php');
class thanhvien extends database{
  //  public $ma_thanh_vien; bien tu tang

    private  $maso;
    private  $maquyen;
    private  $tendangnhap;
	private  $matkhau;
	private  $ho;
	private  $ten;
    private  $email;
	private  $ngaysinh;
	private  $diachi;
	private  $gioitinh;
	private  $ngaydangky;

    private $ketqua;

    public function setMaso($maso)
    {
        $this->maso = $maso;
    }

    public function getMaso()
    {
        return $this->maso;
    }

    public function setMaquyen($maquyen)
    {
        $this->maquyen = $maquyen;
    }

    public function getMaquyen()
    {
        return $this->maquyen;
    }
    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;
    }

    public function getDiachi()
    {
        return $this->diachi;
    }

    public function setGioitinh($gioitinh)
    {
        $this->gioitinh = $gioitinh;
    }

    public function getGioitinh()
    {
        return $this->gioitinh;
    }

    public function setHo($ho)
    {
        $this->ho = $ho;
    }

    public function getHo()
    {
        return $this->ho;
    }
    public function setMatkhau($matkhau)
    {
        $this->matkhau = $matkhau;
    }

    public function getMatkhau()
    {
        return $this->matkhau;
    }

    public function setNgaydangky($ngaydangky)
    {
        $this->ngaydangky = $ngaydangky;
    }

    public function getNgaydangky()
    {
        return $this->ngaydangky;
    }

    public function setNgaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }

    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }

    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    public function getTen()
    {
        return $this->ten;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTendangnhap($tendangnhap)
    {
        $this->tendangnhap = $tendangnhap;
    }

    public function getTendangnhap()
    {
        return $this->tendangnhap;
    }

    function __construct()
    {
        // TODO: Implement __construct() method.

    }
    public function setKetqua($result)
    {
        $this->ketqua = $result;
    }

    public function getKetqua()
    {
        return $this->ketqua;
    }

        public function themThanhVien(){
//            $null = null; // cai nay lam j ? ko

            $query = "INSERT INTO thanh_vien (`TV_MA_SO`,`Q_MA_SO`, `TV_TEN_DANG_NHAP`, `TV_MAT_KHAU`, `TV_HO`, `TV_TEN`, `TV_NGAY_SINH`, `TV_DIA_CHI`, `TV_GIOI_TINH`,`TV_NGAY_DANG_KY`,`TV_EMAIL`) VALUES (NULL,".$this->getMaQuyen().", ";
            $query .= "'".$this->getTendangnhap()."','".$this->getMatkhau()."','".$this->getHo()."','".$this->getTen()."','".$this->getNgaysinh()."','".$this->getDiachi()."',".$this->getGioitinh().",'".$this->getNgaydangky()."','".$this->getEmail()."')";

            $this->setQuery($query);
//            echo $this->getQuery();
            return $this->executeQuery();
        }
        public function suaThanhVien(){
            $this->setQuery("update thanh_vien set tv_mat_khau='".$this->getMatkhau()."',Q_ma_so='".$this->getMaQuyen()."' where tv_ma_so='".$this->getMaso()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }
        public function xoaThanhVien(){
            $this->setQuery("delete thanh_vien where tv_ma_so='".$this->getMaSo()."'");
            return $this->executeQuery();
        }
        public function thongtinThanhVien(){
            $query = "select tv_ma_so, tv_ho + ' ' + tv_ten as hoten,convert(nvarchar(12),ngaysinh,103) as ngaysinh, phai=(case tv_gioi_tinh when 0 then N'Nữ' when 1 then 'Nam' end), tv_dia_chi, tv_email from thanh_vien";
            $query .= " where  tv_ma_so='".$this->getMaSo()."'";
            $this->setQuery($query);
            return $this->fetchAll();
        }
        public function dsThanhVien(){
            $this->setQuery("select * from thanh_vien");
            return $this->fetchAll();
        }
         public function  getDataFromWhere($where)
        {
            $this->setQuery("select * from thanh_vien where ".$where);
            return $this->fetchAll();
        }

// in order to convert date from format dd-mm-yy to yy-mm-dd
        function convert_in($ngay)
        {
            $ngay=trim($ngay);
            if ($ngay!=="")
            {
                $d=substr($ngay,0,2);
                $m=substr($ngay,3,2);
                $y=substr($ngay,6,4);
                $ns="$y-$m-$d";
            }
            return $ns;
        }
}
 ?>

