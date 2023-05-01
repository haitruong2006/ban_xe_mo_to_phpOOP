<?php
    include"data/product_import.php";
    $dt = new product_import
?>
<?php
    if(isset($_POST['click'])){
        $id_category = $_POST['id_category'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $date = date("Y/m/d");

        $path = "./image/";
        
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];

        $exp3 = substr($image, strlen($image) - 3);
        $exp4 = substr($image, strlen($image) - 4);

        if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
            move_uploaded_file($imageTemp,$path.$image);
            
            $dt->insert_import($id_category, $name, $color, $price, $quantity, $image, $date);
            
            $dt->check_insert_product($name, $color);

            if($dt->fetch()!=''){
                
                $dt->update_quantity($quantity, $price, $name);
                echo "<script>alert('the data already exists, so update the quantity!')</script>";
            }
            else{
                $dt->select_id();
                $r = $dt->fetch();
                $id_import = $r['id'];
                $dt->insert_product($id_import, $id_category, $name, $color, $price, $quantity, $characteristic, $specifications, $image);
                echo "<script>alert('Congratulations! you have successfully added!')</script>";
            }
           
        }
        else{
            echo "<script>alert('Please choose the correct image format!')</script>";
        }
        
        echo "<script>window.location.href= '?option=addproduct'</script>";
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Add Product</h1>
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
                <form id="quickForm" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control" name="id_category">
                                <?php
                                    $dt->select_category();
                                    while($r = $dt->fetch()){         
                                ?>
                                <option value="<?= $r['id']?>"><?= $r['name']?></option>
                               
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <input type="text" name="color" class="form-control" id="exampleInputEmail1" placeholder="Enter color" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">characteristic</label>
                            <textarea class="ckeditor"  required name="characteristic" cols="60" rows="5" id="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Specifications</label>
                            <textarea class="ckeditor"  required name="specifications" cols="60" rows="5" id="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name ="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
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