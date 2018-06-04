<?php require_once "../Controller/userData.php";

$usertype="";
if ($_SESSION['user_type']==1) $usertype="citizen";
elseif ($_SESSION['user_type']==2) $usertype="admin";
elseif ($_SESSION['user_type']==3) $usertype="munip";
?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="Foto/icon.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    @media screen and (min-width : 0px) and (max-width :759px)
    {
        #content{
            width: 100%; min-height: 95vh; margin: auto; background-color: white; padding: 20px;
        }
    }

    @media screen and (min-width: 760px){
        #content{
            width: 750px; min-height: 95vh; margin: auto; background-color: white; padding: 20px;
        }
    }

    #payments {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        width: 100%;
        margin: auto;
    }

    #payments td {
        border: 2px solid white;
        padding: 8px;
        text-align: center;
    }

    #payments tr:nth-child(even){background-color: #f2f2f2;}

    #payments tr:hover {background-color: #ddd;}

    #payments th {
        padding-top: 6px;
        padding-bottom: 6px;
        text-align: center;
        background-color: #4c6791;
        color: white;
        border: 2px solid white;
    }
</style>

</head>
<body style="background-color:#eee">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand">
            <img src="Foto/logo.png" width="40" height="30" class="d-inline-block align-top" alt="logo">
            Bashki Administrator Qytetar</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php echo $profile?>">
                <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['login_user']."&type=".$usertype ?>">Profile </a>
            </li>
            <?php if ($_SESSION['user_type']!=3){
            echo'<li class="nav-item '.$createrequest.'">
                <a class="nav-link" href="createrequest.php">Create Request </a>
            </li>';}
            ?>
            <li class="nav-item <?php echo $showrequest?>">
                <a class="nav-link" href="showrequests.php">Show Requests</a>
            </li>
            <?php if ($_SESSION['user_type']!=3){
            echo'
            <li class="nav-item '.$createcomplaint.'">
                <a class="nav-link" href="createcomplaint.php">Create Complaint</a>
            </li>';}?>
            <li class="nav-item <?php echo $showcomplaints?>">
                <a class="nav-link" href="showcomplaints.php">Show Complaints </a>
            </li>
            <?php if ($_SESSION['user_type']!=3){
            echo'
            <li class="nav-item '.$payments.'">
                <a class="nav-link" href="payments.php">Payments</a>
            </li>';}?>
            <?php if($_SESSION['user_type']==2)
                echo'<li class="nav-item '.$viewcitizen.'">
                <a class="nav-link" href="viewCitizens.php">My Citizens</a>
            </li>'?>
            <?php if($_SESSION['user_type']==1 && $user->getAdminId()!='0')
                echo'<li class="nav-item '.$viewcitizen.'">
                <a class="nav-link '.$admin.'" href="adminProfile.php?id='.$user->getAdminId().'">Administrator</a>
            </li>';?>
        </ul>



        <div class="btn-group">
            <button type="button" class="btn btn-light" onclick="location.href = 'profile.php?id=<?php echo $_SESSION['login_user']."&type=".$usertype ?>'">
                <?php echo $user->getName()." ".$user->getSurname()?></button>
            <button type="button" class="btn  btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu  dropdown-menu-right">
            <?php if ($_SESSION['user_type']!=3){
                echo'
            
                <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                <div class="dropdown-divider"></div>';}?>
                <a class="dropdown-item" href="../Controller/logout.php">Log Out</a>
            </div>
        </div>
    </div>
</nav>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

