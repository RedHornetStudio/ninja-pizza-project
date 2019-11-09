<?php 

    if(isset($_POST['email'])) {
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingridients'];
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

        <h2>Add a Pizza</h2>
        <form action="add.php" method="POST">
            <label for="email">Your Email:</label>
            <br/>
            <input id="email" name="email" type="text">
            <label for="title">Pizza Title:</label>
            <br/>
            <input id="title" name="title" type="text">
            <label for="ingridients">Ingridients (comma separated):</label>
            <br/>
            <input id="ingridients" name="ingridients" type="text">
            <button type="submit">SUBMIT</button>
        </form>

    <?php include('templates/footer.php'); ?>
    
</html>