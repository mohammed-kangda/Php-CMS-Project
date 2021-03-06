<!-- Check Query -->
<?php 
    
    function confirmQuery($result){

        global $connection;

        if(!$result){
            die('QUERY FAILED' .mysqli_error($connection));
        }

    }
    
?> 
 
 

<!-- Add Categories button Functionality -->
<?php 
    
    function insert_categories(){

        global $connection;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];
        
            if($cat_title == "" || empty($cat_title)){
                echo 'This Field Should Not Be Empty!';
            }else{
                
                $query = "INSERT INTO `categories`(cat_title)
                        VALUES('{$cat_title}')";

                $create_category_query = mysqli_query($connection,$query);
                
                if(!$create_category_query){
                    die('QUERY FAILED ' . mysqli_error($connection));
                }
            }

        }
    }

?>


<!-- Displaying data of the categories table in tbl -->
<?php 
    
    function findAllCategories(){

        global $connection;

        $query = "SELECT * FROM `categories`";
        $select_categories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo '<tr>';
            echo '<td>'.$cat_id.'</td>';
            echo '<td>'.$cat_title.'</td>';
            echo '<td><a href="categories.php?delete='.$cat_id.'">Delete</a></td>';
            echo '<td><a href="categories.php?edit='.$cat_id.'">Edit</a></td>';
            echo '</tr>';
        }
                         
    }
    
?>


<!-- Delete Categories -->
<?php 
    
    function delete_categories(){

        global $connection;

        if(isset($_GET['delete'])){

            $the_cat_id = $_GET['delete'];

            $query = "DELETE FROM `categories`
                      WHERE cat_id = '$the_cat_id'";
            $delete_query = mysqli_query($connection,$query);
            
            header('Location: categories.php');


         }
    }
    
?>


<!-- Form Submission Issue -->
<?php 
    
    function redirect($location){
        return header("'Location:$location'");
        header('Location: posts.php');
    }
    
?>