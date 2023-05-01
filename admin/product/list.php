
<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dt->check_delete($id);
        if($dt->fetch()!=''){
          echo "<script>alert('data already exists that cannot be deleted!')</script>";
        }else{
          $dt->delete($id);
          echo "<script>alert('congrats! you have successfully deleted')</script>";
        }
        echo "<script>window.location.href= '?option=listproduct'</script>";
    }
    
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="">Product List</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>STT</th>
                      <th>CATEGORY</th>
                      <th>NAME</th>
                      <th>COLOR</th>
                      <th>PRICE</th> 
                      <th>SELL NUMBER</th> 
                    
                      <th>IMAGE</th>
                      <th>DATE IMPORT</th>
                      <th>ACTION</th>
                    
                  </tr>
                </thead>
                <?php
                    $dt->select();
                    if(isset($_GET['id_category'])){
                      $id_category = $_GET['id_category'];
                      $dt->select_type($id_category);

                    }
                    if(isset($_GET['month'])){
                      $month = $_GET['month'];
                      $dt->select_month($month);
                      // echo "<script>alert('$month')</script>";

                    }
                    if(isset($_GET['month']) && isset($_GET['id_category']) ){
                        $id_category = $_GET['id_category'];
                        $month = $_GET['month'];
                        $dt->select_month_category($id_category, $month);
                        //echo "<script>alert('$id_category, $month')</script>";
                    }
        
                    $stt=1;
                    while($r = $dt->fetch()){
                ?>
                <tbody>
                    <tr>
                      <td><?= $stt++?></td>
                      <td><?= $r['name_category'] ?></td>
                      <td><?= $r['name']?></td>
                      <td><?= $r['color']?></td>
                      <td><?= number_format($r['price'])?></td>
                      <td><?= $r['sell_number']?></td>
                      
                      <td>
                        <img src="image/<?= $r['image']?>" alt="" width="100px">  
                      </td>
                      <td><?= $r['date']?></td>
                      <td>
                        <a href="?option=productdetail&id=<?= $r['id']?>" class="btn btn-primary">DETAIL</a> ||
                        <a href="?option=updateproduct&id=<?= $r['id']?>" class="btn btn-success" style="display: <?php if(isset($_GET['month'])) echo 'none' ?>">UPDATE</a> ||
                        <a href="?option=listproduct&id=<?= $r['id'] ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')" style="display: <?php if(isset($_GET['month'])) echo 'none' ?>">DELETE</a>
                      </td>
                    
                    </tr>
                </tbody>
              <?php  }?>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>