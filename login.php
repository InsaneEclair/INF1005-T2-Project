<?php
include "inc/nav.inc.php";
include "inc/head.inc.php";
?>

<main class="login_container">
    <h1>Member Login</h1>
    <p>
        For new members, please go to the
        <a href="register.php">Registration page</a>.
    </p>
    <form action="process_login.php" method="post">
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
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</main>

<?php
    include "inc/footer.inc.php";
?>       