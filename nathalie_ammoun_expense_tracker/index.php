<?php
session_start();
include("php/connection.php");
if(
    !isset($_SESSION['id'])
    || ($_SESSION['id'] == '')
    ) {
    header("location:./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <!-- JS Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div id="login"><a href="./login.php">Login</a>/<a href="./register.php">Register</a></div>
                            <div class="header-button float-right">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/icon.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                        
                                            <div class="js-acc-btn" id="user"></div>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                            <div class="account-dropdown__footer">
                                                <a href="php/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Item</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="add_exp" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="item_name_label" >Item Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="item_name" name="item_name" placeholder="Item Name" class="form-control">
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="checkName">
</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="amount_label">Amount</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="amount" name="amount" placeholder="in USD" class="form-control">
                                                    
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="checkAmount">
</div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="date_label">Date</label>
                                                    
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input id ="date" type="date" name="date" placeholder="dd-mm-yyyy"
                                                            min="1997-01-01" max="2030-12-31">
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="checkDate">
</div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Select Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group col-offset-6">
                                            <div class="col col-lg-6 ">
                                            <div class="col col-md-12">
            
                                            <button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal"  data-target="#categoryModal">
                                    Add Category
</button>
</div>
</div>
<div class="col col-lg-6 ">
<div class="col col-lg-12">
<button type="button" class="au-btn au-btn-icon au-btn--blue float-right" data-toggle="modal"  data-target="#editCatModal">
                                    Edit Categories
</button></div></div>
</div>
                                            <button type="button" class="au-btn au-btn-icon au-btn--blue" id="add">
                                            <i class="zmdi zmdi-plus"></i> Add Item
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            <div class="col-lg-6 ">
                                <div class="au-card chart-percent-card " >
                                    <div class="au-card-inner">
                                        <div class="row d-flex align-items-center">
                                        <h3 class="title-2">Category Amount Chart</h3></div>

                                            <div class="col-xl-6 ">
                                                <div id="chart_wrap">
    <div id="pie-chart"></div>
</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>    
                        
                        <div class="row " >
                            <div class="col-lg-9 d-flex align-items-center">
                                <h2 class="title-1 m-b-25">Expenses By Items</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning" id="expense-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th class="text-right">Date</th>
                                                <th class="text-right">Category</th>
                                                <th class="text-right">Edit</th>
                                                <th class="text-right">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <!-- Modal For Adding Category-->
 
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- <form id="catForm"> -->
                            <div class="modal-body">
                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="category">Add Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cat_name" name="category" placeholder="Category" class="form-control">
                                                </div>
                                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="addCat" class="btn btn-primary" data-dismiss="modal">Add Category</button>
                            </div>

                            </div>

                        </div>
                        </div>
                        <!-- Modal For Editing Categories-->
 
<div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning" id="cat_table">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th class="text-right">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_cat">
                                        </tbody>
                                    </table>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>

                            </div>

                        </div>
                        </div>
                        <div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="category">Edit Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cat_edit" name="category" placeholder="Category" class="form-control">
                                                </div>
                                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" id="categ" class="btn btn-primary" data-dismiss="modal">Done</button>
                            </div>

                            </div>

                        </div>
                        </div>
                        <!-- Modal For Editing Expense-->
<div class="modal fade" id="editingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="item_name_label" >Item Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="edit_i_id" name="item_name" placeholder="Item Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" name="amount_label">Amount</label>
                                                   
                                                </div>
                                                
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="edit_amount" name="amount" placeholder="in USD" class="form-control">
                                                    <small class="help-block form-text">Please Enter A Numeric Value</small>
                                                                         
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Select Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select2" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" id="edit_item" class="btn btn-primary" data-dismiss="modal">Done</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/fetchApi.js"></script>
    

</body>

</html>
<!-- end document-->
