<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']) == 0) {
    header('location:logout.php');
} else {
    $vid = $_GET['viewid'];
    $sql = "SELECT tblregistration.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address FROM tblregistration JOIN tbluser ON tblregistration.UserID=tbluser.ID WHERE tblregistration.ID=:vid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':vid', $vid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        $row = $results[0]; // Assuming you're fetching only one record

        // Define the data you want to insert into the fields
        $certificateData = array(
            'Husband_name' => $row->HusbandName,
            'wife_name' => $row->WifeName,
            'w_name1' => $row->WitnessAddressFirst,
            'w_name2' => $row->WitnessNamesec,
            'w_name3' => $row->WitnessNamethird,
            'date' => $row->UpdationDate,
            // Add more data fields here
        );

        // Path to the PDF template with form fields
        $pdfTemplatePath = 'mc.pdf';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Generate a filename based on certificate data
        $randomString = bin2hex(random_bytes(8)); // Generates a random 16-character string
        $outputFilename = $randomString . '_Certificate.pdf';
        // Set the path to the user's Downloads folder and use the random string as the filename
        $outputFilePath = 'C:/Users/Bishwas/Downloads/' . $outputFilename;
        // Construct the pdftk command
        $pdftkCommand = "pdftk $pdfTemplatePath fill_form - output $outputFilePath";
        foreach ($certificateData as $field => $value) {
          $escapedValue = escapeshellarg($value);
          $pdftkCommand .= " $field=$escapedValue";
      }
                
       // Execute the pdftk command
       exec($pdftkCommand, $output, $returnVar);

       echo "pdftk command: $pdftkCommand<br>";
        echo "Output: " . implode("<br>", $output) . "<br>";
        echo "Return Code: $returnVar<br>";
       // Check if the PDF generation was successful
       if ($returnVar === 0 && file_exists($outputFilePath)) {
           // Initiate the PDF download
           header('Content-type: application/pdf');
           header("Content-Disposition: attachment; filename=$outputFilename");
           readfile($outputFilePath);
           exit; // Important to exit after initiating the download
       } else {
           echo "Failed to generate PDF certificate.";
       }
}
}
?>
