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

        //check xem email đã tồn tại chưa
        public function check_email($email){
            $this->connect();
            $this->result = parent::Excute("select * from user where email = '$email'");
            return $this->result;
        }

        //đăng ký tk mới
        public function register($email, $password, $fullname, $phone, $birthday, $address){
            $this->connect();
            $this->result = parent::Excute("INSERT INTO `user` (`email`, `password`, `fullname`, `address`, `phone`, `birthday`) VALUES ('$email', '$password', '$fullname', '$address', '$phone', '$birthday')");
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