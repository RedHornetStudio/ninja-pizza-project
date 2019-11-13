<?php 

    $errors = ['email' => '', 'title' => '', 'ingridients' => ''];
    $email = '';
    $title = '';
    $ingridients = '';

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
            if(!preg_match("/^[a-zA-Z]+$/", $title)) {
                $errors['title'] = 'invalid title <br/>';
            }
        }

        $ingridients = trim($_POST['ingridients']);
        if(empty($ingridients)) {
            $errors['ingridients'] = 'an ingridients list is required <br/>';
        } else {
            if(!preg_match("/^([a-zA-Z\s]+)(,[a-zA-Z\s]*)*$/", $ingridients)) {
                $errors['ingridients'] = 'invalid ingridients <br/>';
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
            <label for="ingridients">Ingridients (comma separated):</label>
            <br/>
            <input id="ingridients" name="ingridients" type="text" tabindex="3"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)"
                value="<?php echo htmlspecialchars($ingridients) ?>">
            <div class="error" style="margin-bottom:10px;"><?php echo $errors['ingridients']; ?></div>
            <button type="submit" tabindex="4">SUBMIT</button>
        </form>

    <?php include('templates/footer.php'); ?>
</html>