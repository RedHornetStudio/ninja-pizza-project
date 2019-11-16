<?php

    $conn = mysqli_connect('localhost', 'redhornet', 'redhornet', 'ninja_pizza');

    if(!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
        <h2>Pizzas!</h2>
        <section class="clearfix">
            <?php foreach($pizzas as $pizza) { ?>
            <div class="col">
                <div class="pizza">
                    <h3><?php echo htmlspecialchars($pizza['title']); ?></h3>
                    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
                    <hr>
                    <button type="button" style="margin-bottom:10px;margin-right:20px;">MORE INFO</button>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>

    <?php include('templates/footer.php'); ?>

</html>