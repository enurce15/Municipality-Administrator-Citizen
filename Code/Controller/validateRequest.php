<?php
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
include_once 'validateData.php';
include_once 'userData.php';

if (isset($_SESSION['login_user'])){

    if (isset($_POST['submit'])){

        $target_dir = "../Documents/";

        $errorSubject = "";
        $errorDescription = "";
        $crud = new crud();

        $subject =$crud->escape_string($_POST['type']);
        $description = $crud->escape_string($_POST['description']);

        if($subject==1) {
            $subject="Reconstruction Permit";
            $target_dir.= "ReconstructionPermits/";
            if ($_FILES['pronesi']['type']!="application/pdf" || $_FILES['projekt']['type']!="application/pdf") header('Location:../View/createrequest.php?type=wrong');
        }
        elseif ($subject==2) {
             $subject="Parking Permit";
            $target_dir.= "ParkingPermits/";
            if ($_FILES['vlagje']['type']!="application/pdf" || $_FILES['certifikate']['type']!="application/pdf" ||
                $_FILES['leje']['type']!="application/pdf") header('Location:../View/createrequest.php?type=wrong');
        }
        elseif ($subject==3) {
            $subject="Other(To Building Administrator)";
        }


        if (strlen($subject)>0 && strlen($description)>0){

            if ($_SESSION['user_type']==1){
                //insert request in DB

                if($subject=="Reconstruction Permit") {
                    if (move_uploaded_file($_FILES['pronesi']['tmp_name'], $target_dir . basename( $_FILES['pronesi']['name']) )
                        && move_uploaded_file($_FILES['projekt']['tmp_name'], $target_dir . basename( $_FILES['projekt']['name']) ))
                    {
                        $query = "Insert into request set 
                        citizen_id ='" . $_SESSION['login_user'] . "', admin_id = '0',
                        documents='".basename( $_FILES['pronesi']['name']).",". basename( $_FILES['projekt']['name'])."',
                         type = '$subject' ,status='Pending', description ='$description',date =now()";

                        $execute = $crud->execute($query);
                        if ($execute) {
                            header("Location:../View/showrequests.php");
                        } else header("Location:../View/createrequest.php?case=wrong");
                    }
                    else echo "doc upload failed";
                }


                else if($subject=="Parking Permit") {
                    if (move_uploaded_file($_FILES['vlagje']['tmp_name'], $target_dir . basename( $_FILES['vlagje']['name']) )
                        && move_uploaded_file($_FILES['leje']['tmp_name'], $target_dir . basename( $_FILES['leje']['name']) )
                        && move_uploaded_file($_FILES['certifikate']['tmp_name'], $target_dir . basename( $_FILES['certifikate']['name']) ))
                    {
                        $query = "Insert into request set 
                        citizen_id ='" . $_SESSION['login_user'] . "', admin_id = '0',
                        documents='".basename( $_FILES['vlagje']['name']).",". basename( $_FILES['leje']['name']).
                            ",". basename( $_FILES['certifikate']['name'])."',
                         type = '$subject' ,status='Pending', description ='$description',date = now() ";

                        $execute = $crud->execute($query);
                        if ($execute) {
                            header("Location:../View/showrequests.php");
                        } else header("Location:../View/createrequest.php");
                    }
                    else echo "doc upload failed";
                }


            }
            elseif ($_SESSION['user_type']==2){

                if($subject=="Reconstruction Permit") {
                    if (move_uploaded_file($_FILES['pronesi']['tmp_name'], $target_dir . basename( $_FILES['pronesi']['name']) )
                        && move_uploaded_file($_FILES['projekt']['tmp_name'], $target_dir . basename( $_FILES['projekt']['name']) ))
                    {
                        $query = "Insert into request set 
                        citizen_id ='0', admin_id = '" . $_SESSION['login_user'] . "',
                        documents='". basename( $_FILES['pronesi']['name']).",". basename( $_FILES['projekt']['name'])."',
                         type = '$subject' ,status='Pending', description ='$description',date = now() ";

                        $execute = $crud->execute($query);
                        if ($execute) {
                            header("Location:../View/showrequests.php");
                        } else header("Location:../View/createrequest.php");
                    }
                    else echo "doc upload failed";
                }


                else if($subject=="Parking Permit") {
                    if (move_uploaded_file($_FILES['vlagje']['tmp_name'], $target_dir . basename( $_FILES['vlagje']['name']) )
                        && move_uploaded_file($_FILES['leje']['tmp_name'], $target_dir . basename( $_FILES['leje']['name']) )
                        && move_uploaded_file($_FILES['certifikate']['tmp_name'], $target_dir . basename( $_FILES['certifikate']['name']) ))
                    {
                        $query = "Insert into request set 
                        citizen_id ='0', admin_id = '" .  $_SESSION['login_user']  . "',
                        documents='". basename( $_FILES['vlagje']['name']).",". basename( $_FILES['leje']['name']).
                            ",".basename( $_FILES['certifikate']['name'])."',
                         type = '$subject' ,status='Pending', description ='$description',date = now()";

                        $execute = $crud->execute($query);
                        if ($execute) {
                            header("Location:../View/showrequests.php");
                        } else header("Location:../View/createrequest.php");
                    }
                    else echo "doc upload failed";
                }


            }
        }

        // redirect to create complaint with the appropriate message
        else header("Location:../View/createrequest.php?case=wrong");

    }

}
//if session is not set
else header("Location:logout.php");
