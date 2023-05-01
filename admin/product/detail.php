
<?php
    include"data/product.php";
    $dt = new product;
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dt->select_detail($id);
        $r = $dt->fetch();
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="">Product Detail (<?= $r['name'] ?>)</h1>
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

                  <tr>
                      <th>Category Name</th>
                      <td><?= $r['name_category'] ?></td>
                  </tr>
                  <tr>
                      <th>Name</th>
                      <td><?= $r['name'] ?></td>
                  </tr>
                  <tr>
                      <th>Color</th>
                      <td><?= $r['color']?></td>
                  </tr>
                  <tr>
                      <th>Price</th>
                      <td><?= number_format($r['price'])?></td>
                  </tr>
                  <tr>
                      <th>Import</th>
                      <td><?= $r['quantity']?></td>
                  </tr>
                  <tr>
                      <th>Sell Number</th>
                      <td><?= $r['sell_number']?></td>
                  </tr>
                 
                  <tr>
                      <th>In Stock</th>
                      <td><?= $r['quantity'] - $r['sell_number']?></td>
                  </tr>
                  <tr>
                      <th>Status</th>
                      <td><?= $r['quantity'] - $r['sell_number'] > 0?'<a style="font-weight:bold">Còn Hàng</a>':'<a style="font-weight:bold">Hết Hàng</a>' ?></td>
                  </tr>
                  <tr>
                      <th>Characteristic</th>
                      <td><?= $r['characteristic']?></td>
                  </tr>
                  <tr>
                      <th>Specificationsr</th>
                      <td><?= $r['specifications']?></td>
                  </tr>
                  <tr>
                      <th>Image</th>
                      <td>
                        <img src="image/<?= $r['image']?>" alt="" width="100px">
                      </td>
                  </tr>
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