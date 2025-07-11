<?php
session_start();
if (!isset($_SESSION['ADMIN_ID']) || empty($_SESSION['ADMIN_ID'])) {
    header('Location: login.php');
    exit;
}
require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    $title = 'Add Product | Admin';
    require 'include/head.php';
?>
<link rel="icon" type="image/png" href="APFavicon.png">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php
    require 'include/sidebar.php';
?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
<?php
    require 'include/topbar.php';
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12 mb-4">
                <form action="include/save-product.php" method="post" enctype="multipart/form-data">
                    <div class="form-group m-t-40">
                        <?php
                        if (!isset($_SESSION['msg']) || $_SESSION['msg'] == '') {
                        } else {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" id="price" name="price" type="number" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input class="form-control" id="discount" name="discount" type="number" value="0" placeholder="Product Discount">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input class="form-control" id="weight" name="weight" type="text" placeholder="Product Weight">
                    </div>
                    <div class="form-group">
                        <label for="pic">Image</label>
                        <input class="form-control" id="pic" name="pic" type="file" placeholder="Product Image">
                    </div>
                    <div class="form-group">
                        <label for="cid">Select Category</label>
                        <select class="form-control" id="cid" name="cid">
                        	<?php
                            $result = $conn->query('SELECT * FROM `category`');
                            if ($result->num_rows) {
                                while ($row = $result->fetch_array()) {
                                    echo '<option value="'.$row['cid'].'">'.ucwords($row['name']).'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                    	<button class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; AP Mani & Son's</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php
    require 'include/javascript.php';
?>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
