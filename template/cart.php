<?php

    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    $quantity=$quantity<=0 ? 1 : $quantity;
    $cart_item=array(
        'quantity'=>$quantity
    );
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(array_key_exists($id, $_SESSION['cart'])){
        // redirect to product list and tell the user it was added to cart
        // header('Location: ?option=cart');
        // echo "<script>window.location.href= '?option=cart'</script>";
    }
     
    // else, add the item to the array
    else{
        $_SESSION['cart'][$id]=$cart_item;
     
        // redirect to product list and tell the user it was added to cart
        echo "<script>window.location.href= '?option=cart'</script>";
    }
?>
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="col-lg-12">
                <h1 style="text-align:center">Giỏ Hàng</h1>
            </div>
            <div class="table-responsive">
                <form action="#" method="post">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php
                                if(isset($_SESSION['cart'])){
                                    $ids = implode(',', array_keys($_SESSION['cart']));

                                    var_dump($_SESSION['cart']);
                                }
                            ?></th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                    <img
                                        src="img/product/single-product/cart-1.jpg"
                                        alt=""
                                    />
                                    </div>
                                    <div class="media-body">
                                    <p>Minimalistic shop for multipurpose use</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>$360.00</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input
                                    type="number"
                                    min="1"
                                    name="qty"
                                    id="sst"
                                    maxlength="12"
                                    value="1"
                                    title="Quantity:"
                                    class="input-text qty"
                                    />
                                </div>
                            </td>
                            <td>
                            <h5>$720.00</h5>
                            </td>
                        </tr>
                        
                        <tr class="bottom_button">
                            <td>
                                <button class="gray_btn" href="#">Update Cart</button>
                            </td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <!-- <div class="cupon_text">
                                    <input type="text" placeholder="Coupon Code" />
                                    <a class="main_btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div> -->
                                <h5>$2160.00</h5>
                                
                            </td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td>
                            <h5>Subtotal</h5>
                            </td>
                            <td>
                            <h5>$2160.00</h5>
                            </td>
                        </tr> -->
                        
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="?option=category">Tiếp Tục Mua Sắm</a>
                                    <a class="main_btn" href="#">Tiến Hành Thanh Toán</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->