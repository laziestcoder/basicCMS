<?php include "includes/admin_header.php"; ?>
<?php include "../includes/db.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_query(); ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>

                        <?php

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/update_category.php";
                        }

                        ?>

                    </div>

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>Id</td>
                                <td>Category Title</td>
                                <td>Delete</td>
                                <td>Edit</td>
                            </tr>
                            </thead>
                            <tbody>

                            <?php find_all_categories(); ?>

                            </tbody>
                        </table>

                        <?php delete_category(); ?>

                    </div>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
