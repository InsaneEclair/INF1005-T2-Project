<?php
include "inc/nav.inc.php";
include "inc/head.inc.php";
?>

<main class="register_container">
    <h1>Member Registration</h1>
    <p>
        For existing members, please go to the
        <a href="login.php">Sign In page</a>.
    </p>
    <form action="process_register.php" method="post">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name:</label>
            <input required maxlength="45" type="text" id="fname" name="fname" 
                placeholder="Enter first name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input required maxlength="45" type="text" id="lname" name="lname" 
                placeholder="Enter last name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input required maxlength="45" type="email" id="email" name="email" 
                placeholder="Enter email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input required type="password" id="pwd" name="pwd" 
                placeholder="Enter password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pwd_confirm" class="form-label">Confirm Password:</label>
            <input required type="password" id="pwd_confirm" name="pwd_confirm" 
                placeholder="Confirm password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php
    include "inc/footer.inc.php";
?>       