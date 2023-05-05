
 <!--================Header Menu Area =================-->
 <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: 0388 549 606</p>
              <p>email: truongngo.050902@gmail.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html">
            <img src="img/logotrongsuot.png" alt="" width="100px"/>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="http://localhost:8080/quan_ly_ban_xe_OOP/index.php">Trang Chủ</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="?option=category">Tất Cả Sản Phẩm</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Sản Phẩm</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="?option=category&id_category=1">Xe Số</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?option=category&id_category=2">Xe Tay Ga</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?option=category&id_category=3">Xe Côn Tay</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?option=category&id_category=4">Xe Mô Tô</a>
                      </li>
                    </ul>
                  </li>
                  
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Trang</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Theo Dõi Đơn Hàng</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Quy Định Đổi Hàng</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Dịch Vụ Khuyến Mãi</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Liên Hệ</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  
                  <?php
                    if(isset($_SESSION['email'])){
                  ?>
                    <li class="nav-item">
                      <a href="?option=information" class="icons">
                      <i class="ti-user"></i>
                      </a>
                    </li>
                  <?php
                    }
                    else{
                 ?>
                    <li class="nav-item">
                      <a href="?option=login" class="icons">
                        <i class="ti-user" aria-hidden="true"></i>
                      </a>
                    </li>
                  <?php
                    }
                  ?>
                 

                    <li class="nav-item">
                      <a href="?option=card" class="icons">
                        <i class="ti-shopping-cart"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?option=listlikeproduct" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                      </a>
                    </li>
                 <?php
                    if(isset($_SESSION['email'])){
                  ?>
                    <li class="nav-item">
                      <a href="?option=logout" class="icons">
                      <i class="fas fa-sign-out-alt"></i>
                      </a>
                    </li>
                  <?php
                    }
                  ?>

                  
                  
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->
  