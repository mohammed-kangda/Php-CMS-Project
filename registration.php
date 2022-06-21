<!-- Database -->
<?php  include "includes/_db.php"; ?>

<!-- header -->
<?php  include "includes/_header.php"; ?>


<?php 
    
    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        // Protecting our site from hacker
        $username = mysqli_real_escape_string($connection,$username);
        $email    = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);

        $query = "SELECT randsalt FROM `users`";
        $select_randsalt_query = mysqli_query($connection,$query);

        if(!$select_randsalt_query){
            die("QUERY FAILED : " . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randsalt'];
        $password = crypt($password,$salt);

        if(!(empty($username)) && !(empty($email)) && !(empty($password))){

            $query = "INSERT INTO `users`(username,user_password,user_email,user_role)
                      VALUES('$username','$password','$email','Developer')";
            $register_user_query = mysqli_query($connection,$query);
            
            if(!$register_user_query){
                die("QUERY FAILED : " . mysqli_error($connection));
            }

            $message = "Your Account Has Been Successfully Created!";

        }else{

            $message = "<h5 class='text-center'>Enter Valid Data</h5>";

        }
       
    }else{
        $message = "";
    }
    
?>

    <!-- Navigation -->
    <?php  include "includes/_navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <h6 class="text-center"><?php echo $message; ?></h6>
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>
                        
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>        
        
        <!-- Footer -->
        <?php include "includes/_footer.php";?>
    </div>
