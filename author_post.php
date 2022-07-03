<!-- Starting Session -->
<?php session_start(); ?>

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
                
 
                <?php 
                     echo '<h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                          </h1>';
                          
                     if((isset($_GET['p_id'])) && (isset($_GET['author']))){
                        $author_name = $_GET['author'];
                        $the_post_id = $_GET['p_id'];


                        $query = "SELECT * FROM `posts` WHERE post_author = '$author_name'";
                        $select_author_cat_queries = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_author_cat_queries)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                            
                            echo'<p class="lead">
                                    All Post By '.$post_author.'
                                </p>
                               <!-- First Blog Post -->
                                <h2>
                                    <a href="">'.$post_title.'</a>
                                </h2>
                                <p><span class="glyphicon glyphicon-time"></span> '.$post_date.'</p>
                                <hr>
                                <img class="img-responsive" width="390px" height="130px" src="images/'.$post_image.'" alt="'.$post_image.'">
                                <hr>
                                <p>'.$post_content.'</p>';
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

