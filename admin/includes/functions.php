<?php

function confirmQuery($result)
{
    global $connection;

    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}


function insert_query()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "<h3>This field should not be empty</h3>";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Query failed' . mysqli_error($connection));
            }
        }
    }
}

function find_all_categories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_category = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_category)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}

function find_all_posts()
{
    global $connection;

    $query = "SELECT * FROM posts";
    $select_all_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
        echo "<td>";
        ?>
        <input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>">
        <?php
        echo "</td>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        $select_all_category = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_category)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<td>{$cat_title}</td>";
        }

        echo "<td>{$post_status}</td>";
        echo "<td><img width='150' src='../images/{$post_image}' alt='images'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comments}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete_post_id={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
}


function delete_post()
{
    global $connection;

    if (isset($_GET['delete_post_id'])) {
        $post_id = $_GET['delete_post_id'];

        $query = "DELETE FROM posts WHERE post_id = {$post_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: posts.php");
    }
}

function delete_comment()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: comments.php");
    }
}

function approval_comment_status()
{
    global $connection;

    if (isset($_GET['approve'])) {
        $comment_id = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$comment_id}";
        $update_query = mysqli_query($connection, $query);

        header("Location: comments.php");
    }

    if (isset($_GET['unapprove'])) {
        $comment_id = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$comment_id}";
        $update_query = mysqli_query($connection, $query);

        header("Location: comments.php");
    }
}

function find_all_comments()
{
    global $connection;

    $query = "SELECT * FROM comments";
    $select_all_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_comments)) {
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $in_response_to = $row['comment_post_id'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = {$in_response_to}";
        $select_all_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";
    }
}

function find_all_users()
{
    global $connection;

    $query = "SELECT * FROM users";
    $select_all_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_comments)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['role'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
        echo "</tr>";
    }
}

function delete_user()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $user_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = {$user_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }
}

function change_user_role()
{
    global $connection;

    if (isset($_GET['change_to_admin'])) {
        $user_id = $_GET['change_to_admin'];

        $query = "UPDATE users SET role = 'admin' WHERE user_id = {$user_id}";
        $update_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }

    if (isset($_GET['change_to_sub'])) {
        $user_id = $_GET['change_to_sub'];

        $query = "UPDATE users SET role = 'subscriber' WHERE user_id = {$user_id}";
        $update_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }
}

function row_count($query)
{
    global $connection;
    $selected_query = mysqli_query($connection, $query);
    $row_count = mysqli_num_rows($selected_query);
    return $row_count;
}

?>