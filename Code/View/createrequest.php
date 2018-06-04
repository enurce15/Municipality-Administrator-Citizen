<?php

$profile = "";
$createrequest = "active";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$payments = "";
$admin = "";
$viewcitizen="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Create Request</title>
    <link rel="stylesheet" href="formstyle.css">
    <?php include_once "navbar.php"; ?>

    <div class="wrapper">
        <form class="form-signin" method="post" enctype="multipart/form-data" action="../Controller/validateRequest.php">
            <?php if(isset($_GET['case'])) echo '<h6 class="error">Your Request was not submitted</h6>' ?>
            <h2 class="form-signin-heading">Create Request</h2>
            Request Type:
            <select class="custom-select" id="reqType" name = "type" onchange="show(this.value)">
                <option value="1" selected>Reconstruction Permit</option>
                <option value="2">Parking Permit</option>
                <option value="3">Other(To Building Administrator)</option>
            </select>
            <br>

            <script>
                function show(val) {
                    if(val==1)
                    {
                        document.getElementById('park').style.display='none';
                        document.getElementsByName('vlagje')[0].removeAttribute("required");
                        document.getElementsByName('certifikate')[0].removeAttribute("required");
                        document.getElementsByName('leje')[0].removeAttribute("required");


                        document.getElementById('reconstruct').style.display='inline';
                        document.getElementsByName('pronesi')[0].setAttribute("required","");
                        document.getElementsByName('projekt')[0].setAttribute("required","");
                    }
                    if(val==2)
                    {
                        document.getElementById('park').style.display='inline';
                        document.getElementsByName('vlagje')[0].setAttribute("required","");
                        document.getElementsByName('certifikate')[0].setAttribute("required","");
                        document.getElementsByName('leje')[0].setAttribute("required","");

                        document.getElementById('reconstruct').style.display='none';
                        document.getElementsByName('pronesi')[0].removeAttribute("required");
                        document.getElementsByName('projekt')[0].removeAttribute("required");
                    }
                    if(val==3)
                    {
                        document.getElementById('park').style.display='none';
                        document.getElementsByName('vlagje')[0].removeAttribute("required");
                        document.getElementsByName('certifikate')[0].removeAttribute("required");
                        document.getElementsByName('leje')[0].removeAttribute("required");


                        document.getElementById('reconstruct').style.display='none';
                        document.getElementsByName('pronesi')[0].removeAttribute("required");
                        document.getElementsByName('projekt')[0].removeAttribute("required");
                    }
                }
            </script>
            Description:
            <textarea maxlength="300" class="form-control" name="description" placeholder="Write your Request" style="height: 150px" ></textarea>

            <div id="park" style="display: none">
                Vertetim Banimi:
                <input type="file" name="vlagje" class="form-control" accept="application/pdf">
                Certifikate Familjare:
                <input type="file" name="certifikate" class="form-control" accept="application/pdf">
                Certifikate Pronesie per Automjetin / <br>Leje Qarkullimi:
                <input type="file" name="leje" class="form-control" accept="application/pdf">
                <br>
                <center><h6 style="color: gray">Please submit all required documents as pdf files only.</h6></center>
            </div>

            <div id="reconstruct">
                Dokumenti i Pronesise:
                <input required type="file" name="pronesi" class="form-control" accept="application/pdf">
                Projekti:
                <input required type="file" name="projekt" class="form-control" accept="application/pdf">
                <br>
                <center><h6 style="color: gray;">Please submit all required documents as pdf files only.</h6></center>
            </div>

            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit Request</button>

        </form>
    </div>

    </body><?php include_once "footer.html"?>
</html>

