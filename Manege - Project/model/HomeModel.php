<?php

    //SELECT FROM 
    function getAllUsers() {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();

        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
        $result = $stmt->fetchAll();
        
        return $result;
    }

    function getNamesUsers() {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("SELECT UserName FROM users");
            $stmt->execute();
        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
        $result = $stmt->fetchAll();
        
        return $result;
    }

    function getUser($id) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE id=$id");
            $stmt->execute();
        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
        $result = $stmt->fetch();
        
        return $result;
    }

    function getNamesAnimals() {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("SELECT AnimalName FROM animals");
            $stmt->execute();

        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
        $result = $stmt->fetchAll();
        
        return $result;
    }

    function getAllRides() {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("SELECT * FROM rides");
            $stmt->execute();
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
        $result = $stmt->fetchAll();

        return $result;
    }

    //END SELECT FROM
    //-----------------------------------------------------

    //UPDATE
    function editUserRecord($id, $name, $adress, $phone) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("UPDATE users SET UserName='".$name."', Adress='".$adress."', Telephone='".$phone."' WHERE ID='".$id."'");
            $stmt->execute();

        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }

    function editRideRecord($id, $user, $horse, $time) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("UPDATE rides SET User='".$user."', Horse='".$horse."', Time='".$time."' WHERE ID='".$id."'");
            $stmt->execute();
        } 
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }

    //END UPDATE
    //-----------------------------------------------------

    //INSERT INTO 
    function addUser ($name, $adress, $phone) {
        
        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("INSERT INTO users (UserName, Adress, Telephone) VALUES ('".$name."', '".$adress."', '".$phone."')");
            $stmt->execute();
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }

    function addRide ($user, $horse, $startTime, $endTime, $rideAmount, $total) {

        try {
            $conn = openDatabaseConnection();

            $stmt = $conn->prepare("INSERT INTO rides (User, Horse, StartTime, EndTime, Rides, Price) 
            VALUES ('".$user."', '".$horse."', '".$startTime."', '".$endTime."', '".$rideAmount."', '".$total."')");

            $stmt->execute();
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }
    //END INSERT INTO
    //-----------------------------------------------------

    //DELETE 
    function deleteAll($table) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("DELETE FROM $table");
            $stmt->execute();
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }

    function deleteSingle ($id, $table) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("DELETE FROM $table WHERE ID='".$id."'");
            $stmt->execute();
        }
        catch(Exception $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }

    function deleteSingleRide ($name) {

        try {
            $conn = openDatabaseConnection();
            $stmt = $conn->prepare("DELETE FROM rides WHERE User='".$name."'");
            $stmt->execute();
        }
        catch(Exception $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;
    }
    //END DELETE
    //-----------------------------------------------------
?>