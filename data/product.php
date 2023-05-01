<?php
    include"database.php";
?>
<?php
    class product extends database{
        public $result = null;

        //lấy all sản phẩm
        public function select(){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `product`");
            return $this->result;
        }

        //lấy 4 sp mới nhất
        public function select_new_product(){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `product` ORDER BY id DESC LIMIT 4");
            return $this->result;
        }

        //lấy category
        public function select_category(){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `category`");
            return $this->result;
        }

        //lấy sản phẩm theo danh mục
        public function select_product_category($id_category){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `product` where id_category=$id_category");
            return $this->result;
        }

        //lấy chi tiết sản phẩm
        public function detail($id){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category' FROM product a JOIN category b  WHERE a.id_category = b.id AND a.id = $id");
            return $this->result;
        }


        //  //lấy từng dòng dữ liệu
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