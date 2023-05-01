<?php
    include"database.php";
?>
<?php
    class user extends database{
        public $result = null;

        //select dữ liệu
        public function select(){
            $this->connect();
            $this->result = parent::Excute("select * from user");
            return $this->result;
        }

        //check insert 
        public function check_insert($email){
            $this->connect();
            $this->result = parent::Excute("select * from user where email = '$email'");
            return $this->result;
        }

        //phương thức insert
        public function insert($email, $password, $fullname, $address, $phone, $birthday){
            $this->connect();
            $this->result = parent::Excute("INSERT INTO `user` (`email`, `password`, `fullname`, `address`, `phone`, `birthday`) VALUES ('$email', '$password', '$fullname', '$address', '$phone', '$birthday')");
            return $this->result;
        }

        //phương thwucs select update
        public function select_update($id){
            $this->connect();
            $this->result = parent::Excute("select * from user where id=$id");
            return $this->result;
        }

        //phương thức update
        public function update($email, $password, $fullname, $address, $phone, $birthday, $id){
            $this->connect();
            $this->result = parent::Excute("UPDATE `user` SET `email` = '$email', `password` = '$password', `fullname` = '$fullname', `address` = '$address', `phone` = '$phone', `birthday` = '$birthday' WHERE `id` = $id");
            return $this->result;
        }

        //lấy từng dữ liệu
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

        //kiểm tra xem có tồn tại category trong product không
        public function check_delete($id){
            $this->connect();
            $this->result = parent::Excute("select * from orders where id_user=$id");
            return $this->result;
        }
        
        //phương thức xóa
        public function delete($id){
            $this->connect();
            $this->result = parent::Excute("delete from user where id=$id");
            return $this->result;
        }


    }
?>