<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>View Certificate</title>
    <link rel="icon" type="image/png" href="https://cdn.pixabay.com/photo/2016/12/26/09/40/bride-1931722_1280.jpg"/>
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
  </head>

  <body>
 <?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>
<?php
// Path to the PDF template with form fields
$pdfTemplatePath = '../mc.pdf';

                               $vid=$_GET['viewid'];

$sql="SELECT tblregistration.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblregistration join  tbluser on tblregistration.UserID=tbluser.ID where tblregistration.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)

foreach($results as $row)
{               
// Define the data you want to insert into the fields
$certificateData = array(
    'husband_name' => $row->HusbandName,
    'wife_name' => $row->WifeName,
    'w_name1' => $row->WitnessAddressFirst,
    'w_name2' => $row->WitnessNamesec,
    'w_name3' => $row->WitnessNamethird,
   
    'date' => $row->UpdationDate,
    // Add more data fields here
);
}

// Generate a filename based on certificate data
$filename = $certificateData['date'] . '_Certificate.pdf';
$outputFilePath = `` . $filename;

// Construct the pdftk command
$pdftkCommand = "pdftk $pdfTemplatePath fill_form - output $outputFilePath ";

// Add data for each field to the pdftk command
foreach ($certificateData as $field => $value) {
    $pdftkCommand .= "FDF:$field=$value ";
}

// Execute the pdftk command
exec($pdftkCommand);

// Check if the PDF generation was successful
if (file_exists($outputFilePath)) {
    // Initiate the PDF download
    header('Content-type: application/pdf');
    header("Content-Disposition: attachment; filename=$filename");
    readfile($outputFilePath);
    exit; // Important to exit after initiating the download
} else {
    echo "Failed to generate PDF certificate.";
}
?>

 

 
      
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })
    </script>
  </body>
</html>
<?php }  ?>