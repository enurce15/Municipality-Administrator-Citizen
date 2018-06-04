<?php

include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';

$profile = "";
$createrequest = "";
$showrequest = "active";
$createcomplaint = "";
$showcomplaints = "";
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
    <title>BAQ - Show Requests</title>

    <?php include_once "navbar.php"; ?>


    <div id="content">
        <center><h3>All Requests </h3></center>
        <br>


        <!--    citizen sees his requests-->
        <?php if($_SESSION['user_type']==1){ echo"<h5>My Requests</h5>";


            $query="Select * from request where citizen_id = '". $_SESSION['login_user']."'  order by date desc";
            $data=$crud->getData($query);
            if($data){
                echo "<table id='payments'>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>";

                foreach ($data as $request){
                    $files= array();
                    $folder="";
                    if($request['type']=="Reconstruction Permit"){
                        $folder="../Documents/ReconstructionPermits/";
                        $files= explode(",",$request['documents']);
                    }
                    else if($request['type']=="Parking Permit"){
                        $folder="../Documents/ParkingPermits/";
                        $files= explode(",",$request['documents']);
                    }

                    $tabledata.="<tr>
                        <td>".$request['requestid']."</td>
                        <td>".$request['type']."</td>
                        <td>".$request['description']."</td><td>";

                    foreach ($files as $file){
                        $tabledata.="<a target='_blank' href='".$folder.$file."'>".$file."</a><br>";
                    }
                    $tabledata.="</td><td>".$request['status']."</td>
                        <td>".date("F j, Y, g:i a",strtotime($request['date']))."</td></tr>";
                }

                echo $tabledata."</table>";
            }
            else echo "<center><h5 style='color: gray'>There are no requests made.</h5></center>";
        }


//        admin sees citizen requests
        else if($_SESSION['user_type']==2) {
            echo "<h5>Citizen Requests</h5>";

//            request.admin_id = '" . $_SESSION['login_user'] . "'
            $query = "Select request.*,citizen.name, citizen.surname from request,citizen where citizen.citizenid = request.citizen_id
            and citizenid in (Select citizenid from citizen where admin_id='". $_SESSION['login_user'] ."') order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo "<table id='payments'>
                <tr>
                    <th>ID</th>
                    <th>Citizen</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>";

                foreach ($data as $request) {
                    $files= array();
                    $folder="";
                    if($request['type']=="Reconstruction Permit"){
                        $folder="../Documents/ReconstructionPermits/";
                        $files= explode(",",$request['documents']);
                    }
                    else if($request['type']=="Parking Permit"){
                        $folder="../Documents/ParkingPermits/";
                        $files= explode(",",$request['documents']);
                    }

                    $tabledata .= "<tr>
                        <td>" . $request['requestid'] . "</td>
                        <td><a href='profile.php?id=" . $request['citizen_id'] . "&type=citizen'>" . $request['name'] . " " . $request['surname'] . "</a></td>
                        <td>" . $request['type'] . "</td>
                        <td>" . $request['description'] . "</td><td>";

                    foreach ($files as $file){
                        $tabledata.="<a target='_blank' href='".$folder.$file."'>".$file."</a><br>";
                    }
                    $tabledata.="</td>
                        <td>" . date("F j, Y, g:i a", strtotime($request['date'])) . "</td>";

                    if($request['admin_id']=='0' && $request['type']!="Other")$tabledata.="<td><a href='../Controller/handlerequest.php?id=". $request['requestid']."&type=forward'>
<button name='forward' class='btn btn-success' style='width: 110px; white-space: normal'>Forward to Municipality</button></a></td></tr>";
                    else $tabledata.="<td>" . $request['status'] ."</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no requests made.</h5></center>";




            //admin sees his requests

            echo "<br><h5>My Requests</h5>";
            $query="Select * from request where admin_id = '". $_SESSION['login_user']."' and request.citizen_id='0' order by date desc";
            $tabledata="";
            $data=$crud->getData($query);
            if($data){
                echo "<table id='payments'>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>";

                foreach ($data as $request){
                    $files= array();
                    $folder="";
                    if($request['type']=="Reconstruction Permit"){
                        $folder="../Documents/ReconstructionPermits/";
                        $files= explode(",",$request['documents']);
                    }
                    else if($request['type']=="Parking Permit"){
                        $folder="../Documents/ParkingPermits/";
                        $files= explode(",",$request['documents']);
                    }

                    $tabledata.="<tr>
                        <td>".$request['requestid']."</td>
                        <td>".$request['type']."</td>
                        <td>".$request['description']."</td><td>";

                    foreach ($files as $file){
                        $tabledata.="<a target='_blank' href='".$folder.$file."'>".$file."</a><br>";
                    }
                    $tabledata.="</td><td>".$request['status']."</td>
                        <td>".date("F j, Y, g:i a",strtotime($request['date']))."</td></tr>";
                }

                echo $tabledata."</table>";
            }
            else echo "<center><h5 style='color: gray'>There are no requests made.</h5></center>";
        }



        else{
            //munip sees citizen requests
            echo "<h5>Citizen Requests</h5>";


            $query = "Select request.*, citizen.name as citizenname, citizen.surname as citizensurname,
                      admin.name as adminname, admin.surname as adminsurname from request,citizen,admin
                      where request.admin_id=admin.adminid and citizen.citizenid= request.citizen_id and request.citizen_id!='0' and request.admin_id!='0' order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo "<table id='payments'>
                <tr>
                    <th>ID</th>
                    <th>Citizen</th>
                    <th>Administrator</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>";

                foreach ($data as $request) {
                    $files= array();
                    $folder="";
                    if($request['type']=="Reconstruction Permit"){
                        $folder="../Documents/ReconstructionPermits/";
                        $files= explode(",",$request['documents']);
                    }
                    else if($request['type']=="Parking Permit"){
                        $folder="../Documents/ParkingPermits/";
                        $files= explode(",",$request['documents']);
                    }

                    $tabledata .= "<tr>
                        <td>" . $request['requestid'] . "</td>
                        <td><a href='profile.php?id=" . $request['citizen_id'] . "&type=citizen'>" . $request['citizenname'] . " " . $request['citizensurname'] . "</a></td>
                        <td><a href='profile.php?id=" . $request['admin_id'] . "&type=admin'>" . $request['adminname'] . " " . $request['adminsurname'] . "</a></td>
                        <td>" . $request['type'] . "</td>
                        <td>" . $request['description'] . "</td><td>";

                    foreach ($files as $file){
                        $tabledata.="<a target='_blank' href='".$folder.$file."'>".$file."</a><br>";
                    }
                    $tabledata.="</td><td>" . date("F j, Y, g:i a", strtotime($request['date'])) . "</td>";
                        if($request['status']=='Pending')
                            $tabledata.="<td><a href='../Controller/handlerequest.php?id=". $request['requestid']."&type=accept'><button class='btn btn-success'>Accept</button></a>
                            <a href='../Controller/handlerequest.php?id=". $request['requestid']."&type=deny'><button class='btn btn-danger'>Deny</button></a></td></tr>";
                        else $tabledata.="<td>" . $request['status'] ."</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no requests made.</h5></center>";


            //munip sees admin requests
            echo "<br><h5>Administrator Requests</h5>";

            $tabledata="";
            $query = "Select * from request,admin
                      where request.admin_id=admin.adminid and request.citizen_id='0' order by date desc";
            $data = $crud->getData($query);
            if ($data) {
                echo "<table id='payments'>
                <tr>
                    <th>ID</th>
                    <th>Administrator</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>";

                foreach ($data as $request) {
                    $files= array();
                    $folder="";
                    if($request['type']=="Reconstruction Permit"){
                        $folder="../Documents/ReconstructionPermits/";
                        $files= explode(",",$request['documents']);
                    }
                    else if($request['type']=="Parking Permit"){
                        $folder="../Documents/ParkingPermits/";
                        $files= explode(",",$request['documents']);
                    }

                    $tabledata .= "<tr>
                        <td>" . $request['requestid'] . "</td>
                        <td><a href='profile.php?id=" . $request['admin_id'] . "&type=admin'>" . $request['name'] . " " . $request['surname'] . "</a></td>
                        <td>" . $request['type'] . "</td>
                        <td>" . $request['description'] . "</td><td>";

                    foreach ($files as $file){
                        $tabledata.="<a target='_blank' href='".$folder.$file."'>".$file."</a><br>";
                    }
                    $tabledata.="</td><td>" . date("F j, Y, g:i a", strtotime($request['date'])) . "</td>";
                        if($request['status']=='Pending')
                            $tabledata.="<td><a href='../Controller/handlerequest.php?id=". $request['requestid']."&type=accept'><button class='btn btn-success'>Accept</button></a>
                            <a href='../Controller/handlerequest.php?id=". $request['requestid']."&type=deny'><button class='btn btn-danger'>Deny</button></a></td></tr>";
                        else $tabledata.="<td>" . $request['status'] ."</td></tr>";
                }

                echo $tabledata . "</table>";
            } else echo "<center><h5 style='color: gray'>There are no requests made.</h5></center>";


        }




        ?>
    </div>

    </body><?php include_once "footer.html"?>
</html>