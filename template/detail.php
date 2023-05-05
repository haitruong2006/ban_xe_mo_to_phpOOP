<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // echo "<script>alert('$id')</script>";
    $dt->detail($id);
    $r = $dt->fetch();
?>
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
            <div class="s_product_img">
                <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
                >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        class="d-block w-100"
                        src="admin/image/<?= $r['image']?>"
                        alt="First slide"
                    />
                    </div>
                </div>
                </div>
            </div>
            </div>
            
            <div class="col-lg-5 offset-lg-1">
                <form action="#" method="post">
                    <?php
                        if(isset($_POST['qty'])){
                            $qty = $_POST['qty'];
                        }
                    ?>
                    <div class="s_product_text">
                        <h3><?= $r['name']?></h3>
                        <h2><?= number_format($r['price'])?><sup>đ</sup></h2>
                        <ul class="list">
                        <li>
                            <a href="#"> <span>Hãng Xe</span> : <?= $r['name_category']?></a>
                        </li>
                        <li>
                            <a href="#"> <span>Tình Trạng</span> : <?= $r['quantity']-$r['sell_number']==0?'Hết hàng':'Còn hàng'?></a>
                        </li>
                        </ul>
                        <p>
                        <?= $r['characteristic'] ?>
                        </p>
                        <div class="product_count">
                        <label for="qty">Số lượng:</label>
                            <input
                                type="number"
                                min="1"
                                name="qty"
                                value="1"
                                id="sst"
                                maxlength="12"
                                title="Quantity:"
                                class="input-text qty"
                            />
                        
                        </div>
                        <div class="card_area">
                        <a class="main_btn" href="?option=addcard&id=<?= $r['id']?>&qty=1>">Add to Cart</a>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-diamond"></i>
                        </a>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-heart"></i>
                        </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------comment------------------------->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
        
            <li class="nav-item">
                <a
                    class="nav-link active"
                    id="review-tab"
                    data-toggle="tab"
                    href="#review"
                    role="tab"
                    aria-controls="review"
                    aria-selected="false"
                    >Reviews</a
                >
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
                <a href="#"> <?= $r['specifications']?></a>
            </div>
            
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="review_list">
                            <div class="review_item">
                            <div class="media">
                                <div class="d-flex">
                                <img
                                    src="img/product/single-product/review-1.png"
                                    alt=""
                                />
                                </div>
                                <div class="media-body">
                                <h4>Blake Ruiz</h4>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>
                               <?= $r['name'] ?>
                            </p>
                            </div>
                            <div class="review_item">
                            <div class="media">
                                <div class="d-flex">
                                <img
                                    src="img/product/single-product/review-2.png"
                                    alt=""
                                />
                                </div>
                                <div class="media-body">
                                <h4>Blake Ruiz</h4>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                            </p>
                            </div>
                            <div class="review_item">
                            <div class="media">
                                <div class="d-flex">
                                <img
                                    src="img/product/single-product/review-3.png"
                                    alt=""
                                />
                                </div>
                                <div class="media-body">
                                <h4>Blake Ruiz</h4>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list">
                            <li>
                                <a href="#">
                                <i class="fa fa-star"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="fa fa-star"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="fa fa-star"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="fa fa-star"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="fa fa-star"></i>
                                </a>
                            </li>
                            </ul>
                            <p>Outstanding</p>
                            <form
                            class="row contact_form"
                            action="contact_process.php"
                            method="post"
                            id="contactForm"
                            novalidate="novalidate"
                            >
                            <div class="col-md-12">
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Your Full name"
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Email Address"
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="number"
                                    name="number"
                                    placeholder="Phone Number"
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <textarea
                                    class="form-control"
                                    name="message"
                                    id="message"
                                    rows="1"
                                    placeholder="Review"
                                ></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button
                                type="submit"
                                value="submit"
                                class="btn submit_btn"
                                >
                                Submit Now
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------------end comment------------------------->