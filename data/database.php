<?php
   class database{
        private $conn = null;

        //hàm kết nối
        public function connect(){
            $this->conn = new mysqli("localhost", "root", "", "quan_ly_ban_xe_OOP");
        }

        //hàm thực hiện truy vấn
        public function Excute($sql){
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

   }
?>