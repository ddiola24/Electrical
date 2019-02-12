<?php session_start();  
print_r($_SESSION['role']);
if( !isset($_SESSION['username']) && !isset($_SESSION['password']) && $_SESSION['role'] != 'admin'){
  header("location: ../index.php");
} 
include "../controllers/transactionFunction.php"; 
$db = new userModel();
$data =$db->getuser($_SESSION['username']);
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 
    <title>| PRODUCTS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- FAVICON-->
    <link rel="icon" href="..vendors/img/favicon.png">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="a_home.php" class="site_title"><img src="../vendors/img/favicon.png" width="50px" height="50px">   Lend Web!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Ayah</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include "structure/sidemenu.php";
            include "structure/topnav.php"; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Products </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                  <!-- button -->
                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> Add Product </button>
                          <!-- Add Product -->
                          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD PRODUCT</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate>
                                  <label for="prodname">Product Name * </label>
                                  <input type="text" id="prodname" class="form-control" name="prodname" required />

                                  <label for="prodcat">Product Category * </label>
                                  <input type="text" id="prodcat" class="form-control" name="prodcat" data-parsley-trigger="change" required />

                                  <label for="qty">Quantity * </label>
                                  <input type="number" id="qty" class="form-control" name="qty" data-parsley-trigger="change" required />

                                  <label for="price">Price * </label>
                                  <input type="number" id="price" class="form-control" name="price" data-parsley-trigger="change" required />

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                              </div>
                                </form>
                                  <!-- form -->
                              </div>
                            </div>
                          </div>
                        </div>
                          <!-- add product -->



                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg2"> Add Category </button>
                        <!-- Add Product -->
                          <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD CATEGORY</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate>
                                  <label for="catname">Category Name * </label>
                                  <input type="text" id="catname" class="form-control" name="catname" required />

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                              </div>
                                </form>
                                  <!-- form -->
                              </div>
                            </div>
                          </div>
                        </div>
                          <!-- add product -->

                      </div>
                    </div>
                  <!-- button -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start product list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Product Code</th>
                          <th>Category</th>
                          <th>Supplier</th>
                          <th style="width: 25%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> Circuit Breaker </td>
                          <td> ###### </td>
                          <td> Circuits </td>
                          <td> Wang Corp. </td>
                          <td>
                            <a href="#" class="btn btn-primary"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info"><i class="fa fa-pencil"></i> Update </a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end product list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
