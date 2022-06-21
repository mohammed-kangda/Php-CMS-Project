<!-- Database -->
<?php include "includes/_db.php" ?>

<!-- header -->
<?php include "includes/_header.php" ?>

    <!-- Navigation -->
    <?php include "includes/_navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
 
               <!-- Creating a Search Bar -->
               <?php 

                    if(isset($_POST['submit'])){

                        $search =  $_POST['search'];

                        $query = "SELECT * FROM `posts` WHERE post_tags LIKE '%$search%'";
                        $search_query = mysqli_query($connection,$query);

                        if(!$search_query){
                            die('Query Failed' . mysqli_error($connection));
                        }

                        $count = mysqli_num_rows($search_query);

                        if($count == 0){
                            echo'  <div class="jumbotron jumbotron-fluid pb-5">
                            <div class="container">
                                <p class="display-4">No Results Found</p>
                                <p class="lead">Suggestions:</p>
                                <ul>
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords. </li>
                                </ul>
                            </div>
                        </div>';
                        }else{

                            while($row = mysqli_fetch_assoc($search_query)){
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];

                                
                                echo'<h1 class="page-header">
                                        Page Heading
                                        <small>Secondary Text</small>
                                    </h1>

                                    <!-- First Blog Post -->
                                    <h2>
                                        <a href="#">'.$post_title.'</a>
                                    </h2>
                                    <p class="lead">
                                        by <a href="index.php">'.$post_author.'</a>
                                    </p>
                                    <p><span class="glyphicon glyphicon-time"></span> '.$post_date.'</p>
                                    <hr>
                                    <img width="390px" height="130px" class="img-responsive" src="images/'.$post_image.'" alt="'.$post_image.'">
                                    <hr>
                                    <p>'.$post_content.'</p>
                                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
                                }   
                        }
                    }
                        
                 ?>              
                   <hr> 
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/_sidebar.php" ?>


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/_footer.php" ?>

    
