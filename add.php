<?php 

    if(isset($_POST['email'])){
        if(empty(trim($_POST['email'])) ||
        empty(trim($_POST['title'])) ||
        empty(trim($_POST['ingridients']))) {
            echo 'Fill in all fields';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

        <h2>Add a Pizza</h2>
        <form action="add.php" method="POST">
            <label for="email">Your Email:</label>
            <br/>
            <input id="email" name="email" type="text" tabindex="1" onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <label for="title">Pizza Title:</label>
            <br/>
            <input id="title" name="title" type="text" tabindex="2" onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <label for="ingridients">Ingridients (comma separated):</label>
            <br/>
            <input id="ingridients" name="ingridients" type="text" tabindex="3" style="margin-bottom:10px;" onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <button type="submit" tabindex="4">SUBMIT</button>
        </form>

    <?php include('templates/footer.php'); ?>
</html>