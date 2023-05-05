<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    if(!empty($_SESSION['email'])){
        $email = $_SESSION['email'];
        $dt->select_id($email);
        $r = $dt->fetch();
        
        $id_user = $r['id'];

        
        if(isset($_GET['id'])){
            $id_product = $_GET['id']; 
        }

        $dt->check_like($id_user, $id_product);
        if($dt->fetch()!=''){
            echo "<script>alert('Sản phẩm này đã tồn tại trong mục yêu thích của bạn!Vui lòng kiểm tra lại')</script>";
        }
        else{
            $dt->add_product_like($id_user, $id_product);
            echo "<script>alert('Bạn đã thêm sản phẩm vào mục yêu thích!')</script>";
        }

        // echo "<script>alert('add!$id_product!$email!$id_user')</script>";
    }
    else{
        echo "<script>alert('Bạn vui lòng đăng nhập trước khi thực hiện!')</script>";
        echo "<script>window.location.href= '?option=login'</script>";
    }
    echo "<script>window.location.href= 'http://localhost:8080/quan_ly_ban_xe_OOP/index.php'</script>";
?>