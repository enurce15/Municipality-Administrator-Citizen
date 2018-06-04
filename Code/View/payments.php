<?php

$profile = "";
$createrequest = "";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$payments = "active";
$admin ="";

$viewcitizen = "";
$tabledata = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Payments</title>

    <?php include_once "navbar.php"; ?>


    <div id="content">

        <?php
        if($_SESSION['user_type']==1){
            echo "<center><h3>All Payments</h3></center>
                    <br>
                    <table id='payments'>
                    <tr>
                        <th>Payment Description</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Confirmation Date</th>
                    </tr>";

            for($i=0; $i<6; $i++){
                $query="Select * from payment where citizen_id='".$_SESSION['login_user']."' 
                        and description='Administration Fee for ".date('M, Y', strtotime('-'.$i.' month'))."'";
                $crud = new crud();
                $result = $crud->getData($query);
                if($result)$tabledata.="<tr class='table-success'><td>Administration Fee for ".date('M, Y', strtotime('-'.$i.' month'))."</td>
                    <td>500</td><td>Paid</td><td>".$result[0]['date']."</td></tr>";

                else $tabledata.="<tr class='table-danger'><td>Administration Fee for ".date('M, Y', strtotime('-'.$i.' month'))."</td>
                    <td>500</td><td>Unpaid</td><td>-</td></tr>";
            }
            echo $tabledata."</table>";

        }

        elseif($_SESSION['user_type']==2){
            $query="Select * from citizen where admin_id='".$_SESSION['login_user']."'";
            $crud = new crud();
            $data=$crud->getData($query);
            if(!$data) echo "<h5 style='color: gray'>You do not have any citizens registered in your building yet.</h5>";

            else {

                echo "<center><h3>All Payments</h3></center>
                    <br>
                    <table id='payments'>
                    <tr><th>Citizen</th>";
                for ($i = 5; $i >=0 ; $i--) {
                    echo "<th>" . date('M, Y', strtotime('-' . $i . ' month')) . "</th>";
                }


                foreach ($data as $citizen) {
                    $tabledata.="<tr><td><a href='profile.php?id=".$citizen['citizenid']."&type=citizen'>".$citizen['name']." ".$citizen['surname']."</a></td>";

                    for ($i = 5; $i >=0 ; $i--) {
                        $query = "Select * from payment where citizen_id='" . $citizen['citizenid'] . "' and description='Administration Fee for " . date('M, Y', strtotime('-' . $i . ' month')) . "'";

                        $result = $crud->getData($query);
                        if ($result) $tabledata .= "<td class='table-success'>Paid</td>";
                        else $tabledata .= "<td ><a href='../Controller/handlepayment.php?id=". $citizen['citizenid']."&month=".date('M, Y', strtotime('-' . $i . ' month'))."'>
                                                <button class='btn btn-danger' >Confirm</button></a></td>";
                    }
                }
                echo $tabledata . "</table>";
            }

        }

        ?>
    </div>

    </body>
    <?php include_once "footer.html"?>
</html>

