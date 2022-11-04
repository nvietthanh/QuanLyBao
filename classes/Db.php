<?php
    class DB{
        private $hostname = 'localhost',
			$username = 'root',
			$password = '',
			$dbname = 'do_an';
        public $cn = NULL;

        // kết nối
        public function connect(){
            $this->cn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        }

        public function query($sql = null) 
        {		
            // Nếu đã kết nối
            if ($this->cn){
                // Truy vấn
                mysqli_query($this->cn, $sql);
                return true;
            }
            return false;
        }

        public function close(){
            // Nếu đã kết nối
            if ($this->cn){
                // Ngắt kết nối
                mysqli_close($this->cn);
            }
        }

    	// Hàm đếm hàng
        public function num_rows($sql = null) 
        {
            // Nếu đã kết nối
            if ($this->cn)
            {
                $query = mysqli_query($this->cn, $sql);
                $row = mysqli_num_rows($query);
                return $row;
            }
        }

        // Hàm lấy dữ liệu
        public function fetch_assoc($sql = null, $type)
        {
            // Nếu đã kết nối
            if ($this->cn)
            {
                // Thực thi truy vấn
                $query = mysqli_query($this->cn, $sql);
                // Nếu tham số type = 0
                if ($type == 0)
                {
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                // Nếu tham số type = 1
                else if ($type == 1)
                {
                    $data = mysqli_fetch_assoc($query);
                    return $data;
                }		
            }
        }
    }
?>