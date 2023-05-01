<?php
    include"database.php";
?>
<?php
    class information extends database{
        public $result = null;

        //chwucs năng đăng nhập
        public function login($email, $password){
            $this->connect();
            $this->result = parent::Excute("select * from user where email = '$email' and password = '$password'");
            return $this->result;
        }

        //lấy từng dòng dữ liệu
        public function fetch(){
            $this->connect();
            
            if($this->result->num_rows > 0){
                $rows = $this->result->fetch_assoc();
            }
            else{
                $rows = '';
            }
            return $rows;
        }
    }
?>