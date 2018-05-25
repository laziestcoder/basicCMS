<form action="" method="post">

    <div class="form-group">

        <?php

        if (isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $select_all_category = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_category)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        ?>

        <label for="cat_title">Edit Category</label>
        <input value="<?php if (isset($cat_title)) {
            echo $cat_title;
        } ?>" type="text" name="cat_title" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary"
               value="Update Category">

        <?php }
        }
        ?>

    </div>
</form>

<?php

if (isset($_POST['update_category'])) {

    $cat_title = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = $cat_id";
    $update_query = mysqli_query($connection, $query);

    if (!$update_query) {
        die("QUERY failed" . mysqli_error($connection));
    }
}

?>