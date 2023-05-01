<?php
    class database{
        private $conn = null;

        //kết nối dữ liệu
        public function connect(){
            $this->conn = new mysqli("localhost", "root", "", "quan_ly_ban_xe_OOP") or die("kết nối thất bại");
        }

        //truy vấn
        public function Excute($sql){
            $result = mysqli_query($this->conn,$sql);
            return $result;
        }
    }
?>