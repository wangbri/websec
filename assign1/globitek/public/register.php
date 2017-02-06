<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

  if(is_post_request()) {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';

    if (is_blank($_POST['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($_POST['first_name'] , ['min' => 2, 'max' => 255])) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($_POST['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($_POST['last_name'] , ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($_POST['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($_POST['email'] , ['min' => 2, 'max' =>255])) {
      $errors[] = "Email must be between 2 and 255 characters.";     
    }

    if (!has_valid_email_format($_POST['email'])) {
      $errors[] = "Email must be valid";
    }

    if (is_blank($_POST['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($_POST['username'] , ['min' => 8, 'max' => 255])) {
      $errors[] = "Username must be between 8 and 255 characters.";
    }

    echo display_errors($errors);
  }
    
    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database
    if (empty($errors) && is_post_request()) {
       date_default_timezone_set('America/Chicago');
       // Write SQL INSERT statement
       $first_name = mysqli_real_escape_string($db, $first_name);
       $last_name = mysqli_real_escape_string($db, $last_name);
       $email = mysqli_real_escape_string($db, $email);
       $username = mysqli_real_escape_string($db, $username);
       $d = mysqli_real_escape_string($db, $d);

       $d = date("Y-m-d H:i:s"); 
       $sql = "INSERT INTO users (first_name, last_name, email, username, created_at) VALUES ('$first_name', '$last_name', '$email', '$username','$d');";

       // For INSERT statments, $result is just true/false
       $result = db_query($db, $sql);
       if($result) {
         db_close($db);
         redirect_to("registration_success.php");
         // TODO redirect user to success page

       } else {
         // The SQL INSERT statement failed.
         // Just show the error, not the form
         echo db_error($db);
         db_close($db);
         exit;
       }
    }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
  ?>

  <form action="./register.php" method="post">
    First name:<br>
    <input type="text" name="first_name" value="<?php echo h($first_name); ?>" /><br>
    Last name:<br>
    <input type="text" name="last_name" value="<?php echo h($last_name); ?>" /><br>
    Email:<br>
    <input type="text" name="email" value="<?php echo h($email); ?>" /><br>
    Username:<br>
    <input type="text" name="username" value="<?php echo h($username); ?>" \><br><br>
    <input type="submit" value="Submit">
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
