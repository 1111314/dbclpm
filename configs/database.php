<?php
    class database{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "TimKiemNhaTro";
        private $connection;                         
        private $flagconn = false;
        private $query;
        private $result;
        
        /*-----------------------------------------------------------------------
        Function: Construct
        Parameter: No parameter
        Return: No return
        -------------------------------------------------------------------------*/
       public function __construct()
	   {
	   		 /*
       		 $connect=mysql_connect($this->hostname,$this->username,$this->password) or die ("không thể kết nối CSDL");
			 mysql_select_db($this->dbname) or die ("không tồn tại CSDL");
			 mysql_query("set names 'utf8'");	
			 $flagconn = $connect;   
			 */
			 
			 if (!$this->connection = mysql_connect($this->hostname,$this->username,$this->password))
			 {
			 	die("Không thể kết nối với server");
			 }
			 else
			 {
			 	mysql_query("set names 'utf8'");
				if (!mysql_select_db($this->dbname,$this->connection))
				{
					die("Không thể kết nối với cơ sở dữ liệu");
					mysql_close($this->connection);
				}
				else
				{
					$this->flagconn = true;
				}
			 }			 			 
        }
        
        public function setQuery($query)
        {
            $this->query = $query;
        }
          
        public function getQuery(){
            return $this->query;
        }
         public function getResult(){
            return $this->result;
        }
        /*---------------------------------------------------------
        Function: fetchAll
        Parameter: query string
        Return: array
        -------------------------------------------------------------*/
        public function isExits($table="", $where="")
		{            
            if (empty($table) || empty($where))
            {
                return false;
            }
            if ($this->flagconn == false)
			{
                $this->__construct();
            } 
            $this->setQuery("select * from $table where $where");
            //echo $this->getQuery();                      
            $this->result = mysql_query($this->query);
            return mysql_num_rows($this->result);
        }
        
        /*-------------------------------------------------
        Use:
            $db = new database();
            $db->setQuery("select * from NguoiDung");   
            $result = $db->fetchAll(); 
            while($rows  = mssql_fetch_array($result)){
                echo '<br>' . $rows['maSo'] . ' - ' . $rows['matKhau'];
            }
        -----------------------------------------------------*/                        
        public function fetchAll(){
            if ($this->flagconn == false)
			{
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            return $this->result;
            
        }
        
        /*-------------------------------------------
        Use:
            $db = new database();  
            $db->deleteRows("NguoiDung","maSo='1234567'");
        ---------------------------------------------*/ 			
		
        function deleteRows($table="", $where="")
        {
            if (empty($table) || empty($where))
            {
                return false;
            }
            $this->query = "delete from $table where $where"; 
            $this->result = mysql_query($this->query, $this->connection);
            //$rows = mssql_rows_affected($this->connection);
            return mysql_affected_rows($this->connection);
        }
        /*-------------------------------------------
        Use:
            $db = new database();  
            $array = array('maSo'=>'1234567', 'maQuyen'=>'01', 'matKhau' => '12345');
            $db ->insertRows("NguoiDung",$array)
        ---------------------------------------------*/ 
        function insertRows($table="", $atts="")
        {
            if(empty($table) || !is_array($atts))
            {
                return false;
            }
            else
            {
                while (list ($col, $val) = each ($atts))
                {
                    //if null go to the next array item
                    if (!($val==""))
                    {
                     	$col_str .= $col . ",";
						if (is_int($val) || is_double ($val))
						{
							$val_str .= $val . ",";
						}
						else
						{
							$val_str .= "'$val',";
						}   
                    }                    
                }
                $this->query = "insert into $table ($col_str) values($val_str)";
                //trim trailing comma from both strings
                $this->query = str_replace(",)", ")", $this->query);
            }
            $this->result = mysql_query($this->query, $this->connection);
            //$rows = mssql_rows_affected($this->connection);
            return mysql_affected_rows($this->connection);
        }		
         /*-------------------------------------------
        Use:
            $db = new database();  
            $array = array('matKhau' => '1234567');  
            $db ->updateRows("NguoiDung",$array,"maSo='1234567'")
        ---------------------------------------------*/ 
        function updateRows($table="", $atts="", $where="")
        {
            if(empty($table) || !is_array($atts))
            {
                return false;
            }
            else
            {
                while(list ($col, $val) = each ($atts))
                {
                    if (!($val==""))
                    {
                        if(is_int($val) || is_double($val))
						{
							$str .= "$col=$val,";
						}
						elseif($val=="NULL" || $val=="null")
						{
							$str .= "$col=NULL,";
						}
						else
						{
							$str .= "$col='$val',";
						}
                    }                    
                }
            }
            $str = substr($str, 0, -1);
            $this->query = "update $table set $str";
            if (!empty($where))
            {
                $this->query .= " where $where"; 
            }
            $this->result = mysql_query($this->query, $this->connection);
            return mysql_affected_rows($this->connection);
        }        
        /*---------------------------------------------------------
        Function: execute query
        Parameter: query string
        Return: return 0 if ok, return 1 if fail
        Use:
            $db = new database();
            $db->setQuery("delete from NguoiDung where maSo='"."134567'");
            $db->executeQuery(); 
        ------------------------------------------------------------*/
        public function executeQuery()
		{
            if ($this->flagconn == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            $rows = mysql_affected_rows($this->connection);
            return $rows; # Correct
        }
        
        /*---------------------------------------------------------
        function: destruct
        Parameter: No parameter
        return: No return
        */
        /*public function __destruct() {        
            if ($this->flagconn == true) {
                mssql_free_result($this->result);
                mssql_close ( $this->connection );
            }
    
        }*/
        
        public function numRecord(){
            if ($this->flagconn == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            $num = mysql_num_rows($this->result);
            return $num;            
        }
		
        public function getConnection(){
            return $this->connection;
        }
    }
?>
