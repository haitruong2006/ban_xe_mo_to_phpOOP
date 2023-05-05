<?php
    include"data/information.php";
    $dt = new information;
?>
<?php
    if(isset($_POST['click'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];

        $dt->check_email($email);
        if($dt->fetch()!=''){
          echo "<script>alert('Email này đã tồn tại!')</script>";
        }
        else{
          if(strlen($phone)==10){
            $dt->register($email, $password, $fullname, $phone, $birthday, $address);
            echo "<script>alert('Chúc mừng bạn đang ký thành công tài khoản!')</script>";
          }
          else{
            echo "<script>alert('Vui lòng nhập đầy đủ số điện thoại!')</script>";
          }
         
        }

        echo "<script>window.location.href= '?option=register'</script>";
    }
?>
<section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-12">
                <h3 style="text-align:center">Đăng Ký</h3>
              <form class="row contact_form" action="#" method="post" >
                <div class="col-md-6 form-group p_star">
                  <input type="email" class="form-control"  name="email" placeholder="enter email" required/>
            
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control"  name="password" placeholder="enter password" required/>
                  
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control"  name="fullname" placeholder="full name" required/>
                </div>
                <div class="col-md-6 form-group p_star">
                  <input type="number" class="form-control" name="phone" placeholder="enter phone" required/>
            
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="date" class="form-control"  name="birthday" placeholder="enter birthday" required/>
                  
                </div>
                <div class="col-md-12 form-group">
                  
                  <textarea
                    class="form-control"
                    name="address"
                    id="message"
                    rows="1"
                    placeholder="address"
                  ></textarea>
                </div>
                <div class="col-md-5 form-group">
                  
                  <button type="submit" value="submit" class="btn submit_btn" name="click">
                    Hoàn Tất
                  </button>
                  
                </div>
                <div class="col-md-7 form-group">
                  
                  <div class="float-right">
                    Bạn đã có tài khoản ? <a href="?option=login" style="color:red"> Đăng nhập</a>
                  </div>
                 
                </div>
              </form>
            </div>
            
           
          </div>
        </div>
      </div>
    </section>