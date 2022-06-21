<?php session_start(); ?>

<?php 

    if(isset($_POST['login'])){

       // connecting database :

       include '_db.php';

       // storing in variable :

       $username = $_POST['username'];
       $password = $_POST['password'];

       // cleaning data

       $username = mysqli_real_escape_string($connection,$username);
       $password = mysqli_real_escape_string($connection,$password);

       // Sql Query to check username & password entered by user is same as DB :

       $query = "SELECT * FROM `users` 
                 WHERE username = '$username'
                 AND user_password = $password";

       $select_user_query = mysqli_query($connection,$query); 
       
       // checking weather query has error or not :

       if(!$select_user_query){
           die('QUERY FAILED : ' .mysqli_error($connection));
       }

       while($row = mysqli_fetch_array($select_user_query)){
           $db_user_id = $row['user_id'];
           $db_username = $row['username'];
           $db_user_password = $row['user_password'];
           $db_user_firstname = $row['user_firstname'];
           $db_user_lastname = $row['user_lastname'];
           $db_user_role = $row['user_role'];
       }

       if($username === $db_username && $password === $db_user_password){
            $_SESSION['username'] = $db_username;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            header('Location: ../admin');
       }else{
           header('Location: ../index.php');
       }

    }

?>