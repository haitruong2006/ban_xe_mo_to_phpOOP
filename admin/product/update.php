<?php
    include"data/product_import.php";
    $dt = new product_import
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
        
        $name = $_POST['name'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $characteristic = $_POST['characteristic'];
        $specifications = $_POST['specifications'];
        
        $path = "./image/";
        
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];

        if($image == ''){
            $image = $r['image'];
        }
        else{
            $image = $image;
            if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
                move_uploaded_file($imageTemp,$path.$image);
            }
            else{
                echo "<script>alert('Please choose the correct image format!')</script>";
            }
        }
        $dt->update($name, $color, $price, $characteristic, $specifications, $image, $id);
       
        echo "<script>alert('Congratulations! you have successfully updated!')</script>";
        
      
        echo "<script>window.location.href= '?option=updateproduct&id=$id'</script>";
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Update Product</h1>
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
                            <?php
                                
                            ?>
                            <label>category</label>
                            <select class="form-control" name="id_category" readonly="true">
                                
                                <option value="" ><?= $r['name_category']?></option>
                               
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name"  value="<?= $r['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <input type="text" name="color" class="form-control" id="exampleInputEmail1" placeholder="Enter color"  value="<?= $r['color'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" value="<?= $r['price'] ?>" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter quantity" value="<?= $r['quantity'] ?>" required readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">characteristic</label>
                            <textarea class="ckeditor"  required name="characteristic" cols="60" rows="5" id="description" required><?= $r['characteristic']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Specifications</label>
                            <textarea class="ckeditor"  required name="specifications" cols="60" rows="5" id="description" required><?= $r['specifications']?></textarea>
                        </div>
                        <div class="form-group">
                            
                            <img src="image/<?= $r['image'] ?>" width="100px">
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