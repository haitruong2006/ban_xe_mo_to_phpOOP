  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Tất Cả Sản Phẩm</span></h2>
            
          </div>
        </div>
      </div>

      <div class="row">
        
        <?php
          $dt->select();
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
  </section>
  <!--================ End Inspired Product Area =================-->