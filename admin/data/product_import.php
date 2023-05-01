<?php
    include"database.php";
?>
<?php
    class product_import extends database{
        public $result = null;

        //select xe trong thang
        public function select(){
            $this->connect();
            $this->result = parent::Excute();
            return $this->result;
        }

        //select category
        public function select_category(){
            $this->connect();
            $this->result = parent::Excute("select * from category");
            return $this->result;
        }

        //check xem trong product đã có xe này chưa
        public function check_insert_product($name, $color){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `product` WHERE name = '$name' AND color = '$color'");
            return $this->result;
        }

        //thêm mới xe bảng product
        public function insert_product($id_import, $id_category, $name, $color, $price, $quantity, $characteristic, $specifications, $image){
            $this->connect();
            $this->result = parent::Excute("INSERT INTO `product` (`id_import`,`id_category`, `name`, `color`, `price`, `quantity`, `sell_number`, `characteristic`, `specifications`, `image`) VALUES ('$id_import', '$id_category', '$name', '$color', '$price', '$quantity', '', '$characteristic', '$specifications', '$image')");
            return $this->result;
        }

        //cập nhật số lượng cho sp
        public function update_quantity($quantity, $price, $name){
            $this->connect();
            $this->result = parent::Excute("update product set quantity = quantity + $quantity, price = $price where name='$name'");
            return $this->result;
        }

        //thêm mới bảng import
        public function insert_import($id_category, $name, $color, $price, $quantity, $image, $date){
            $this->connect();
            $this->result = parent::Excute("INSERT INTO `import_product` (`id_category`, `name`, `color`, `price`, `quantity`, `image`, `date`) VALUES ('$id_category', '$name', '$color', '$price', '$quantity', '$image', '$date')");
            return $this->result;
        }

        //select id insert_import
        public function select_id(){
            $this->connect();
            $this->result = parent::Excute("select id from import_product order by id desc limit 1");
            return $this->result;
        }

        //select update
        public function select_update($id){
            $this->connect();
            $this->result = parent::Excute("select a.*, b.name as 'name_category' from product a join category b where a.id_category = b.id and a.id=$id");
            return $this->result;
        }

        //update
        public function update($name, $color, $price, $characteristic, $specifications, $image, $id){
            $this->connect();
            $this->result = parent::Excute("update product set name = '$name', color = '$color', price = $price, characteristic = '$characteristic', specifications = '$specifications', image = '$image' where id='$id'");
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


    }
?>