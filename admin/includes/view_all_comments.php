<table class="table table-bordered table-hover">
    <thead>
    <th>Id</th>
    <th>Author</th>
    <th>Comment</th>
    <th>Email</th>
    <th>Status</th>
    <th>In Response To</th>
    <th>Date</th>
    <th>Approve</th>
    <th>Unapprove</th>
    <th>Delete</th>
    </thead>
    <tbody>

    <?php find_all_comments(); ?>

    </tbody>
</table>

<?php approval_comment_status(); ?>

<?php delete_comment(); ?>