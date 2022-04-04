<?php
    $deleteAll = $_POST['deleteAllBttn'];

    if ($deleteAll) {
        deleteAllFunc('rides', FALSE);
    }

?>

<h2>Rides : </h2>

<div id="ridesPanel" class="rides-panel">
    <?php
    
        $count = count($data);
        $number = 1;

        if ($count > 0) {
            for ($i=0; $i < $count; $i++) { 
                echo "<div class='rides-block'>
                    <h3>Ride".$number."</h3>

                    <ul>
                        <li>Rider : ".$data[$i]['User']."</li>
                        <li>Horse : ".$data[$i]['Horse']."</li>
                        <br>
                        <li>StartTime : ".$data[$i]['StartTime']."</li>
                        <li>EndTime : ".$data[$i]['EndTime']."</li>
                        <li>Rides : ".$data[$i]['Rides']."x</li>
                        <li>Total : €".$data[$i]['Price']."</li>
                    </ul>

                    <a href='".URL."home/editRide?var=".$data[$i]['ID']."'>EDIT</a>
                    <a href='".URL."home/deleteSinglefunc?var=".$data[$i]['ID']."&table=rides'>DELETE</a>
                </div>";

                $number++;
            }
        } else {
            echo "<h2>No rides available</h2>";
        }   
    ?>

    <?php 
        if ($count > 0) {
            echo "<form method='post'>";
            echo "<input id=\"deleteAllBttn\" name=\"deleteAllBttn\" type=\"submit\" value=\"Delete All\">";
            echo "</form>";
        }
    ?>
</div>