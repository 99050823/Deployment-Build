<?php
    require(ROOT . "model/HomeModel.php");

    //Tab controll
    function index () {
        render('home/index');
    }

    function users () {
        $data = getAllUsers();
        render('home/users', $data);
    }

    function rides () {
        $data = getAllRides();
        render('home/rides', $data);
    }

    function reservation () {
        $dataArr = array();

        $userData = getNamesUsers();
        $animalData = getNamesAnimals();

        array_push($dataArr, $userData, $animalData);

        render('home/reservation', $dataArr);
    }

    function horses () {
        $data = getAllAnimals();
        render('home/horses', $data);
    }

    //User controll
    function createUser ($name, $adress, $phone) {
        addUser($name, $adress, $phone);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    }

    function editUser () {
        $id = $_GET['var'];
        $user = getUser($id);

        render('home/editUser', $user);
    }

    function updateUser ($id, $name, $adress, $phone) {
        editUserRecord($id, $name, $adress, $phone);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    }

    //Rides controll
    function createRide ($user, $horse, $start, $amount) {
        // Time function

        $startTime = strtotime($start);
        $endTime = $startTime + 60*60 * $amount;

        $startTime = date("H:i", $startTime);    
        $endTime = date("H:i", $endTime);

        //Total Price 
        $price = $amount * 55;

        addRide($user, $horse, $startTime, $endTime, $amount, $price);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    }
    
    function editRide () {
        $dataArr = array();

        $userData = getNamesUsers();
        $animalData = getNamesAnimals();

        array_push($dataArr, $userData, $animalData);

        render('home/editRide', $dataArr);
    }

    function updateRide ($id, $user, $horse, $time) {
        editRideRecord($id, $user, $horse, $time);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    }

    //Delete All 
    function deleteAllfunc ($table, $check) {

        if ($check == TRUE) {
            deleteAll('rides');
        }
        
        deleteAll($table);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    } 

    //Delete single 
    function deleteSinglefunc () {
        $id = $_GET['var'];
        $table = $_GET['table'];
        $check = $_GET['bool'];
        $user = $_GET['user'];

        if ($check == 'true') {

            $data = getAllRides();
            $count = count($data);

            if ($count >= 0) {
                deleteSingleRide($user);
            } 
        }

        deleteSingle($id, $table);
        header("Location:/Blok-4/Manege%20-%20Project/home");
    }

?>