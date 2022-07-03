<?php 
    
    if(isset($_POST['checkBoxArray'])){

        foreach($_POST['checkBoxArray'] as $postValueId){
        
            $bulk_options = $_POST['bulk_options'];
            
            switch ($bulk_options) {
                case 'published':
                    $query = "UPDATE posts SET post_status = '$bulk_options'
                              WHERE post_id = $postValueId";

                    $update_to_published_status = mysqli_query($connection,$query);

                    confirmQuery($update_to_published_status);          
                    break;


                case 'draft':
                    $query = "UPDATE posts SET post_status = '$bulk_options'
                              WHERE post_id = $postValueId";

                    $update_to_draft_status = mysqli_query($connection,$query);
                    confirmQuery($update_to_draft_status);
                    break;


                case 'delete':
                    $query = "DELETE FROM posts 
                              WHERE post_id = $postValueId";

                    $update_to_delete_status = mysqli_query($connection,$query);
                    confirmQuery($update_to_delete_status);


                case 'clone':
                    $query = "SELECT * FROM posts 
                              WHERE post_id = $postValueId";

                    $update_to_clone_status = mysqli_query($connection,$query);
                    confirmQuery($update_to_clone_status); 
                    while($row = mysqli_fetch_array($update_to_clone_status)){
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];

                    } 
                    
                    $query = "INSERT INTO `posts`(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)
                              VALUES('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";

                    $create_post_query = mysqli_query($connection,$query);

                    confirmQuery($create_post_query);

                default:
                    # code...
                    break;
            }
        }
    }
    
?>

<form action="" method="POST">
    <div id="bulkOptionContainer" style="padding-bottom: 20px;
    padding-left: 0;" class="col-xs-4">
        <select name="bulk_options" id="" class="form-control">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="clone">Clone</option>
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th id="selectAllBoxes"><input type="checkbox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View Post</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            <!-- Displaying the content of the Posts Table -->
            <?php 
                
                $query = "SELECT * FROM `posts` ORDER BY post_id DESC";
                $select_posts = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_posts)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];

                    echo '<tr>
                            <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="'.$post_id.'"></td>
                            <td>'.$post_id.'</td>
                            <td>'.$post_author.'</td>
                            <td>'.$post_title.'</td>';

                            $query = "SELECT * FROM `categories` WHERE cat_id = '$post_category_id'";
                            $select_categories_id = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_categories_id)){
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo '<td>'.$cat_title.'</td>';
                            }

                            
                    echo   '<td>'.$post_status.'</td>
                            <td><img width="150px" class="image-responsive" src="../images/'.$post_image.'"></td>
                            <td>'.$post_content.'</td>
                            <td>'.$post_tags.'</td>
                            <td>'.$post_comment_count.'</td>
                            <td>'.$post_date.'</td>
                            <td><a href="../post.php?p_id='.$post_id.'">View Post</a></td>
                            <td><a href="posts.php?source=edit_post&p_id='.$post_id.'">Edit</a></td>
                            <td><a onclick=\'javascript: return confirm("Are You Sure Want To delete?"); \' href="posts.php?delete='.$post_id.'">Delete</a></td>
                        </tr>';
                }
                
            ?>
            
        </tbody>
    </table>
</form>
<?php 
    
    if(isset($_GET['delete'])){

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM `posts` WHERE post_id = '$the_post_id'";
        $delete_query = mysqli_query($connection,$query);
        header('Location: posts.php');
        
    }
    
?>
