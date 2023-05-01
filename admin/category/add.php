<?php
    include"data/category.php";
    $dt = new category;
?>
<?php
    if(isset($_POST['click'])){
        $name = $_POST['name'];
        $check = $dt->check_insert($name);  
        if($dt->fetch()!=''){
            echo "<script>alert('data already exists! can't add')</script>";
        }else{
            $dt->insert($name);
            echo "<script>alert('Congratulations! you have successfully added')</script>";
        }
        echo "<script>window.location.href= '?option=addcategory'</script>";
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Add Category</h1>
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
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter category" required>
                    </div>
                    <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div> -->
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