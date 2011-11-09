<?php

    	class TinhThanh extends database
		{
			private $maTinhThanh;
			private $tenTinhThanh;
			
			public function setMaTinhThanh($maTinhThanh)
			{
				$this->maTinhThanh = $maTinhThanh;
			}
			public function getMaTinhThanh()
			{
				return $this->maTinhThanh;
			}
			
			public function setTenTinhThanh($tenTinhThanh)
			{
				$this->tenTinhThanh = $tenTinhThanh;
			}
			public function getTenTinhThanh()
			{
				return $this->tenTinhThanh;
			}		                                       
			
			
			public function thongTinTinhThanh()
			{
				$this->setQuery("select * from tinh_thanh where TT_MA_SO=".$this->getMaTinhThanh().";");             
				$result = $this->fetchAll();      
				while($rows  = mysql_fetch_array($result))
				{
					$this->setTenTinhThanh($rows['TT_TEN']);
				}                  				
			}         
			public function themTinhThanh()
			{
				$query = "insert into tinh_thanh(TT_TEN) values (N'".mysql_real_escape_string($this->getTenTinhThanh())."');";
				$this->setQuery($query);
				return $this->executeQuery();
			}
			public function suaTinhThanh()
			{
				$query = "update tinh_thanh set TT_TEN=N'".mysql_real_escape_string($this->getTenTinhThanh())."' where TT_MA_SO=".$this->getMaTinhThanh().";";            
				$this->setQuery($query);            
				return $this->executeQuery();
			}
			public function xoaTinhThanh()
			{
				$this->setQuery("delete from tinh_thanh where TT_MA_SO=".$this->getMaTinhThanh().";");
				return $this->executeQuery();
			}
			public function danhSachTinhThanh()
			{
				$this->setQuery("select * from tinh_thanh order by TT_Ten asc");
				return $this->fetchAll();
			}
			public function tongSoTinhThanh()
			{
				$query = "select count(TT_MA_SO) as tongsotinhthanh from tinh_thanh";
				$this->setQuery($query);
				$resultTongSoTinhThanh = $this->fetchAll();
				$rowsTongSoTinhThanh = mysql_fetch_array($resultTongSoTinhThanh);
				$tongSoTinhThanh = $rowsTongSoTinhThanh['tongsotinhthanh'];
				return $tongSoTinhThanh;
			}        				
    	}
?>