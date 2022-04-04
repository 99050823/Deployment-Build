<?php

    $submit = $_POST['subButton'];
    $id = $_GET['var'];

    $name = $data['UserName'];

    if ($submit) {
        $name = $_POST['name'];
        $adress = $_POST['adress'];
        $phone = $_POST['phone'];

        updateUser($id, $name, $adress, $phone);
    }
?>

<section>
    <h2>Edit user</h2>

    <form method="post">
        <label for="name">Username : </label>
        <input name="name" type="text" value="<?php echo $name?>" required><br>

        <label for="adress">ZIP code : </label>
        <input name="adress" type="text" pattern="[0-9]{4}[A-Z]{2}" required><br><br>

        <label for="phone">Telephone : </label>
        <input name="phone" type="tel" pattern="[0-9]{10}" required><br>

        <input name="subButton" type="submit" value="EDIT">
    </form>
</section>