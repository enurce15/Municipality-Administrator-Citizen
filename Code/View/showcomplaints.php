<?php

include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';

$profile = "";
$createcomplaint = "";
$showrequests = "";
$createrequest = "";
$showcomplaints = "active";
$payments = "";
$admin = "";
$tabledata = "";


$viewcitizen = "";
$crud= new crud();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Show Complaints</title>
    
    <?php include_once "navbar.php"; ?>


    <div id="content">
        <center><h3>All Complaints</h3></center>
        <br>


        <!--    citizen sees his complaints-->
        <?php if($_SESSION['user_type']==1){ echo"<h5>My Complaints</h5>";


            $query="Select * from complaint where citizen_id = '". $_SESSION['login_user']."' order by date desc";
            $data=$crud->getData($query);
            if($data){
                echo " <table id='payments'>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Date</th>
            </tr>";

                foreach ($data as $complaint){
                    $tabledata.="<tr>
                        <td>".$complaint['complaintid']."</td>
                        <td>".$complaint['subject']."</td>
                        <td>".$complaint['description']."</td>
                        <td>".date("F j, Y, g:i a",strtotime($complaint['date']))."</td></tr>";
                }

                echo $tabledata."</table>";
            }
            else echo "<center><h5 style='color: gray'>There are no complaints made.</h5></center>";
        }


//        admin sees citizen Complaints
        else if($_SESSION['user_type']==2) {
            echo "<h5>Citizen Complaints</h5>";


            $query = "Select * from complaint,citizen where complaint.admin_id = '" . $_SESSION['login_user'] . "' and citizen.citizenid= complaint.citizen_id order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo  "<table id='payments'>
            <tr>
                <th>ID</th>
                <th>Citizen</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Date</th>
            </tr>";

                foreach ($data as $complaint) {
                    $tabledata .= "<tr>
                        <td>" . $complaint['complaintid'] . "</td>
                        <td><a href='profile.php?id=" . $complaint['citizen_id'] . "&type=citizen'>" . $complaint['name'] . " " . $complaint['surname'] . "</a></td>
                        <td>" . $complaint['subject'] . "</td>
                        <td>" . $complaint['description'] . "</td>
                        <td>" . date("F j, Y, g:i a", strtotime($complaint['date'])) . "</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no Complaints made.</h5></center>";




            //admin sees his Complaints

            echo "<br><h5>My Complaints</h5>";
            $query="Select * from complaint where admin_id = '". $_SESSION['login_user']."' and complaint.citizen_id='0' order by date desc";
            $tabledata="";
            $data=$crud->getData($query);
            if($data){
                echo  "<table id='payments'>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Date</th>
            </tr>";

                foreach ($data as $complaint){
                    $tabledata.="<tr>
                        <td>".$complaint['complaintid']."</td>
                        <td>".$complaint['subject']."</td>
                        <td>".$complaint['description']."</td>
                        <td>".date("F j, Y, g:i a",strtotime($complaint['date']))."</td></tr>";
                }

                echo $tabledata."</table>";
            }
            else echo "<center><h5 style='color: gray'>There are no Complaints made.</h5></center>";
        }



        else{
            //munip sees citizen Complaints
            echo "<h5>Citizen Complaints</h5>";


            $query = "Select complaint.*, citizen.name as citizenname, citizen.surname as citizensurname,
                      admin.name as adminname, admin.surname as adminsurname from complaint,citizen,admin
                      where complaint.admin_id=admin.adminid and citizen.citizenid= complaint.citizen_id and complaint.citizen_id!='0' order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo  "<table id='payments'>
                            <tr>
                                <th>ID</th>
                                <th>Citizen</th>
                                <th>Administrator</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>";

                foreach ($data as $complaint) {
                    $tabledata .= "<tr>
                        <td>" . $complaint['complaintid'] . "</td>
                        <td><a href='profile.php?id=" . $complaint['citizen_id'] . "&type=citizen'>" . $complaint['citizenname'] . " " . $complaint['citizensurname'] . "</a></td>
                        <td><a href='profile.php?id=" . $complaint['admin_id'] . "&type=admin'>" . $complaint['adminname'] . " " . $complaint['adminsurname'] . "</a></td>
                        <td>" . $complaint['subject'] . "</td>
                        <td>" . $complaint['description'] . "</td>
                        <td>" . date("F j, Y, g:i a", strtotime($complaint['date'])) . "</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no Complaints made.</h5></center>";


            //munip sees admin Complaints
            echo "<br><h5>Administrator Complaints</h5>";

            $tabledata="";
            $query = "Select * from complaint,admin
                      where complaint.admin_id=admin.adminid and complaint.citizen_id='0' order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo  "<table id='payments'>
            <tr>
                <th>ID</th>
                <th>Administrator</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Date</th>
            </tr>";

                foreach ($data as $complaint) {
                    $tabledata .= "<tr>
                        <td>" . $complaint['complaintid'] . "</td>
                        <td><a href='profile.php?id=" . $complaint['admin_id'] . "&type=admin'>" . $complaint['name'] . " " . $complaint['surname'] . "</a></td>
                        <td>" . $complaint['subject'] . "</td>
                        <td>" . $complaint['description'] . "</td>
                        <td>" . date("F j, Y, g:i a", strtotime($complaint['date'])) . "</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no Complaints made.</h5></center>";


        }




        ?>

    </div>


    </body><?php include_once "footer.html"?>
</html>