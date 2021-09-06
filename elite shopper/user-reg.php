<?php
session_start();
include("php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Colorlib Templates" />
    <meta name="author" content="Colorlib" />
    <meta name="keywords" content="Colorlib Templates" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Title Page-->
    <title>Elite Shopper | Register</title>

    <!-- Icons font CSS-->
    <link
      href="vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Font special for pages-->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link
      href="vendor/datepicker/daterangepicker.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all" />
  </head>

  <body>
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
                            <li><a href="./index.php">Home</a></li>
                          
                            <li class=""><a href="./shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                
                                    <li><a href="./shop-cart.php">Shop Cart</a></li>
                                   
                                </ul>
                            </li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
      <div class="wrapper wrapper--w680">
        <div class="card card-4">
          <div class="card-body">
            <h2 class="title">Register</h2>
            <form method="POST" id="signupForm" action="php/user-signup.php" method="POST" >
              <div class="row row-space">
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">first name</label>
                    <input
                      class="input--style-4"
                      required
                      minlength="3"
                      type="text"
                      name="first_name"
                    />
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">last name</label>
                    <input
                      class="input--style-4"
                      required
                      minlength="3"
                      type="text"
                      name="last_name"
                    />
                  </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">Birthday</label>
                    <div class="input-group-icon">
                      <input
                        class="input--style-4 js-datepicker"
                        required
                        type="text"
                        id="birthday"
                        name="birthday"
                      />
                      <i
                        class="
                          zmdi zmdi-calendar-note
                          input-icon
                          js-btn-calendar
                        "
                      ></i>
                    </div>
                    <div class="alert alert-danger" role="alert" id="dob-a">
                        </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">Gender</label>
                    <div class="p-t-10">
                      <label class="radio-container m-r-45"
                        >Male
                        <input type="radio" checked="checked" name="gender" value="0"/>
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >Female
                        <input type="radio" name="gender" value="1"/>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-6">
                  <div class="input-group">

                     <?php
                      if (!empty($_SESSION["flash"])){
                      $x = $_SESSION["flash"];
                    ?>
                      <label class="label">
                      <?php echo $x;} else{echo "Email";} ?>   
                      </label>
                      
                    <input
                      class="input--style-4"
                      required
                      id="email"
                      type="email"
                      name="email"
                    />
                    <div class="alert alert-danger" role="alert" id="email-a">
                        </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">Phone Number</label>
                    <input
                      class="input--style-4"
                      required
                      id="phone"
                      type="text"
                      name="phone"
                    />
                  </div>
                  <div class="alert alert-danger" role="alert" id="phone-a">
                        </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">Password</label>
                    <input
                      class="input--style-4"
                      required
                      type="password"
                      name="password"
                      id="password"
                    />
                  </div>
                  
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <label class="label">Confirm password</label>
                    <input
                      class="input--style-4"
                      required
                      type="password"
                      name="confirmPassword"
                      id="confirmPassword"
                    />
                  </div>
                  <div class="alert alert-danger" role="alert" id="pass-a">
                        </div>
                </div>
              </div>
              <div class="input-group">
                <label class="label col-2">City</label>
                <div class="rs-select2 js-select-simple select--no-search">
                  <select name="city" required>
                    <option disabled selected value>Choose City</option>
                    <option>Nabatieh</option>
                    <option>Beirut</option>
                    <option>Jbeil</option>
                  </select>
                  <div class="select-dropdown"></div>
                </div>
              </div>
              <div class="col-6 offset-3 text-center">
                <button
                  class="btn btn--radius-2 btn--blue"
                  type="submit"
                  id="submitButton"
                >
                  Submit
                </button>
                <div class="text-center p-t-15">
						<span class="txt1">
							Already have an account?
						</span>
						<a class="txt2" href="./login-page.php">
							Login
						</a>
					</div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/user-js.js"></script>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->
