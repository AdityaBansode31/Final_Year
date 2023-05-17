<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$rent = 0;
if (isset($_POST['submit'])) {
  $pid = $_GET['pid'];
  $userid = $_SESSION['pgasuid'];
  $chkin = $_POST['chkin'];
  $msg = $_POST['message'];
  $booknumber = mt_rand(100000000, 999999999);

  $query = mysqli_query($con, "insert into tblbookpg(Userid,Pgid,CheckinDate,UserMsg,BookingNumber) values('$userid','$pid','$chkin','$msg','$booknumber') ");
 
  if ($query) {

    $book_id = mysqli_insert_id($con);;
    // print_r($_POST);
        // Add Facilities
        foreach($facilities as $f){
            if(!isset($_POST["adf_".$f])){
              continue;
            }
            $price = $_POST["adf_".$f."_price"];
            $query = "INSERT INTO `tbluserfacilities` (`id`, `user_id`, `book_id`, `name`, `price`) VALUES (NULL, '$userid', '$book_id', '$f', '$price');";
            $query=mysqli_query($con,$query);

    }


    echo "<script>alert('Booking detail has been sent to owner.');</script>";
    echo "<script>window.location.href='my-bookings.php'</script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

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
              PG Details
            </a>

          </p>
          <h1 class="text-white">
            PG Details
          </h1>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner Area -->

  <!--  Blog Area -->

  <form class="row contact_form" action="" method="post" id="">
  <section class="blog_area single-post-area p_120">
    <div class="container">
      <div class="row mt-80">
        <?php
        $cid = $_GET['pid'];
        $ret = mysqli_query($con, "select * from tblpg where ID='$cid'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
          $rent = $row['RPmonth'];
        ?>
          <div class="col-lg-12 posts-list">
            <div class="single-post row">
              <div class="col-lg-12">
                <div class="feature-img" align="center">
                  <img src="owner/roomimages/<?php echo $row['Image']; ?>" height='350' width="1000" style="border:#000 solid 2px;">
                </div>
                <h2 align="center" style="margin-top:2%"><?php echo $row['PGTitle']; ?>'s Details</h2>
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
                    <td style="color: red; font-size: 20px" colspan="2">Meals which offer by PG</td>
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
                    <td style="color: red; font-size: 20px" colspan="2">Facilities</td>
                  </tr>
                  <tr>
                    <th>Electricity</th>
                    <td>
                      <div class="form-check">
                       
                        <label class="form-check-label" for="flexCheckIndeterminate">
                          <?php echo $row['Electricity']; ?>
                        </label>
                      </div>
                    </td>

                  </tr>
                  <tr>
                    <th>Parking</th>
                    <td>
                      <div class="form-check">
                        
                        <label class="form-check-label" for="flexCheckIndeterminate">
                          <?php echo $row['Parking']; ?>
                        </label>
                      </div>

                    </td>
                  </tr>
                  <!-- <tr>
                    <th>Refregerator</th>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                          <?php echo $row['Refregerator']; ?>
                        </label>
                      </div>

                    </td>
                  </tr>
                  <tr>
                    <th>Full Furnished</th>
                    <td>
                      
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                          <?php echo $row['Furnished']; ?>
                        </label>
                    </td>
              </div>
              </tr>
              <tr>
                <th>AC</th>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      <?php echo $row['AC']; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <th>Balcony</th>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      <?php echo $row['Balcony']; ?>
                    </label>
                  </div>

                </td>
              </tr> -->
              <tr>
                <th>Table/Study Lamp</th>
                <td>
                  <div class="form-check">
                   
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      <?php echo $row['StudyTable']; ?>
                    </label>
                  </div>

                </td>
              </tr>

              <tr>
                <th>Security</th>
                <td>
                  <div class="form-check">
                    
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      <?php echo $row['Security']; ?>
                    </label>
                  </div>

                </td>
              </tr>
              </table>

              <!-- Additional Facilities START -->
              <table border="1" class="table table-bordered mg-b-0">
                <tr align="center">
                  <td style="color: red; font-size: 20px" colspan="2">Select Additional services</td>
                </tr>
                   
                    <?php
                       $pg_id = $_GET['pid'];
                     
                       foreach($facilities as $facility){  
                           // Fetch Deatials
                           $query = "SELECT * FROM tblpgfacilities WHERE pg_id = '$pg_id' and name = '$facility' AND status = 1 ; ";
                          //  echo $query;
                           $result = mysqli_query($con, $query);

                           $status = 0;
                           $price = 0;
                          
                           if(mysqli_num_rows($result)>0){ 
                               $rowX = mysqli_fetch_assoc($result);   
                               $status = $rowX['status'];
                               $price = $rowX['price'];
                           }
                    ?>
                        <tr>
                          <th><?=$facility?></th>
                          <td>Rs <?=$price?> /- </td>
                          <td>
                          <div class="form-check">
                        <input type="hidden" name="adf_<?=$facility?>_price" value="<?=$price?>" />
                          <input class="form-check-input" type="checkbox" value="Yes" name = "adf_<?=$facility?>" 
                          id="adf_<?=$facility?>"
                          onchange="getTotal('adf_<?=$facility?>',<?=$price?>)"
                          >
                            <label class="form-check-label" for="flexCheckIndeterminate">
                              <?php echo $row['Laundry']; ?>
                            </label>
                          </div>

                        </td>
                        </tr>
                    <?php }?>
                    </table>
                     <!-- Additional Facilities END -->

              

              

             


            </div>
          </div>
          <?php if ($_SESSION['pgasuid'] == "") { ?>
            <a href="signin.php" class="btn primary-btn" id="book-now">Book Now ( Rs <?=$rent?> /-)</a>
          <?php } else { ?>
            <form method="post">



      </div>

      <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span id="book-now">Book Now ( Rs <?=$rent?> /-)</span>&nbsp;<span class="lnr lnr-arrow-right"></span></button>
      </div>
      

    <?php } ?>

    </div>
    </div>
  </section>
  <!--  Blog Area -->
  <!-- Button to Open the Modal -->

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        
            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                    echo $msg;
                                                                  }  ?></p>
            <div class="col-md-12">


              <div class="form-group">
                <p style="font-size: 18px;color: black">Check In Date: <input type="date" class="form-control" id="chkin" name="chkin" required="true"></p>
              </div>



              <div class="form-group">
                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required="true"></textarea>
              </div>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" value="submit" class="btn primary-btn" name="submit">Submit</button>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  </form>
  <!-- start footer Area -->
  <div style="margin-top:1%">
    <?php include_once('includes/footer.php'); ?>
  </div>
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


<script>
var bookTotal = <?=$rent?>;

function getTotal(id,price){
  if ($('#'+id).prop("checked")) {
    bookTotal+= price;
    }else{
      bookTotal -= price;
    }
    $('#book-now').html(`Book Now ( Rs ${bookTotal} /-)`)
}
</script>