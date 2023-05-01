<?php
    include"database.php";
?>
<?php
    class product extends database{
        public $result = null;

        //select dữ liệu
        public function select(){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category', c.date as 'date' FROM product a JOIN category b JOIN import_product c WHERE c.id = a.id_import AND a.id_category = b.id");
            return $this->result;
        }

        //select tháng
        public function select_month($month){
            $this->connect();
            $this->result = parent::Excute("select a.*, b.name as 'name_category', c.sell_number as 'sell_number' from import_product a join category b join product c where a.id = c.id_import and a.id_category = b.id and  month(date)= $month");
            return $this->result;
        }

        //select product type
        public function select_type($id_category){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category', c.date as 'date' FROM product a JOIN category b JOIN import_product c WHERE c.id = a.id_import AND a.id_category = b.id and a.id_category=$id_category");
            return $this->result;
        }

         //select product type and id_category
         public function select_month_category($id_category, $month){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category', c.date as 'date' FROM product a JOIN category b JOIN import_product c WHERE c.id = a.id_import AND a.id_category = b.id and a.id_category=$id_category AND month(date)= $month");
            return $this->result;
        }

        //select category
        public function select_category(){
            $this->connect();
            $this->result = parent::Excute("select * from category");
            return $this->result;
        }

        //select detail
        public function select_detail($id){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category' FROM product a JOIN category b WHERE a.id_category = b.id  AND a.id = $id");
            return $this->result;
        }

        //check xem hãng đã tồn tại chưa
        public function check_insert($name){
            $this->connect();
            $this->result = parent::Excute("select * from product where name='$name'");
            return $this->result;
        }

        //phương thức thêm mới
        public function insert($name){
            $this->connect();   
            $this->result = parent::Excute("INSERT INTO `product` (`name`) VALUES ( '$name')");
        }

        //phương thức thêm mới
        public function update_quantity($name, $id){
            $this->connect();   
            $this->result = parent::Excute("UPDATE `product` set `name` = '$name' where id=$id");
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
            $this->result = parent::Excute("select * from order_detail where id_product=$id");
            return $this->result;
        }
        
        //phương thức xóa
        public function delete($id){
            $this->connect();
            $this->result = parent::Excute("delete from product where id=$id");
            return $this->result;
        }


    }
?>