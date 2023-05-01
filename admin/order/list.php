
<?php
    include"data/orders.php";
    $dt = new orders;
?>
<!-- <?php
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
    
?> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="">Order List</h1>
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
                      <th>NAME USER</th>
                      <th>DATE ORDER</th>
                      <th>TOTAL PRICE</th>
                      <th>STATUS</th> 
                      <th>ACTION</th>
                    
                  </tr>
                </thead>
               <?php
                    $stt=1;
                    $dt->select();
                    if(isset($_GET['status'])){
                      $status = $_GET['status'];
                      $dt->select_status($status);
                    }
                    while($r = $dt->fetch()){
               ?>
                <tbody>
                    <tr>
                      <td><?= $stt++?></td>
                      <td><?= $r['name_user'] ?></td>
                      <td><?= $r['date'] ?></td>
                      <td><?= number_format($r['total_price']) ?></td>
                      <td>
                       
                        <?= $r['status']==0?'<a style="color:orange; font-weight:bold">No process</a>':($r['status']==1?'<a style="color:green; font-weight:bold">On Delivery</a>':($r['status']==2?'<a style="color:blue; font-weight:bold">Delivered</a>':'<a style="color:red; font-weight:bold">Cancelled</a>'))?>
                      </td> 
                      
                      <td>ACTION</td>
                    
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