<?php
            
    $countUsers = count($data[0]);
    $countAnimal = count($data[1]);

    $submit = $_POST['subButton'];
 
    if ($submit) {
        $userName = $_POST['username'];
        $animalName = $_POST['animalname'];
        $start = $_POST['time'];
        $amount = $_POST['amount'];

        createRide($userName, $animalName, $start, $amount);
    }
?>

<section>
    <h2>Reservation</h2>

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