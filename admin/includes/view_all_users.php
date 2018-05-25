<table class="table table-bordered table-hover">
    <thead>
    <th>Id</th>
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Role</th>
    </thead>
    <tbody>

    <?php find_all_users(); ?>

    </tbody>
</table>

<?php change_user_role(); ?>

<?php delete_user(); ?>