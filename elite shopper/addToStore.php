<?php
session_start();
include ("php/connection.php"); 
if(isset($_SESSION['rid'])){
  $retailer_id = $_SESSION['rid'];
  $sql="SELECT * FROM products WHERE retailers_id=? ORDER BY uploaded_on DESC"; 
  $stmt1 = $connection->prepare($sql);
  $stmt1->bind_param("i",$retailer_id);
  $stmt1->execute();
  global $result;
  $result  = $stmt1->get_result();
  }
  else{
    echo "You Are Not Registered!!";
  }
  global $imageURL , $img_name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Elite Shopper Template">
    <meta name="keywords" content="Elite Shopper, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elite Shopper | Add Item</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    
    <!-- Jquery JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    
    

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">


</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">0</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
        <a href="login.php">Login</a>
        <a href="ret-or-shopper.php">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li ><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./shop-cart.php">Shop Cart</a></li>
                                    <li><a href="./checkout.php">Checkout</a></li>
                                </ul>
                            </li>
                            <?php if(isset($_SESSION['rid'])){
    ?>
                            <li><a href="./addToStore.php">Sell Online</a></li>
                            <?php } ?>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                   <?php if(isset($_SESSION['rid']) && isset($_SESSION['name']) && $_SESSION['name']!=""){
    ?>
    <div class="header__right__auth">
        Hello <?php echo $_SESSION['name'] ;?>! :)
        </div>
        <?php } ?>
                        <div class="header__right__auth">
                            <a href="./login-page.php">Login</a>
                            <a href="./ret-or-shopper.php">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <section class="shop spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-9 col-md-9" id="#products">
  </div>
  </div>
  </div>
                    
                                    
                           
</section>
<section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div></div>
<div class="col-lg-9 col-md-9" id="#products">
              <?php 
              
                while($row = $result->fetch_assoc()){
    
                $imageURL = 'uploads/'.$row["image_url"];
                 $img_name = $row["name"];
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-6" >
            <div class="product__item" >
            <div class="product__item__pic set-bg" data-setbg= '<?php echo $imageURL; ?>'>
            <ul class="product__hover">
            <li><a href="<?php echo $imageURL; ?>" class="image-popup"><span class="arrow_expand"></span> </a></li>
                      <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                          <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                            </div>
                      <div class="product__item__text"><?php echo $img_name; ?></div>
                  </div>
                        </div>
                          </div>
                    </div>
                </div>
      </div>
    </div>
</div>
<?php } ?>
      </section>

    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
      <div class="wrapper wrapper--w680">
        <div class="card card-4">
          <div class="card-body">
            <h2 class="title">Add Item</h2>
            <form id="itemUpload" action="php/upload.php" method="POST" enctype="multipart/form-data">
              <div class="row row-space">
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">item name</label>
                    <input
                      class="input--style-4"
                      required
                      minlength="3"
                      type="text"
                      name="item_name"
                    />
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">item description</label>
                    <input
                      class="input--style-4"
                      required
                      type="text"
                      name="item_description"
                    />
                  </div>
                </div>
              </div>
              <div class="row row-space">
              <label for="img">Select image:</label>
              <input type="file" id="img" name="img" accept="image/*">  
              <div class="col-6 offset-3 text-center">
                <input
                  class="btn btn--radius-2 btn--blue"
                  value="upload"
                  type="submit"
                  id="submitButton"
                >

</input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    
    

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/displayProducts.js"></script>
</body>

</html>