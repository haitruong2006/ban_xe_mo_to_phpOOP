
<?php
    include"data/user.php";
    $dt = new user;
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
            // $_SESSION['alert'] = "Chúc mừng bạn xóa thành công";
        }
        echo "<script>window.location.href= '?option=listuser'</script>";
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="">User List</h1>
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
                      <th>EMAIL</th>
                      <th>FULLNAME</th>
                      <th>ADDRESS</th>
                      <th>PHONE</th>
                      <th>BIRTHDAY</th>
                      <th>ACTION</th>
                    
                  </tr>
                </thead>
                <?php
                    $dt->select();
                    $stt=1;
                    while($r = $dt->fetch()){
                ?>
                <tbody>
                  <tr>
                        <td><?= $stt++ ?></td>
                        <td><?= $r['email']?></td>
                        <td><?= $r['fullname']?></td>
                        <td><?= $r['address']?></td>
                        <td><?= $r['phone']?></td>
                        <td><?= $r['birthday']?></td>
                        <td>
                            <a href="?option=updateuser&id=<?=$r['id']?>" class="btn btn-success">Update</a> ||
                            <a href="?option=listuser&id=<?=$r['id']?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">Delete</a>
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