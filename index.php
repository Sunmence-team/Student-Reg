<?php
include "reg.php";
$myrow = "SELECT * FROM `user` WHERE `emailadd` = '$emailadd'";
$myresult = mysqli_query($conn, $myrow);
$myloading = mysqli_fetch_assoc($myresult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="\survival project\Form\index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .regextract {
            /* display: none; */
        }

        li {
            list-style-type: none;
        }
        
    </style>
</head>

<body>
    <section class="head">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12 d-flex align-items-center pb-2">
                    <form action="" method="GET">
                        <input type="text" name="search" placeholder="Enter Bug ID">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-12 text">
                    <h5>BUGGYBILLIONS STUDENT </h5>
                    <h4>TRAINING REGISTRATION FORM</h4>
                </div>
                <div class="col-lg-3 col-md-3 col-12 logo d-flex align-items-center">
                    <img src="Asset 109.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- date -->
    <form action="reg.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row align-item-center justify-content-center">
                <div class="col-md-9 d-flex align-items-center pb-2">
                    <div class="d-flex align-items-center justify-content-start w-100">
                        <label for="" class="d-flex align-items-center mt-4">UPLOAD PROFILE PICS</label>

                        <div class="">

                            <!-- <input type="file" name="fileupload" required class="image" value=" <?php echo $fileupload ?>"> -->
                            <img src="image/<?php echo $myloading['fileupload'] ?>" width = "100px" height = "100px" alt = "">



                        </div>

                    </div>
                </div>
                <!-- <div class="col-md-4"></div> -->
                <div class="col-md-3 date ">
                    <label for="dateInput">Date:</label>
                    <input type="date" id="dateInput" name="dateofreg" required style="width: 200px;" value="<?php echo $dateofreg; ?>">
                </div>
            </div>
        </div>

        <!-- Personal Details -->
        <section class="info">
            <div class="container">
                <div class="row">
                    <h4>PERSONAL INFORMATION</h4>
                </div>
            </div>
        </section>
        <br>
        <!-- Details -->

        <div class="container px-lg-0 px-md-0 px-3">
            <div class="row">

                <div class="col col-lg-12 col-md-12 col-12">
                    <label for="title">TITLE:</label>
                    <select id="title" name="title" required value="">
                        <option><?php echo $title; ?></option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                    </select> <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="surname">SURNAME:</label>
                    <input type="text" class="dateInput-1" name="surname" required value="<?php echo $surname; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">FIRSTNAME:</label>
                    <input type="text" id="firstname" name="firstname" required value="<?php echo $firstname; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="surname">OTHERNAMES:</label>
                    <input type="text" class="dateInput" required name="othername" value="<?php echo $othername; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">NATIONALITY:</label>
                    <input type="text" id="nation" name="nationality" required value="<?php echo $nationality; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">DATE:</label>
                    <input type="date" id="date" name="date" required style="width: 200px;" value="<?php echo $date; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="institution">STATE OF ORIGIN:</label>
                    <select onchange="selectLGA(this)" id="title-1" class="state" name="stateoforigin" required>
                        <option> </option>
                        <option value="<?php echo $stateoforigin; ?>" selected="selected">- Select State -</option>
                    </select>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <div id="gender-1">
                        GENDER:
                        <input type="radio" id="male" name="gender" value="male" <?php echo ($gender === 'male') ? 'checked' : ''; ?> required>
                        <label for="male">MALE</label>
                        <input type="radio" id="female" name="gender" value="female" <?php echo ($gender === 'female') ? 'checked' : ''; ?> required>
                        <label for="female">FEMALE</label>

                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="institution">LGL OF ORIGIN:</label>
                    <select id="title-2" class="lga" name="lga" required>
                        <option><?php echo $lga; ?></option>
                        <option>Select LGA</option>
                    </select>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="religion">RELIGIOUS:</label>
                    <select id="religion" name="religion" required value="<?php echo $firstname; ?>">
                        <option><?php echo $religion; ?></option>
                        <option value="Christain">Christain</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Others">Others</option>
                    </select>
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <div class="marital">
                        MARITAL STATUS:
                        <input type="radio" id="married" name="maritalstatus" value="married" <?php echo ($maritalstatus === 'married') ? 'checked' : ''; ?> required>
                        <label for="married">MARRIED</label>
                        <input type="radio" id="unmarried" name="maritalstatus" value="unmarried" <?php echo ($maritalstatus === 'unmarried') ? 'checked' : ''; ?> required>
                        <label for="unmarried">UNMARRIED</label>
                    </div>
                    <!-- <?= $maritalstatus ?> -->

                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="institution">INSTITUTION:</label>
                    <input type="text" id="institution" name="institution" required value="<?php echo $institution; ?>">
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="department">DEPARTMENT:</label>
                    <input type="text" id="department" name="department" required value="<?php echo $department; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">MATRIC NO:</label>
                    <input type="text" id="matric" name="matricno" required value="<?php echo $matricno; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="department">FIELD OF TRAINING:</label>
                    <input type="text" id="field" name="fieldoftraining" required value="<?php echo $fieldoftraining; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">HOSTEL NAME:</label>
                    <input type="text" id="hostel" name="hostelname" required value=" <?php echo $hostelname; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="department">PERMANENT ADDRESS:</label>
                    <input type="text" id="add" name="pemadd" required value="<?php echo $pemadd; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">EMAIL ADDRESS:</label>
                    <input type="email" id="email" name="emailadd" required value="<?php echo $emailadd; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <div class="issue">
                        <label for="healthChallenges">ANY HEALTH CHALLENGES:</label>
                        <input type="radio" id="healthYes" class="healthYes" name="anyhealthcha" value="Yes" <?php echo ($anyhealthcha === 'Yes') ? 'checked' : ''; ?> required>
                        <label for="healthYes">YES</label>
                        <input type="radio" id="healthNo" name="anyhealthcha" class="healthNo" value="No" <?php echo ($anyhealthcha === 'No') ? 'checked' : ''; ?> required>
                        <label for="healthNo">NO</label>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">MOBILE NO:</label>
                    <input type="tel" id="phoneNumberInput" name="mobileno" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required value="<?php echo $mobileno; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12 fillhealth">
                    <label for="department">KINDLY SPECIFY IF ANY:</label>
                    <input type="text" id="spicy" name="kindlyspeif" class="healthFill" required value="<?php echo $kindlyspeif; ?>">
                    <br>
                </div>
            </div>
        </div>

        <br>

        <section class="info">
            <div class="container p-0">
                <div class="row">
                    <h4>NEXT OF KIN INFORMATION</h4>
                </div>
            </div>
        </section>
        <div class="container p-0">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-12">
                    <br>
                    <label for="title">TITLE:</label>
                    <select id="til" name="kintitle" required value="">
                        <option><?php echo $kintitle; ?></option>
                        <option>Mr</option>
                        <option>Miss</option>
                        <option>Mrs</option>
                    </select> <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="surname">SURNAME:</label>
                    <input type="text" class="surn" name="kinsurname" required value="<?php echo $kinsurname; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">FIRSTNAME:</label>
                    <input type="text" id="first" name="kinfirstname" required value="<?php echo $kinfirstname; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="surname">OTHERNAMES:</label>
                    <input type="text" class="dateInput" name="kinothername" required value="<?php echo $kinothername; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">NATIONALITY:</label>
                    <input type="text" id="nationality" name="kinnationality" required value="<?php echo $kinnationality; ?>">
                    <br>
                </div>

                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">EMAIL ADDRESS:</label>
                    <input type="email" id="email" name="kinemail" required value="<?php echo $kinemail; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="department">PERMANENT ADDRESS:</label>
                    <input type="text" id="permanent" name="kinperadd" required value="<?php echo $kinperadd; ?>">
                    <br>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="dateInput">MOBILE NO:</label>
                    <input type="text" id="no" name="kinmobileno" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required value="<?php echo $kinmobileno; ?>">
                    <br>
                    <label for="dateInput">RELATIONSHIP:</label>
                    <input type="text" id="relationship" name="kinrelationship" required value="<?php echo $kinrelationship; ?>">
                    <br>
                </div>
            </div>

        </div>
        <br>
        <div class="br"> </div>

        <!-- hereby -->
        <section class="hereby">
            <div class="container">
                <div class="row hereby">
                    <div class="col-lg-6 col-md-6 col-12">
                        <input type="checkbox" id="hereby" name="hereby" value="agreement" required>
                        <label for="vehicle1" class="by">I hereby confirm that all the information provided is correct </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 res ">
                        <label for="dateInput">Date of Resumption:</label>
                        <input type="date" id="Resumption" name="dateofresump" required style="width: 200px;" value="<?php echo $dateofresump; ?>">
                    </div>
                </div>
            </div>
        </section>
        <br>
        <div class="container">
            <div class="row">

                <div class="col-md-6 sign">

                </div>
            </div>
        </div>


        <!-- ICT -->

        <section class="info">
            <div class="container p-0">
                <div class="row">
                    <h4>ICT INFORMATION</h4>
                </div>
            </div>
        </section>
        <br>
        <section class="detail">
            <div class="container details">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-12">
                        <label for="dateInput">MONTHS OF TRAINING:</label>
                        <input type="text" id="month" name="monthoftrain" required value="<?php echo $monthoftrain; ?>">
                        <br>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-12">
                        <label for="dateInput">POST:</label>
                        <input type="text" id="post" name="postli" required value="<?php echo $postli; ?>">
                        <br>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-12">
                        <label for="dateInput">TRAINING DAY:</label>
                        <input type="text" id="training" name="trainingday" required value="<?php echo $trainingday; ?>">
                        <br>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-12">
                        <label for="dateInput">STUDENT NUMBER:</label>
                        <input type="tel" id="student" name="studentno" required value="<?php echo $studentno; ?>">
                        <br>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-12">
                        <label for="department">MODE OF PAYMENT:</label>
                        <input type="text" id="mode" name="modeofpayment" required value="<?php echo $modeofpayment; ?>">
                    </div>
                </div>
                <div class="col col-lg-6 col-md-6 col-12">
                    <label for="department">AMOUNT PAID:</label>
                    <input type="text" id="amount" name="amountpaid" required value="<?php echo $amountpaid; ?>">
                </div>

                <!-- <div class="col col-lg-6 col-md-6 col-12 mx-auto butnSubmit">
                   
                </div> -->
            </div>
            </div>

        </section>


        <!-- LOGO -->
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-6">
                    <div class="bottom">
                        <img src="Asset 122 1.png" width="70%" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-6 move d-flex justify-content-end">
                    <button type="submit" name="submit">SUBMIT NOW</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        //Fetch all States
        fetch('https://nga-states-lga.onrender.com/fetch')
            .then((res) => res.json())
            .then((data) => {
                var x = document.querySelector(".state");
                for (let index = 0; index < Object.keys(data).length; index++) {
                    var option = document.createElement("option");
                    option.text = data[index];
                    option.value = data[index];
                    x.add(option);
                }
            });
        //Fetch Local Goverments based on selected state
        function selectLGA(target) {
            var state = target.value;
            fetch('https://nga-states-lga.onrender.com/?state=' + state)
                .then((res) => res.json())
                .then((data) => {
                    var x = document.querySelector(".lga");

                    var select = document.querySelector(".lga");
                    var length = select.options.length;
                    for (i = length - 1; i >= 0; i--) {
                        select.options[i] = null;
                    }
                    for (let index = 0; index < Object.keys(data).length; index++) {
                        var option = document.createElement("option");
                        option.text = data[index];
                        option.value = data[index];
                        x.add(option);
                    }
                });
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var yesRadio = document.querySelector('.healthYes');
            var noRadio = document.querySelector('.healthNo');
            var specifyInput = document.querySelector('.healthFill');

            // Initial state
            specifyInput.disabled = true;

            // Event listener for "no" radio button
            noRadio.addEventListener('click', function() {
                specifyInput.disabled = true;
            });

            // Event listener for "yes" radio button
            yesRadio.addEventListener('click', function() {
                specifyInput.disabled = false;
            });
        });
    </script>