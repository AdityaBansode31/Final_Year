<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid'] == 0)) {
  header('location:logout.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="zxx" class="no-js">

  <head>

    <!-- Site Title -->
    <title>PG Accomodation details Details</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">=
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>

    <!-- Start Header Area -->
    <?php include_once('includes/header.php'); ?>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row d-flex text-center align-items-center justify-content-center">
          <div class="about-content col-lg-12">
            <p class="text-white link-nav"><a href="index.php">Home </a>
              <span class="lnr lnr-arrow-right"></span>
              <a href="particularpg-details.php">
                My Booking
              </a>

            </p>
            <h1 class="text-white">
              Booking Details
            </h1>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!--  Blog Area -->
    <section class="blog_area single-post-area p_120">
      <div class="container">
        <div class="row mt-80">
          <?php
          $bookid = intval($_GET['bkid']);
          $ret = mysqli_query($con, "select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
          $cnt = 1;
          while ($row = mysqli_fetch_array($ret)) {

          ?>
            <div class="col-lg-12 posts-list">
              <div class="single-post row">
                <div class="col-lg-12">
                  <div class="feature-img" align="center">
                    <img src="owner/roomimages/<?php echo $row['Image']; ?>" alt="" height='350' width="1000" style="border:#000 solid 2px;">
                  </div>
                  <h2 align="center" style="padding-top:2%"><?php echo $row['PGTitle']; ?>'s PG Booking Details</h2>
                </div>
                <div class="col-lg-12 col-md-9 blog_details">
                  <table border="1" class="table table-bordered mg-b-0">

                    <tr>
                      <th>Booking Id</th>
                      <td><?php echo $row['BookingNumber']; ?></td>
                      <th>Booking Date</th>
                      <td><?php echo $row['BookingDate']; ?></td>
                    </tr>
                    <tr>
                      <th>Check-in Date</th>
                      <td><?php echo $row['CheckinDate']; ?></td>
                      <th>Status</th>
                      <td><?php if ($row['Status'] == "") {
                            echo "Not Confiremed Yet";
                          } else {
                            echo $row['Status'];
                          } ?></td>
                    </tr>
                    <tr>
                      <th>User Remark</th>
                      <td colspan="3"><?php echo $row['UserMsg']; ?></td>

                    </tr>
                    <tr>
                      <th>Owner Remark</th>
                      <td colspan="3"><?php echo $row['Remark']; ?></td>
                    </tr>
                    <tr>
                      <th>Owner Remark Date</th>
                      <td colspan="3"><?php echo $row['RemDate']; ?></td>
                    </tr>
                  </table>
                  <h2 align="center" style="color:blue">PG Details</h2>
                </div>

                <div class="col-lg-6 col-md-9 blog_details">
                  <table border="1" class="table table-bordered mg-b-0">

                    <tr>
                      <th>State</th>
                      <td><?php echo $row['StateName']; ?></td>
                    </tr>
                    <tr>
                      <th>City</th>
                      <td><?php echo $row['CityName']; ?></td>
                    </tr>
                    <tr>
                      <th>Rent Per Month</th>
                      <td><?php echo $row['RPmonth']; ?></td>
                    </tr>
                    <tr>
                      <th>Number of Rooms</th>
                      <td><?php echo $row['norooms']; ?></td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td><?php echo $row['Address']; ?></td>
                    </tr>
                  </table>

                  <table border="1" class="table table-bordered mg-b-0">
                    <tr align="center">
                      <td style="color: red; font-size: 25px" colspan="2">Meals which offer by PG</td>
                    </tr>
                    <tr>
                      <th>Breakfast</th>
                      <td><?php echo $row['MealsBreakfast']; ?></td>
                    </tr>
                    <tr>
                      <th>Lunch</th>
                      <td><?php echo $row['MealLunch']; ?></td>
                    </tr>
                    <tr>
                      <th>Dinner</th>
                      <td><?php echo $row['MealDinner']; ?></td>
                    </tr>
                  </table>



                </div>

                <div class="col-lg-6 col-md-9 blog_details">
                  <table border="1" class="table table-bordered mg-b-0">
                    <tr align="center">
                      <td style="color: red; font-size: 25px" colspan="2">Facilities</td>
                    </tr>
                    <tr>
                      <th>Electricity</th>
                      <td><?php echo $row['Electricity']; ?></td>
                    </tr>
                    <tr>
                      <th>Parking</th>
                      <td><?php echo $row['Parking']; ?></td>
                    </tr>
                    <!-- <tr>
    <th>Refregerator</th>
    <td><?php echo $row['Refregerator']; ?></td>
  </tr> 
  <tr>
    <th>Full Furnished</th>
    <td><?php echo $row['Furnished']; ?></td>
  </tr> 
  <tr>
    <th>AC</th>
    <td><?php echo $row['AC']; ?></td>
  </tr> 
  <tr>
    <th>Balcony</th>
    <td><?php echo $row['Balcony']; ?></td>
  </tr> 
  <tr> -->
                    <th>Table/Study Lamp</th>
                    <td><?php echo $row['StudyTable']; ?></td>
                    </tr>
                    <!-- <tr>
    <th>Laundry</th>
    <td><?php echo $row['Laundry']; ?></td>
  </tr>
  <tr> -->
                    <th>Security</th>
                    <td><?php echo $row['Security']; ?></td>
                    </tr>
                  </table>


                  <!-- Additional Facilities START -->
                  <table border="1" class="table table-bordered mg-b-0">
                    <tr align="center">
                      <td style="color: red; font-size: 20px" colspan="2">Additional services</td>
                    </tr>

                    <?php
                    $book_id = $_GET['bkid'];
                    $adf_total = 0;

                    $query = "SELECT * FROM tbluserfacilities WHERE book_id = '$book_id' ; ";
                    $result = mysqli_query($con, $query);

                    while ($rowX = mysqli_fetch_assoc($result)) {
                      $facility = $rowX['name'];
                      $price = $rowX['price'];
                      $adf_total += $price;

                    ?>
                      <tr>
                        <th><?= $facility ?></th>

                        <td>Rs <?= $price ?> /-</td>


                      </tr>
                    <?php } ?>
                  </table>
                  <!-- Additional Facilities END -->















                </div>

                <!-- Bill Start -->
                <div class="col-lg-12 col-md-12 blog_details">

                            <div class="row" style="justify-content: center;">
                              <div class="col-md-10">
                                <table border="1" class="table table-bordered mg-b-0">
                                  <tr align="center">
                                    <td style="color: red; font-size: 20px" colspan="2">Bill</td>
                                  </tr>

                                  <tr>
                                    <th>Monthly Rent</th>
                                    <td>Rs <?= $row['RPmonth'] ?> /-</td>
                                  </tr>
                                  <!-- Meals -->
                                  <!-- <tr>
                                    <td>Breakfast</td>
                                    <td><?php echo $row['MealsBreakfast']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Lunch</td>
                                    <td><?php echo $row['MealLunch']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Dinner</td>
                                    <td><?php echo $row['MealDinner']; ?></td>
                                  </tr> -->
                                  <!-- Facilties -->
                                  <tr>
                                <td>Electricity</td>
                                <td><?php echo $row['Electricity']; ?></td>
                              </tr>
                              <tr>
                                <td>Parking</td>
                                <td><?php echo $row['Parking']; ?></td>
                              </tr>
                              <!-- <tr>
              <td>Refregerator</td>
              <td><?php echo $row['Refregerator']; ?></td>
            </tr> 
            <tr>
              <td>Full Furnished</td>
              <td><?php echo $row['Furnished']; ?></td>
            </tr> 
            <tr>
              <td>AC</td>
              <td><?php echo $row['AC']; ?></td>
            </tr> 
            <tr>
              <td>Balcony</td>
              <td><?php echo $row['Balcony']; ?></td>
            </tr> 
            <tr> -->
                              <td>Table/Study Lamp</td>
                              <td><?php echo $row['StudyTable']; ?></td>
                              </tr>
                              <!-- <tr>
              <td>Laundry</td>
              <td><?php echo $row['Laundry']; ?></td>
            </tr>
            <tr> -->
                              <td>Security</td>
                              <td><?php echo $row['Security']; ?></td>
                              </tr>
                              <!-- Additional  -->
                                  <tr>
                                    <th colspan="2">Additional Services Selected</th>
                                  </tr>

                                  <?php
                              $book_id = $_GET['bkid'];
                              $adf_total = 0;

                              $query = "SELECT * FROM tbluserfacilities WHERE book_id = '$book_id' ; ";
                              $result = mysqli_query($con, $query);

                              while ($rowX = mysqli_fetch_assoc($result)) {
                                $facility = $rowX['name'];
                                $price = $rowX['price'];
                                $adf_total += $price;
                                if($facility==="Mess"){
                                  $meals = [];

                                  if($row['MealsBreakfast']=="Yes")
                                    array_push($meals,"Breakfast ");
                                  
                                  if($row['MealLunch']=="Yes")
                                    array_push($meals,"Lunch ");

                                  if($row['MealDinner']=="Yes")
                                    array_push($meals,"Dinner ");

                                  $meals = "( ".implode(",",$meals)." )";
                                  

                                
                                ?>

                                <tr>
                                  <td><?= $facility ?> <?=$meals?></td>
                                  <td>Rs <?= $price ?> /-</td>
                                </tr>

                              <?php  }else{

                              ?>
                                <tr>
                                  <td><?= $facility ?></td>
                                  <td>Rs <?= $price ?> /-</td>
                                </tr>

                              <?php } } ?>


                              <tr style="    background: #2196F3;
              color: white;">

                              <th>Total</th>
                              <th>Rs <?=$row['RPmonth'] + $adf_total?> /-</th>
                              </tr>

                                </table>
                              </div>
                            </div>
                </div>
                <!-- Bill END -->

               <div class="col-md-12 row" style="justify-content: center;">
               <div class="col-4" style="text-align: center;">
                  <a href="bill_page.php?bkid=<?=$_GET["bkid"]?>" class="btn btn-primary mb-4">Print</a>
                </div>
               </div>
              </div>


            </div>
    </section>
  <?php } ?>
  <!--  Blog Area -->

  <!-- start footer Area -->
  <?php include_once('includes/footer.php'); ?>
  <!-- End footer Area -->

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/ion.rangeSlider.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  </body>

  </html>
<?php } ?>