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
                   
                   if(isset($_GET['category'])){
                       $post_category_id = $_GET['category'];
                   }
        
                   $query = "SELECT * FROM `posts` WHERE post_category_id = '$post_category_id'";
                   $select_all_cat_queries = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_cat_queries)){
                        $post_id = $row['post_id'];
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
                                <a href="post.php?p_id='.$post_id.'">'.$post_title.'</a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php">'.$post_author.'</a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> '.$post_date.'</p>
                            <hr>
                            <img class="img-responsive" width="390px" height="130px" src="images/'.$post_image.'" alt="'.$post_image.'">
                            <hr>
                            <p>'.substr($post_content,0,100).'....</p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
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

    
