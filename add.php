<?php 

    include('config/db_connect.php');

    $errors = ['email' => '', 'title' => '', 'ingredients' => ''];
    $email = '';
    $title = '';
    $ingredients = '';

    if(isset($_POST['email'])) {
        $email = trim($_POST['email']);
        if(empty($email)) {
            $errors['email'] = 'an email is required <br/>';
        } else {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email <br/>';
            }
        }

        $title = trim($_POST['title']);
        if(empty($title)) {
            $errors['title'] = 'a title is required <br/>';
        } else {
            if(!preg_match("/^[a-zA-Z\s]+$/", $title)) {
                $errors['title'] = 'invalid title <br/>';
            }
        }

        $ingredients = trim($_POST['ingredients']);
        if(empty($ingredients)) {
            $errors['ingredients'] = 'an ingredients list is required <br/>';
        } else {
            if(!preg_match("/^([a-zA-Z\s]+)(,[a-zA-Z\s]*)*$/", $ingredients)) {
                $errors['ingredients'] = 'invalid ingredients <br/>';
            }
        }

        $isError = false;
        foreach($errors as $error) {
            if($error != '') {
                $isError = true;
                break;
            }
        }

        if(!$isError) {

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            $sql = "INSERT INTO pizzas (email, title, ingredients) VALUES ('$email', '$title', '$ingredients')";

            if(mysqli_query($conn, $sql)) {
                header("Location: index.php");
            } else {
                echo "Query error: " . mysqli_error($conn);
            }
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
            <input id="email" name="email" type="text" tabindex="1"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)"
                value="<?php echo htmlspecialchars($email) ?>">
            <div class="error"><?php echo $errors['email']; ?></div>
            <label for="title">Pizza Title:</label>
            <br/>
            <input id="title" name="title" type="text" tabindex="2"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)"
                value="<?php echo htmlspecialchars($title) ?>">
            <div class="error"><?php echo $errors['title']; ?></div>
            <label for="ingredients">ingredients (comma separated):</label>
            <br/>
            <input id="ingredients" name="ingredients" type="text" tabindex="3"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)"
                value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="error" style="margin-bottom:10px;"><?php echo $errors['ingredients']; ?></div>
            <button type="submit" tabindex="4">SUBMIT</button>
        </form>

    <?php include('templates/footer.php'); ?>
</html>