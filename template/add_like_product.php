<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    if(!empty($_SESSION['email'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        echo "<script>alert('add!$id')</script>";
    }
    else{
        echo "<script>alert('no add!')</script>";
    }
    echo "<script>window.location.href= 'http://localhost:8080/quan_ly_ban_xe_OOP/index.php'</script>";
?>