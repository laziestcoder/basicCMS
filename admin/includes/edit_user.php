<?php

if (isset($_GET['edit_user'])) {
    $user_id = $_GET['edit_user'];
}

$query = "SELECT * FROM users WHERE user_id = $user_id";
$selected_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($selected_query)) {
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
}

if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];

    /*$post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];*/

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

//    $post_date = date('d-m-y');

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}',";
    $query .= "user_lastname = '{$user_lastname}',";
    $query .= "role = '{$user_role}',";
    $query .= "username = '{$username}',";
    $query .= "user_email = '{$user_email}',";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE user_id = $user_id";

    $update_query = mysqli_query($connection, $query);

    confirmQuery($update_query);

    /*$location = '../images/';

    move_uploaded_file($post_image_temp, $location . $post_image);*/
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="post_image">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Update User">
    </div>
</form>