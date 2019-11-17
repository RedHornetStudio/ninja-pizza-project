<?php

    $pizza = null;

    include("config/db_connect.php");

    if(isset($_POST['id_to_delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
        if(mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }

    if(isset($_GET['id'])) {

        $id = mysqli_real_escape_string($conn, trim($_GET['id']));

        $sql = "SELECT * FROM pizzas WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <?php if($pizza) { ?>
        <div class="center">
            <h2><?php echo htmlspecialchars($pizza['title']); ?></h2>
            <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo htmlspecialchars($pizza['created_at']); ?></p>
            <h3>Ingredinets: </h3>
            <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
        </div>
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo htmlspecialchars($pizza['id']) ?>">
            <button type="submit">DELETE</button>
        </form>
    <?php } else { ?>
        <h2>No such pizza exists!</h2>
    <?php } ?>

    <?php include('templates/footer.php'); ?>

</html>