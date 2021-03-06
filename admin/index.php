<!--header include -->
<?php include "../includes/header.php"; ?>
<?php session_start(); ?>
<?php include "includes/admin_navigation.php";?>


<?php
global $message, $user_name, $user_pass, $user_id, $name ;
if (isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=mysqli_real_escape_string($connection, $username);
    $password=mysqli_real_escape_string($connection, $password);

    $query="SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $login=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_array($login)){
        $user_id=$row['user_id'];
        $user_name=$row['username'];
        $user_pass=$row['password'];
        $name=$row['name'];

    }
    if (($username === $user_name) && ($password === $user_pass)){
        $_SESSION['user_id']=$user_id;
        $_SESSION['name']=$name;
        $_SESSION['username']=$user_name;
        $_SESSION['password']=$user_pass;

        header("Location: dashboard.php");
    }
    else if ( empty($username) || empty($password) ){
        $message = "Field cannot be empty";
    }
    else if ( ($username !== $user_name) || ($password !== $user_pass) ){
        $message = "Incorrect Username or Password";
    }

    else{
        $message = die("QUERY FAILED". mysqli_error($connection));
    }

}

?>
<div class="container justify-content-center mt-5 p-5 border">
    <div class="row">
        <div class="col-md-6 offset-md-3 border shadow ">
        <h1 class="display-3 text-center mt-3 mb-1">SIGN IN</h1>
        <form action="" class="p-5" method="post">
            <div class="form-group mb-4">
                <input type="text" name="username" class="form-control" placeholder="Enter Your Username Here" id="">
            </div>
            <div class="form-group mb-4">
                <input type="password" name="password" class="form-control" placeholder="Enter Your Password here" id="">
            </div>
            <p class="text-danger bg-dark"><?php echo $message; ?></p>
            <div class="form-group">
                <input type="submit" name="submit" value="Sign in" class="btn btn-info btn-block">
            </div>
        </form>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>