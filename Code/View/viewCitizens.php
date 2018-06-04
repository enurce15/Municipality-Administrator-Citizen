<?php

include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';

$profile = "";
$createrequest = "";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$viewcitizen = "active";
$payments = "";

$tabledata="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - List Citizens</title>
    <?php include_once "navbar.php"; ?>


    <div id="content">

        <center><h3>Your Building Citizens</h3></center>
        <br>
        <?php

        $crud=new crud();

        $query="Select * from citizen where admin_id='".$_SESSION['login_user']."'";

        $data=$crud->getData($query);

        if(!$data) echo "<h5 style='color: gray'>You do not have any citizens registered in your building yet.</h5>";
        else{
            echo '<table id="payments">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Family Members</th>
                <th>Phone Nr.</th>
                <th>Email</th>

            </tr>';
            foreach ($data as $citizen){
                $tabledata.="<tr>
                    <td>".$citizen['name']."</td>
                    <td>".$citizen['surname']."</td>
                    <td>".$citizen['nrMembers']."</td>
                    <td>".$citizen['phone']."</td>
                    <td>".$citizen['email']."</td>
                    </tr>";
            }
            $tabledata.="</table>";
            echo $tabledata;
        }
        ?>



        <br>
        <center><h3>New Citizen Requests</h3></center>
        <br>
        <?php

        $query="Select * from citizen where admin_id='0' and citizen.address='".$user->getAddress()."'";

        $data=$crud->getData($query);
        $tabledata="";
        if(!$data) echo "<h5 style='color: gray'>You do not have any new citizen requests.</h5>";
        else{
            echo '<table id="payments">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Family Members</th>
                <th>Phone Nr.</th>
                <th>Email</th>
                <th>Actions</th>

            </tr>';
            foreach ($data as $citizen){
                $tabledata.="<tr>
                    <td>".$citizen['name']."</td>
                    <td>".$citizen['surname']."</td>
                    <td>".$citizen['nrMembers']."</td>
                    <td>".$citizen['phone']."</td>
                    <td>".$citizen['email']."</td>
                    <td><a href='../Controller/handlecitizen.php?id=". $citizen['citizenid']."'><button name='confirm' class='btn btn-success'>Confirm</button></a></td></tr>";
            }
            $tabledata.="</table>";
            echo $tabledata;
        }
        ?>
    </div>

    </body><?php include_once "footer.html"?>
</html>