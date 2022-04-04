<?php

    $countUsers = count($data[0]);
    $countAnimal = count($data[1]);

    $submit = $_POST['subButton'];
    $id = $_GET['var'];

    if ($submit) {
        $user = $_POST['username'];
        $horse = $_POST['animalname'];
        $time = $_POST['time'];

        updateRide($id, $user, $horse, $time);
    }
?>

<section>
    <h2>Edit Ride</h2>

    <form method="post">
        <label for="username">Select User : </label>
        <select name="username">
            <?php  
                for ($i=0; $i < $countUsers; $i++) { 
                    echo "<option>".$data[0][$i]["UserName"]."</option>";
                }
            ?>
        </select><br>

        <label for="animalname">Select Horse : </label>
        <select name="animalname">
            <?php  
                for ($i=0; $i < $countAnimal; $i++) { 
                    echo "<option>".$data[1][$i]["AnimalName"]."</option>";
                }
            ?>
        </select><br>

        <label for="">Start Time : </label>
        <input type="time" name="time" min="08:00" max="18:00"><br>

        <label for="amount">Rides : </label>
        <input type="number" name="amount" min="0" max="4"><br>

        <input name="subButton" type="submit" value="Submit">
    </form>
</section>