<?php
  include"data/product.php";
  $dt = new product;
?>
<!--================ New Product Area =================-->
<section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Sản Phẩm Mới</span></h2>
           
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="new_product">
            <!-- <h5 class="text-uppercase">collection of 2019</h5> -->
            <!-- <h4 class="text-uppercase">Honda CBR1000RR-R Fireblade SP</h4> -->
            <div class="product-img">
              <img class="img-fluid" src="img/logotrongsuot.png" alt="" width="45%" />
            </div>
            <!-- <h4>1050000000</h4>
            <a href="#" class="main_btn">Add to cart</a> -->
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            <?php
              $dt->select_new_product();
              while($r = $dt->fetch()){
            ?>
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="admin/image/<?= $r['image']?>" alt="" width="70%"/>
                  <div class="p_icon">
                    <a href="?option=detail&id=<?= $r['id'] ?>">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="?option=addlikeproduct&id=<?= $r['id'] ?>">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
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
      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->