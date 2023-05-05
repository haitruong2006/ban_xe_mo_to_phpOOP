<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    //kiểm tra xem có đăng nhaaoj chưa
    if(!empty($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $dt->select_id($email);
        $r = $dt->fetch();
        
        $id_user = $r['id'];

        // echo "<script>alert('$id_user')</script>";
    
?>
<?php
    if(isset($_GET['id'])){
        $id_product = $_GET['id'];
        $dt->remove_likeproduct($id_user, $id_product);
        echo "<script>alert('Bạn đã xóa thành công!')</script>";
        echo "<script>window.location.href= '?option=listlikeproduct'</script>";
    }
?>
<!--================ Inspired Product Area =================-->
<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Sản Phẩm Yêu Thích</span></h2>
                
                </div>
            </div>
        </div>

        <div class="row">
        
            <?php
                $dt->select_productlike($id_user);
                
                while($r = $dt->fetch()){
                
            ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="admin/image/<?= $r['image']?>" alt="" />
                            <div class="p_icon">
                            <a href="?option=detail&id=<?= $r['id'] ?>">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="#">
                                <i class="ti-shopping-cart"></i>
                            </a>
                            <a href="?option=listlikeproduct&id=<?= $r['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa!')">
                                <i class="fas fa-trash"></i>
                            </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="?option=detail&id=<?= $r['id'] ?>" class="d-block">
                            <h4><?= $r['name']?></h4>
                            </a>
                            <div class="mt-3">
                            <span class="mr-4"><?= number_format($r['price'])?><sup>đ</sup></span>
                            <!-- <del>$35.00</del> -->
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
    }
    else{
        echo "<script>alert('Bạn vui lòng đăng nhập trước khi thực hiện!')</script>";
        echo "<script>window.location.href= '?option=login'</script>";
    }
//kết thcus ktra đăng nhập
?>

<!--================ End Inspired Product Area =================-->