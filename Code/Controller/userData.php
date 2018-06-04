<?php
session_start();
require_once 'CRUD.php';
require_once '../DB/dbHelper.php';
require_once '../Model/admin.php';
require_once '../Model/citizen.php';
require_once '../Model/employee.php';

if(!isset($_SESSION['login_user'])) header("Location:../Controller/logout.php");
else {

    $crud = new crud();
    $id = $_SESSION['login_user'];
    $type = $_SESSION['user_type'];


    if ($type == 1) {

        $userdata = $crud->getData("Select * from citizen where citizenid='".$id."'")[0];
        $user = new Citizen($userdata['name'], $userdata['admin_id'], $userdata['surname'], $userdata['address'], $userdata['password'], $userdata['phone'],
            $userdata['email'], $userdata['nrMembers']);
//        $foto = '//Foto/qytetar.png';
    }
    if ($type == 2) {

        $userdata = $crud->getData("Select * from admin where adminid='".$id."'")[0];
        $user = new Admin($userdata['name'], $userdata['surname'], $userdata['address'], $userdata['password'], $userdata['phone'],
            $userdata['email']);
//        $foto = '//Foto/admin.jpg';
    }
    if ($type == 3) {
        $userdata = $crud->getData("Select * from employee where munid='".$id."'")[0];
        $user = new Employee($userdata['name'], $userdata['surname'], $userdata['password'], $userdata['email'], $userdata['department']);
//
//        $foto = '//Foto/bashki.jpg';
    }
}