<?php
    include"database.php";
?>
<?php
    class category extends database{
       public $result = null;
        //select dữ liệu
        public function select(){
            $this->connect();
            $this->result = parent::Excute("select * from category");
            return $this->result;
        }

        //check xem hãng đã tồn tại chưa
        public function check_insert($name){
            $this->connect();
            $this->result = parent::Excute("select * from category where name='$name'");
            return $this->result;
        }

        //phương thức thêm mới
        public function insert($name){
            $this->connect();   
            $this->result = parent::Excute("INSERT INTO `category` (`name`) VALUES ( '$name')");
        }

        //phương thức select dữ liệu update
        public function select_update($id){
            $this->connect();
            $this->result = parent::Excute("select * from category where id=$id");
            return $this->result;
        }
        
        //phương thức update
        public function update($name, $id){
            $this->connect();
            $this->result = parent::Excute("update category set name = '$name' where id=$id");
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
            $this->result = parent::Excute("select * from product where id_category=$id");
            return $this->result;
        }
        
        //phương thức xóa
        public function delete($id){
            $this->connect();
            $this->result = parent::Excute("delete from category where id=$id");
            return $this->result;
        }
        
    }
?>