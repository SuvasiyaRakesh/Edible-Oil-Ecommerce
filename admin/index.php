<?php
session_start();
if (!isset($_SESSION['ADMIN_ID']) || empty($_SESSION['ADMIN_ID'])) {
    header('Location: login.php');
    exit;
}
require '../dbcon.php';

$result = $conn->query('SELECT `cid` FROM `category`');
$category = $result->num_rows;

$result = $conn->query('SELECT `pid` FROM `product`');
$product = $result->num_rows;

$result = $conn->query('SELECT `uid` FROM `user`');
$user = $result->num_rows;

$result = $conn->query('SELECT `fid` FROM `feedback`');
$feedback = $result->num_rows;

$result = $conn->query('SELECT `oid` FROM `ord`');
$ord = $result->num_rows;

$result = $conn->query('SELECT `payid` FROM `payment`');
$payment = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    $title = 'Dashboard | Admin';
    require 'include/head.php';
?>
<style>
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card .card-body {
        padding: 20px;
    }
    .card .text-xs {
        font-size: 14px;
    }
    .card .h5 {
        font-size: 24px;
        font-weight: bold;
    }
    .card .col-auto i {
        color: #4e73df;
    }
</style>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <?php 
                $stats = [
                    ['title' => 'Total Users', 'count' => $user, 'color' => 'primary', 'icon' => 'fas fa-users'],
                    ['title' => 'Total Products', 'count' => $product, 'color' => 'danger', 'icon' => 'fas fa-boxes'],
                    ['title' => 'Total Categories', 'count' => $category, 'color' => 'info', 'icon' => 'fas fa-list-alt'],
                    ['title' => 'Feedback', 'count' => $feedback, 'color' => 'warning', 'icon' => 'fas fa-comments'],
                    ['title' => 'Total Orders', 'count' => $ord, 'color' => 'success', 'icon' => 'fas fa-shopping-cart'],
                    ['title' => 'Total Payments', 'count' => $payment, 'color' => 'secondary', 'icon' => 'fas fa-credit-card']
                ];
            ?>
            
            <?php foreach ($stats as $stat): ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-<?= $stat['color'] ?> shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-<?= $stat['color'] ?> text-uppercase mb-1">
                        <?= $stat['title'] ?>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $stat['count'] ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="<?= $stat['icon'] ?> fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
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
