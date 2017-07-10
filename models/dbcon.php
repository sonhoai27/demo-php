<?php
	class ConnectDB
	{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db_name = "shopwatch";
		private $conn = NULL;
		private $result = NULL;

		public function connectdb()
		{
            /** TYPE_NAME $this */
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass);
			mysqli_select_db($this->conn, $this->db_name);
            mysqli_set_charset($this->conn, 'utf8');
		}

		//huy ket noi
		public function disconnectdb()
		{
			if($this->conn){
				mysqli_close($this->conn);
			}
		}

		//truy van sql
		public function query($sql){
			$this->result = mysqli_query($this->conn, $sql);
			if($this->result){
				return true;
			}else {
				return false;
			}
		}

		//dem so dong
		public function num_rows(){
			if($this->result){
				$row = mysqli_num_rows($this->result);
			}else{
				$row = 0;
			}

			return $row;
		}

		//fetch de kiem tra cau truy van, sau do dua du lieu ra dang array

		public function fetch() {
			if($this->result){
                $data = array();
				while($post = mysqli_fetch_assoc($this->result)){
                    $data[] = $post;
                }
			}else{
				$data = 0;
			}

			return $data;
		}
        
        public function getAllProduct(){
            $db = new ConnectDB();
            $db->connectdb();
            $sql = 'select * from watch';
            $db->query($sql);
            $datarow = $db->fetch();
            return $datarow;
        }
        public function getOneProduct($id){
            $db = new ConnectDB();
            $db->connectdb();
            $sql = "select * from watch where id_watch = '$id' ";
            $db->query($sql);
            $datarow = $db->fetch();
            return $datarow;
        }
	}

//thao tac truc tiep tren co so du lieu la models
//dieu huong...cac thao tac giua client va server
?>
