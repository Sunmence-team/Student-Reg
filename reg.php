<?php

include "connect.php";


// Initialize variables to empty strings
// $fileupload = "";
$dateofreg = "";
$title = "";
$surname = "";
$firstname = "";
$othername = "";
$nationality = "";
$date = "";
$stateoforigin = "";
$gender = "";
$lga = "";
$religion = "";
$maritalstatus = "";
$institution = "";
$department = "";
$matricno = "";
$fieldoftraining = "";
$hostelname = "";
$pemadd = "";
$emailadd = "";
$anyhealthcha = "";
$mobileno = "";
$kindlyspeif = "";
$kintitle = "";
$kinsurname = "";
$kinfirstname = "";
$kinothername = "";
$kinnationality = "";
$kinemail = "";
$kinperadd = "";
$kinmobileno = "";
$kinrelationship = "";
$dateofresump = "";
$monthoftrain = "";
$postli = "";
$trainingday = "";
$studentno = "";
$modeofpayment = "";
$amountpaid = "";

if (isset($_POST["submit"])) {
    $fileupload = $_FILES["fileupload"]["name"];
    $tmp_fileupload = $_FILES["fileupload"]["tmp_name"];
    $dateofreg = $_POST["dateofreg"];
    $title = $_POST["title"];
    $surname = $_POST["surname"];
    $firstname = $_POST["firstname"];
    $othername = $_POST["othername"];
    $nationality = $_POST["nationality"];
    $date = $_POST["date"];
    $stateoforigin = $_POST["stateoforigin"];
    $gender = $_POST["gender"];
    $lga = $_POST["lga"];
    $religion = $_POST["religion"];
    $maritalstatus = $_POST["maritalstatus"];
    $institution = $_POST["institution"];
    $department = $_POST["department"];
    $matricno = $_POST["matricno"];
    $fieldoftraining = $_POST["fieldoftraining"];
    $hostelname = $_POST["hostelname"];
    $pemadd = $_POST["pemadd"];
    $emailadd = $_POST["emailadd"];
    $anyhealthcha = $_POST["anyhealthcha"];
    $mobileno = $_POST["mobileno"];
    $kindlyspeif = isset($_POST["kindlyspeif"]) ? $_POST["kindlyspeif"] : "No health challenges specified";
    $kintitle = $_POST["kintitle"];
    $kinsurname = $_POST["kinsurname"];
    $kinfirstname = $_POST["kinfirstname"];
    $kinothername = $_POST["kinothername"];
    $kinnationality = $_POST["kinnationality"];
    $kinemail = $_POST["kinemail"];
    $kinperadd = $_POST["kinperadd"];
    $kinmobileno = $_POST["kinmobileno"];
    $kinrelationship = $_POST["kinrelationship"];
    $dateofresump = $_POST["dateofresump"];
    $monthoftrain = $_POST["monthoftrain"];
    $postli = $_POST["postli"];
    $trainingday = $_POST["trainingday"];
    $studentno = $_POST["studentno"];
    $modeofpayment = $_POST["modeofpayment"];
    $amountpaid = $_POST["amountpaid"];



    if (
        (empty($fileupload)) && (empty($dateofreg)) && (empty($title)) && (empty($surname)) && (empty($firstname)) && (empty($othername)) &&
        (empty($nationality)) && (empty($date)) && (empty($stateoforigin)) && (empty($gender)) && (empty($lga)) &&
        (empty($religion)) && (empty($maritalstatus)) && (empty($institution)) && (empty($department)) &&
        (empty($matricno)) && (empty($fieldoftraining)) && (empty($hostelname)) && (empty($pemadd)) && (empty($emailadd)) &&
        (empty($anyhealthcha)) && (empty($mobileno)) && (empty($kintitle)) && (empty($kinsurname)) && (empty($kinfirstname)) &&
        (empty($kinothername)) && (empty($kinnationality)) && (empty($kinemail)) && (empty($kinperadd)) && (empty($kinmobileno)) &&
        (empty($kinrelationship)) && (empty($dateofresump)) && (empty($monthoftrain)) && (empty($postli)) && (empty($trainingday)) &&
        (empty($studentno)) && (empty($modeofpayment)) && (empty($amountpaid))
    ) {

        echo "kindly fill the form";

        // $_SESSION['form_data'] = $_POST;

    } else {
        // Check if email already exists in the 'user' table

        $row = "SELECT * FROM `user` WHERE `emailadd` = '$emailadd'";
        $result = mysqli_query($conn, $row);
        $loading = mysqli_num_rows($result);

        if ($loading) {
            echo "email already exists";
        } else {
            $collectUser = "INSERT INTO `user` 
        (`fileupload`, `dateofreg`, `title`, `surname`, `firstname`, `othername`, `nationality`, `date`, 
        `stateoforigin`, `gender`, `lga`, `religion`, `maritalstatus`, `institution`, `department`, `matricno`, 
        `fieldoftraining`, `hostelname`, `pemadd`, `emailadd`, `anyhealthcha`, `mobileno`, `kindlyspeif`, `kintitle`, 
        `kinsurname`, `kinfirstname`, `kinothername`, `kinnationality`, `kinemail`, `kinperadd`, `kinmobileno`, 
        `kinrelationship`, `dateofresump`, `monthoftrain`, `postli`, `trainingday`, `studentno`, `modeofpayment`, `amountpaid`) 
        VALUES 
        ('$fileupload', '$dateofreg', '$title', '$surname', '$firstname', '$othername', '$nationality', '$date', 
        '$stateoforigin', '$gender', '$lga', '$religion', '$maritalstatus', '$institution', '$department', '$matricno', 
        '$fieldoftraining', '$hostelname', '$pemadd', '$emailadd', '$anyhealthcha', '$mobileno', '$kindlyspeif', '$kintitle', 
        '$kinsurname', '$kinfirstname', '$kinothername', '$kinnationality', '$kinemail', '$kinperadd', '$kinmobileno', 
        '$kinrelationship', '$dateofresump', '$monthoftrain', '$postli', '$trainingday', '$studentno', '$modeofpayment', '$amountpaid')";

            $fill = mysqli_query($conn, $collectUser);
            if ($fill) {
                move_uploaded_file($tmp_fileupload, "image/$fileupload");
                $lastInsertId = $conn->insert_id;
                $bugNumber = 'BUG' . $lastInsertId;

                $updateSql = "UPDATE user SET bugid = '$bugNumber' WHERE id = $lastInsertId";

                if (mysqli_query($conn, $updateSql) == true) {
                    echo "done";
                }
            } else {
                echo "not uploaded";
            }
        }
    }
}

// Handle Search

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchQuery = "SELECT * FROM `user` WHERE `bugid` LIKE '%$searchTerm%' ";
    $extracts_reg = mysqli_query($conn, $searchQuery);

    //check if there are records 
    if ($extracts_reg && mysqli_num_rows($extracts_reg) > 0) {

        // Display search results
        while ($row = mysqli_fetch_assoc($extracts_reg)) {
            // $fileupload = $row['fileupload'];
            $bugid = $row['bugid'];
            $dateofreg = $row["dateofreg"];
            $title = $row["title"];
            $surname = $row["surname"];
            $firstname = $row["firstname"];
            $othername = $row["othername"];
            $nationality = $row["nationality"];
            $date = $row["date"];
            $stateoforigin = $row["stateoforigin"];
            $gender = $row["gender"];
            $lga = $row["lga"];
            $religion = $row["religion"];
            $maritalstatus = $row["maritalstatus"];
            $institution = $row["institution"];
            $department = $row["department"];
            $matricno = $row["matricno"];
            $fieldoftraining = $row["fieldoftraining"];
            $hostelname = $row["hostelname"];
            $pemadd = $row["pemadd"];
            $emailadd = $row["emailadd"];
            $anyhealthcha = $row["anyhealthcha"];
            $mobileno = $row["mobileno"];
            $kindlyspeif = isset($row["kindlyspeif"]) ? $row["kindlyspeif"] : "No health challenges specified";
            $kintitle = $row["kintitle"];
            $kinsurname = $row["kinsurname"];
            $kinfirstname = $row["kinfirstname"];
            $kinothername = $row["kinothername"];
            $kinnationality = $row["kinnationality"];
            $kinemail = $row["kinemail"];
            $kinperadd = $row["kinperadd"];
            $kinmobileno = $row["kinmobileno"];
            $kinrelationship = $row["kinrelationship"];
            $dateofresump = $row["dateofresump"];
            $monthoftrain = $row["monthoftrain"];
            $postli = $row["postli"];
            $trainingday = $row["trainingday"];
            $studentno = $row["studentno"];
            $modeofpayment = $row["modeofpayment"];
            $amountpaid = $row["amountpaid"];
        }
    } else {
        //No records found, set values to display "No record found"
        $dateofreg = "No record found";
        $title = "No record found";
        $surname = "No record found";
        $firstname = "No record found";
        $othername = "No record found";
        $nationality = "No record found";
        $date = "No record found";
        $stateoforigin = "No record found";
        $gender = "No record found";
        $lga = "No record found";
        $maritalstatus = "No record found";
        $institution = "No record found";
        $department = "No record found";
        $matricno = "No record found";
        $fieldoftraining = "No record found";
        $hostelname = "No record found";
        $pemadd = "No record found";
        $emailadd = "No record found";
        $anyhealthcha = "No record found";
        $mobileno = "No record found";
        $kindlyspeif = "No record found";
        $kintitle = "No record found";
        $kinsurname = "No record found";
        $kinfirstname = "No record found";
        $kinothername = "No record found";
        $kinnationality = "No record found";
        $kinemail = "No record found";
        $kinperadd = "No record found";
        $kinmobileno = "No record found";
        $kinrelationship = "No record found";
        $dateofresump = "No record found";
        $monthoftrain = "No record found";
        $postli = "No record found";
        $trainingday = "No record found";
        $studentno = "No record found";
        $modeofpayment = "No record found";
        $amountpaid = "No record found";
    }
}
