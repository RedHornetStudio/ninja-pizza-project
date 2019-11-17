<?php

    include('config/db_connect.php');

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn)

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
        <h2>Pizzas!</h2>
        <section class="clearfix">
            <?php foreach($pizzas as $pizza) { ?>
            <div class="col">
                <div class="pizza">
                    <img src="img/pizza.svg" alt="pizza" class="pizza_image">
                    <h3><?php echo htmlspecialchars($pizza['title']); ?></h3>
                    <ul>
                        <?php foreach(explode(',', $pizza['ingredients']) as $ingredient) { ?>
                            <?php if(!empty(trim($ingredient))) { ?>
                                <li><?php echo htmlspecialchars($ingredient); ?> </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <hr>
                    <a href="details.php?id=<?php echo $pizza['id']; ?>" style="text-decoration:none;">
                        <button type="button" style="margin-bottom:10px;margin-right:20px;">MORE INFO</button>
                    </a>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>

    <?php include('templates/footer.php'); ?>

</html>