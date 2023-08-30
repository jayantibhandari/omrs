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
       
        $fullDate = $row->UpdationDate;

        // Convert the full date string to a UNIX timestamp
        $timestamp = strtotime($fullDate);

        // Extract the day, year, and date using the date() function
        $day = date('d', $timestamp);     // Day with leading zero (01 to 31)
        $year = date('Y', $timestamp);    // Year with four digits (e.g., 2023)
        $date = date('F j, Y', $timestamp); // Formatted date (e.g., August 30, 2023)

        $certificateData = array(
            'Husband_name' => $row->HusbandName,
            'wife_name' => $row->WifeName,
            'w_name1' => $row->WitnessAddressFirst,
            'w_name2' => $row->WitnessNamesec,
            'w_name3' => $row->WitnessNamethird,
            'w_name4' => '',
            'day' => $day,
            'year' => $year,
            'date' => $date,
            // Add more data fields here
        );

        // Path to the PDF template with form fields
        
        $pdftkPath = '"C:/Program Files (x86)/PDFtk/bin/pdftk.exe"'; // Notice the double quotes around the path // Replace with the actual path to pdftk executable
        $pdfTemplatePath = 'C:/xampp/htdocs/omrs/user/mc.pdf'; // Replace with the actual path to the PDF template
        $outputFilename = $randomString . '_Certificate.pdf';
        $outputFilePath = 'C:/Users/Bishwas/Downloads/' . $outputFilename; // Update the path as needed

        $fdfData = "%FDF-1.2\n%âãÏÓ\n1 0 obj\n<< /FDF << /Fields [\n";

        foreach ($certificateData as $field => $value) {
            $escapedField = str_replace("_",'_', $field); // Handle field names with underscores
            $fdfData .= "<< /V ($value) /T ($escapedField) >>\n";
        }
        
        $fdfData .= "] >> >>\nendobj\ntrailer\n<< /Root 1 0 R >>\n%%EOF";
        
        // Save the FDF data to a file
        $fdfFilePath = 'C:/xampp/htdocs/omrs/user/data.fdf';
        file_put_contents($fdfFilePath, $fdfData);
        
        // Construct the pdftk command
        $pdftkPath = '"C:/Program Files (x86)/PDFtk/bin/pdftk.exe"';
        $pdfTemplatePath = 'C:/xampp/htdocs/omrs/user/mc.pdf';
        $randomString = bin2hex(random_bytes(8));
        $outputFilename = $randomString . '_Certificate.pdf';
        $outputFilePath = 'C:/Users/Bishwas/Downloads/' . $outputFilename; // write your download location name not Bishwas/Downloads
        
        $pdftkCommand = "$pdftkPath $pdfTemplatePath fill_form $fdfFilePath output $outputFilePath flatten";
        // $die = die($pdftkCommand);
        // echo $die;
        // Execute the pdftk command and capture both output and error messages
        exec("$pdftkCommand 2>&1", $output, $returnVar);
        
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
