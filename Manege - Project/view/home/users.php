<?php

    $submit = $_POST['subButton'];
    $deleteAll = $_POST['deleteAllBttn'];

    if ($submit) {
        $name = $_POST['name'];
        $adress = $_POST['adress'];
        $phone = $_POST['phone'];

        createUser($name, $adress, $phone);
    }

    if ($deleteAll) {
        deleteAllFunc('users', TRUE);
    }
?>

<section>
    <h2>Users</h2>

    <form method="post">
        <label for="name">Username : </label>
        <input name="name" type="text" required><br>

        <label for="adress">ZIP code : </label>
        <input name="adress" type="text" pattern="[0-9]{4}[A-Z]{2}" required><br><br>

        <label for="phone">Telephone : </label>
        <input name="phone" type="tel" pattern="[0-9]{10}" required><br>

        <input name="subButton" type="submit" value="Add User">
    </form>
</section>

<div id="userPanel" class="users-panel">
    <?php

        $count = count($data);
        $number = 1;

        for ($i=0; $i < $count; $i++) { 

            echo "<div class='user-block'>
                <h3>User ".$number."</h3>

                <p> Username : ".$data[$i]['UserName']."</p>
                <p> ZIP code : ".$data[$i]['Adress']."</p>
                <p> Telephone : ".$data[$i]['Telephone']."</p>

                <a href='".URL."home/editUser?var=".$data[$i]['ID']."'>EDIT</a>
                <a href='".URL."home/deleteSinglefunc?var=".$data[$i]['ID']."&table=users&bool=true&user=".$data[$i]['UserName']."'>DELETE</a>
            </div>";

            $number++;
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