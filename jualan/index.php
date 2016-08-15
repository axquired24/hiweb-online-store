<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Jualan Batik Alfatih24</title>
  <link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css" />
</head>
<style>
  body {
    margin-bottom: 60px;
  }

  .footer {
    font-weight: bold;
    position: fixed;
    left: 50%;
    bottom: 0;
    margin-bottom: 20px;
    padding: 5px;
    border-radius: 5px;
    background-color: #F1F0F0;
  }
</style>
<body>
  <div class="container">
    <div class="row">
      <h2 class="page-header">Jualan Batik
        <div class="col-lg-6 pull-right">
          <form action="./?ur=konten/hasil_cari" method="post">
            <div class="input-group">
              <input name="barang_cari" type="text" class="form-control" placeholder="Cari produk disini" required>
              <span class="input-group-btn">
                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp; Cari</button>
              </span>
            </div><!-- /input-group -->
            </form>
          </div><!-- /.col-lg-6 -->      
      </h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php
          error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
          include "koneksi.php";      
          include "navmenu.php";
         // Buat Menu 
        ?>      
      </div>
      <div class="col-md-8">
        <?php          
           // Buat Konten
          // $uriget = decode($_SERVER['REQUEST_URI']);        
          $file = $_GET[ur];
          if(! isset($file))
          {
            include "konten/home.php";
          }
          else          
          {
            include $file.".php";
          }
        ?>
      </div>
    </div>
  </div>

  <div class="footer"> &copy; <?php echo date('Y'); ?> - Jualan Batik Alfatih24</div>
</body>
</html>
