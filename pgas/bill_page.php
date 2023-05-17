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
    <title>Your Bill</title>

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
    <section id="bill">
          <?php
          $bookid = intval($_GET['bkid']);
          $ret = mysqli_query($con, "select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
          $cnt = 1;
          while ($row = mysqli_fetch_array($ret)) {
          ?>
            
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

  <th style="color: black; font-size: 20px">Total</th>
  <th style="color: black; font-size: 20px"><?=$row['RPmonth'] + $adf_total?> /-</th>
  </tr>

    </table>
  </div>
</div>
</div>
<!-- Bill END -->
              
    </section>

  <?php } ?>

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

    $(document).ready(()=>{
        window.print()
        // printDocument("bill")
    });


    function printDocument(documentId) {
    var doc = document.getElementById(documentId);

    //Wait until PDF is ready to print    
    if (typeof doc.print === 'undefined') {    
        setTimeout(function(){printDocument(documentId);}, 1000);
    } else {
        doc.print();
    }
}
</script>