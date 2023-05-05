<?php
  include"data/information.php";
  $dt = new information;
?>
<?php
  if(isset($_POST['click'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    // echo "<script>alert('$password')</script>";
    $dt->login($email, $password);
    if($dt->fetch()!=''){
      $_SESSION['email'] = $_POST['email'];
      echo "<script>alert('Đăng nhập thành công!')</script>";
      echo "<script>window.location.href= 'http://localhost:8080/quan_ly_ban_xe_OOP/index.php'</script>";
    }
    else{
      echo "<script>alert('Sai email hoặc password!')</script>";
    }
 
  }
?>
<section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-12">
              <h3 style="text-align:center">Đăng Nhập</h3>
              <form
                class="row contact_form"
                action="#"
                method="post"
                
              >
          
                <div class="col-md-12 form-group">
                  <input
                    type="email"
                    class="form-control"
                    id="company"
                    name="email"
                    placeholder="Enter Email"
                  />
                </div>
                <div class="col-md-12 form-group">
                 
                  <input
                    type="password"
                    class="form-control"
                    id="company"
                    name="password"
                    placeholder="Enter Password"
                  />
                </div>
                
                <div class="col-md-5 form-group">
                  
                  <button type="submit" value="submit" class="btn submit_btn" name="click">
                    Send Message
                  </button>
                  
                </div>
                <div class="col-md-7 form-group">
                  
                  <div class="float-right">
                    Bạn chưa có tài khoản ?<a href="?option=register" style="color:red"> Đăng ký</a>
                  </div>
                 
                </div>
                
              </form>
            </div>
            
           
          </div>
        </div>
      </div>
    </section>