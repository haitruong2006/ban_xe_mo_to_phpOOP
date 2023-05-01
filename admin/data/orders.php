<?php
    include"database.php";
?>
<?php
    class orders extends database{
        public $result = null;

        //select
        public function select(){
            $this->connect();
            $this->result = parent::Excute("select a.*, b.fullname as 'name_user' from orders a  join user b where a.id_user = b.id");
        }

        //select theo status
        public function select_status($status){
            $this->connect();
            $this->result = parent::Excute("select a.*, b.fullname as 'name_user' from orders a  join user b where a.id_user = b.id and a.status = $status");
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