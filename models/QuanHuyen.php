<?php

    	class QuanHuyen extends database
		{
			private $maQuanHuyen;
			private $tenQuanHuyen;
			private $maTinhThanh;
			
			public function setMaQuanHuyen($maQuanHuyen)
			{
				$this->maQuanHuyen = $maQuanHuyen;
			}
			public function getMaQuanHuyen()
			{
				return $this->maQuanHuyen;
			}
			
			public function setTenQuanHuyen($tenQuanHuyen)
			{
				$this->tenQuanHuyen = $tenQuanHuyen;
			}
			public function getTenQuanHuyen()
			{
				return $this->tenQuanHuyen;
			}		                                       
			
			public function setMaTinhThanh($maTinhThanh)
			{
				$this->maTinhThanh = $maTinhThanh;
			}
			public function getMaTinhThanh()
			{
				return $this->maTinhThanh;
			}
			
			
			public function thongTinQuanHuyen()
			{
				$this->setQuery("select * from quan_huyen where QH_MA_SO=".$this->getMaQuanHuyen().";");             
				$result = $this->fetchAll();      
				while($rows  = mysql_fetch_array($result))
				{
					$this->setTenQuanHuyen($rows['QH_TEN']);
					$this->setMaTinhThanh($rows['TT_MA_SO']);
				}                  				
			}         
			public function themQuanHuyen()
			{
				$query = "insert into quan_huyen(QH_TEN, TT_MA_SO) values (N'".mysql_real_escape_string($this->getTenQuanHuyen())."',".$this->getMaTinhThanh().");";
				$this->setQuery($query);
				return $this->executeQuery();
			}
			public function suaQuanHuyen()
			{
				$query = "update quan_huyen set QH_TEN=N'".mysql_real_escape_string($this->getTenQuanHuyen())."' where QH_MA_SO=".$this->getMaQuanHuyen().";";            
				$this->setQuery($query);            
				return $this->executeQuery();
			}
			public function xoaQuanHuyen()
			{
				$this->setQuery("delete from quan_huyen where QH_MA_SO=".$this->getMaQuanHuyen().";");
				return $this->executeQuery();
			}
			public function danhSachQuanHuyen()
			{
				$this->setQuery("select * from quan_huyen order by QH_MA_SO asc");
				return $this->fetchAll();
			}
			public function danhSachQuanHuyenTheoTinhThanh()
			{
				$this->setQuery("select * from quan_huyen where TT_MA_SO=".$this->getMaTinhThanh()." order by QH_TEN asc");
				return $this->fetchAll();
			}
			public function tongSoQuanHuyen()
			{
				$query = "select count(QH_MA_SO) as tongsoquanhuyen from quan_huyen";
				$this->setQuery($query);
				$resultTongSoQuanHuyen = $this->fetchAll();
				$rowsTongSoQuanHuyen = mysql_fetch_array($resultTongSoQuanHuyen);
				$tongSoQuanHuyen = $rowsTongSoQuanHuyen['tongsoquanhuyen'];
				return $tongSoQuanHuyen;
			}
			public function tongSoQuanHuyenTheoTinhThanh()
			{
				$query = "select count(QH_MA_SO) as tongsoquanhuyen from quan_huyen where TT_MA_SO=".$this->getMaTinhThanh()."";
				$this->setQuery($query);
				$resultTongSoQuanHuyen = $this->fetchAll();
				$rowsTongSoQuanHuyen = mysql_fetch_array($resultTongSoQuanHuyen);
				$tongSoQuanHuyen = $rowsTongSoQuanHuyen['tongsoquanhuyen'];
				return $tongSoQuanHuyen;
			}        					
    	}
?>