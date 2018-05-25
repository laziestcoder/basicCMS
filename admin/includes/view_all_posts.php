<?php

if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $checkBoxes) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = {$checkBoxes}";
                $update_all_query = mysqli_query($connection, $query);
                confirmQuery($update_all_query);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = {$checkBoxes}";
                $update_all_query = mysqli_query($connection, $query);
                confirmQuery($update_all_query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxes}";
                $update_all_query = mysqli_query($connection, $query);
                confirmQuery($update_all_query);
                break;
        }
    }
}

?>

    <form action="" method="post">
        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <th><input id="selectAllCheckboxes" type="checkbox"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>

            <?php find_all_posts(); ?>

            </tbody>
        </table>
    </form

<?php delete_post(); ?>