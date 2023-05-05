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

        //lấy id user từ email
        public function select_id($email){
            $this->connect();
            $this->result = parent::Excute("SELECT id FROM `user` WHERE email = '$email'");
            return $this->result;
        }

        //lấy all sản phẩm yêu thcihs từ id_user
        public function select_productlike($id_user){
            $this->connect();
            $this->result = parent::Excute("SELECT b.id as 'id', b.name as 'name', b.image as 'image', b.price as 'price'  FROM `like_product` a JOIN product b WHERE a.id_user = $id_user AND a.id_product = b.id");
            return $this->result;
        }
        
        //check xem có sản phẩm trong eyeu thcihs chưa
        public function check_like($id_user, $id_product){
            $this->connect();
            $this->result = parent::Excute("SELECT * FROM `like_product` WHERE id_user = $id_user AND id_product = $id_product");
            return $this->result;
        }

        //add sản phẩm yêu thích
        public function add_product_like($id_user, $id_product){
            $this->connect();
            $this->result = parent::Excute("INSERT INTO `like_product` (`id_user`, `id_product`) VALUES ('$id_user', '$id_product')");
            return $this->result;
        }

        //lấy chi tiết sản phẩm
        public function detail($id){
            $this->connect();
            $this->result = parent::Excute("SELECT a.*, b.name as 'name_category' FROM product a JOIN category b  WHERE a.id_category = b.id AND a.id = $id");
            return $this->result;
        }


        //xóa sản phẩm yêu thích
        public function remove_likeproduct($id_user, $id_product){
            $this->connect();
            $this->result = parent::Excute("delete from like_product where id_user = $id_user and id_product = $id_product");
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