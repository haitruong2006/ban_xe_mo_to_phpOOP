<?php
    include"data/product.php";
    $dt = new product;
?>
<section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
                <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select>
              </div>
            </div>
            
            <div class="latest_product_inner">
              <div class="row">
                <?php
                    $dt->select();
                    if(isset($_GET['id_category'])){
                      $id_category = $_GET['id_category'];
                      $dt->select_product_category($id_category);  
                    }
                    
                    while($r = $dt->fetch()){
                ?>
                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="admin/image/<?= $r['image']?>"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="?option=detail&id=<?= $r['id'] ?>">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="?option=addlikeproduct&id=<?= $r['id'] ?>">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="?option=cart&action=add&id=<?= $r['id']?>">
                         
                          <i class="ti-shopping-cart"></i>
                        </a>

                       

                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="?option=detail&id=<?= $r['id']?>" class="d-block">
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

          <div class="col-lg-3">
            <div class="left_sidebar_area">
        

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Hãng Xe</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li class="<?= $id_category==null?'active':''?>">
                      <a href="?option=category">Tất Cả Sản Phẩm</a>
                    </li>
                    <?php
                        $dt->select_category();
                        
                        while($r = $dt->fetch()){
                    ?>
                    <li class="<?= $id_category==$r['id']?'active':''?>">
                      <a href="?option=category&id_category=<?= $r['id']?>"><?= $r['name']?></a>
                    </li>
                
                    <?php
                        }
                    ?>
                  </ul>
                </div>
              </aside>

            
            </div>
          </div>
        </div>
      </div>
    </section>