<!-- header -->
<?php include 'includes/admin_header.php' ?>

    <div id="wrapper">
    
    <!-- Navigation -->
    <?php include 'includes/admin_navigation.php' ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome To Admin
                            <small>Author</small>
                        </h1>    
                           
                        <div class="col-xs-6">
                           
                           <!-- Add Categories button Functionality -->
                           <?php 
                               
                                insert_categories();
                               
                           ?>
                           <!-- Add Category Form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label><br>
                                    <input type="text" class="form-control" name="cat_title" id="">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" id="" value="Add Category">
                                </div>
                            </form>

                            <!-- Update Category Form -->    
                            <?php  
                               if(isset($_GET['edit'])){

                                   $cat_id = $_GET['edit'];
                                   include 'includes/update_categories.php';

                               }
                            ?>

                        </div> 
                         
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Displaying data of the categories table in tbl -->
                                    <?php

                                        findAllCategories();  

                                    ?>

                                    <!-- Delete Categories -->
                                   <?php 
                                       
                                       delete_categories();
                                       
                                   ?>

                                </tbody>
                            </table>
                        </div>
                       

                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <!-- footer -->
    <?php include 'includes/admin_footer.php' ?>