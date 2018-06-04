<?php
include '../Controller/userData.php';
include_once '../Controller/CRUD.php';
include_once '../Model/admin.php';
include_once '../Model/employee.php';
include_once '../Model/citizen.php';

$profile = "active";
$createrequest = "";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$payments = "";
$admin = "";
$viewcitizen = "";


$hasadmin=0;

$adminname="";
$adminsurname="";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Profile</title>


    <?php include_once "navbar.php";

    $crud= new crud();
    if ((!isset($_GET['id']) || !isset($_GET['type']))) echo "Wrong url";
//        header('Location:../Controller/logout.php');
    else {
        if ($_GET['type'] == 'citizen') {

            $query = "Select * from citizen where citizen.citizenid = '" . $_GET['id'] . "'";

//            $query = "Select citizen.*, admin.name as adminname, admin.surname as adminsurname from citizen,admin where citizen.citizenid = '" . $_SESSION['login_user'] . "' and admin.adminid = citizen.admin_id";


            $data = $crud->getData($query)[0];

            if ($data['admin_id']==0){
                $adminname = "Awaiting";
                $adminsurname = "Confirmation";
            }
            else{
                $query = "Select * from admin where adminid = '" . $data['admin_id'] . "'";
                $admindata = $crud->getData($query)[0];
                $hasadmin=1;
                $adminname = $admindata['name'];
                $adminsurname = $admindata['surname'];


            }

            $profile =
                new Citizen($data['name'], $data['admin_id'],
                    $data['surname'], $data['address'], $data['password'],
                    $data['phone'], $data['email'], $data['nrMembers']);

        }

        elseif ($_GET['type'] == 'admin') {
            $query = "Select * from admin where admin.adminid = '" . $_GET['id'] . "'";
            $data = $crud->getData($query)[0];
            $profile =
                new Admin($data['name'],
                    $data['surname'], $data['address'], $data['password'],
                    $data['phone'], $data['email']);
        }

        elseif ($_GET['type'] == 'munip') {
            $query = "Select * from employee where munid = '" . $_GET['id'] . "'";
            $data = $crud->getData($query)[0];
            $profile =
                new Employee($data['name'],
                    $data['surname'], $data['password'],
                    $data['email'], $data['department']);

        }
    }

    ?>

    <div id="content">
        <center><h3>Displaying Information</h3></center>
<br>
        <div class="card border-info bg-light mb-3" style="width: 18rem; margin: auto">
            <img class="card-img-top" height="250"
                 src="<?php if ($_GET['type']=="citizen")
                            echo 'Foto/qytetar.png';
                        if($_GET['type']=="admin")
                            echo 'Foto/admin.png' ;
                        if($_GET['type']=="munip")
                            echo 'Foto/bashki.jpeg';
                     ?>" alt="Card image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $profile->getName()." ".$profile->getSurname() ?></h5>
                <?php if($_GET['type']!="munip") echo '<p class="card-text">Address:'.$profile->getAddress().'</p>';?>

            <ul class="list-group list-group-flush">
                <?php if($_GET['type']!="munip") echo '<li class="list-group-item">Cel: '.$profile->getPhone().'</li>';?>
                <?php if($_GET['type']=="munip") echo '<li class="list-group-item">Department: '.$profile->getDepartment().'</li>';?>
                <li class="list-group-item">Email: <?php echo $profile->getEmail()?> </li>
                <?php if ($_GET['type']=="citizen") {
                    echo "<li class='list-group-item'>Family Members: ".$profile->getNrMembers()."</li>";
                }
                if($_GET['type']=="citizen"){
                    echo'<li class="list-group-item">';

                    if($hasadmin==1) echo '<a href="profile.php?id='.$profile->getAdminId().'&type=admin" class="card-link">Administrator: '.$adminname.' '.$adminsurname.'</a></li>';
                    else echo '<span class="card-link">Administrator: '.$adminname.' '.$adminsurname.'</span></li>';
                }

                ?>
            </ul>
            </div>
        </div>



    </div>

    </body><?php include_once "footer.html"?>
</html>
