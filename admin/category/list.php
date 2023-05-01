<?php
    include"data/category.php";
    $dt = new category;
?>
<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $check=$dt->check_delete($id);
    if($dt->fetch()!=''){
      echo "<script>alert('data already exists that cannot be deleted!')</script>";
    }else{
      $dt->delete($id);
      echo "<script>alert('congrats! you have successfully deleted')</script>";
      // $_SESSION['alert'] = "Chúc mừng bạn xóa thành công";
    }
    echo "<script>window.location.href=' ?option=listcategory'</script>";
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="">Category List</h1>
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
                      <th>NAME</th>
                      <th>ACTION</th>
                    
                  </tr>
                </thead>
                <?php
                    $stt=1;
                    $dt->select();
                  
                    while($r = $dt->fetch()){
                    

                ?>
                <tbody>
                  <tr>
                      <td><?= $stt++?></td>
                      <td><?= $r['name'] ?></td>
                      
                      <td>
                          <!-- 
                          <a href="?option=listcategory&id=<?= $r['id']?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">DELETE</a> -->
                          <a href="?option=updatecategory&id=<?= $r['id']?>" class="btn btn-success">UPDATE</a> || 
                          <a href="?option=listcategory&id=<?= $r['id'] ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">DELETE</a>
                      </td>
                  </tr>
                </tbody>
                <?php }?>
                
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