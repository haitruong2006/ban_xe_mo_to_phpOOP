<?php
    include"data/user.php";
    $dt = new user
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dt->select_update($id);
        $r = $dt->fetch();
    }
?>
<?php
    if(isset($_POST['click'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        if(strlen($phone)==10){
            $dt->update($email, $password, $fullname, $address, $phone, $birthday, $id);
            echo "<script>alert('Congratulations! you have successfully updated')</script>";
        }
        else{
            echo "<script>alert('Please enter your full phone number!')</script>";
        }
        echo "<script>window.location.href= '?option=updateuser&id=$id'</script>";
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Update User</h1>
            </div>
            <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Validation</li>
            </ol>
            </div> -->
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter user"  value="<?= $r['email']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" value="<?= $r['password'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Enter user" value="<?= $r['fullname'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter address" name="address" ><?= $r['address'] ?></textarea>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" required value="<?= $r['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Birthday</label>
                        <input type="date" name="birthday" class="form-control" id="exampleInputEmail1" placeholder="Enter birthday" value="value="<?= $r['birthday'] ?>"" required>
                    </div>
                    <div class="form-group mb-0">
                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div> -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="click">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>