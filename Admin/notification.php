<?php
include "includes/header.php";
?>

<style>
	h1 {
		color: #ff642e;
		font-family: Arial, Helvetica, sans-serif;
		font-style: oblique;
		text-align: center;
		margin-bottom: 40px;

	}

	.btn {
		background-color: #ff642e;
		border-style: groove;
	}
</style>

<h1>Notification</h1>
<p>There are <?php echo counting("notification", "id"); ?> notifications in the database.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Type</th>
			<th>Content</th>
			<th>Date</th>
			<th>Reciever id</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$notification = getAll("notification");
	if ($notification) foreach ($notification as $notifications) :
	?>
		<tr>
			<td><?php echo $notifications['id'] ?></td>
			<td><?php echo $notifications['title'] ?></td>
			<td><?php echo $notifications['description'] ?></td>
			<td><?php echo $notifications['type'] ?></td>
			<td><?php echo $notifications['content'] ?></td>
			<td><?php echo $notifications['date'] ?></td>
			<td><?php echo $notifications['reciever_id'] ?></td>


			<td><a href="edit-notification.php?act=edit&id=<?php echo $notifications['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $notifications['id'] ?>&cat=notification" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-notification.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Notification</a>

<?php include "includes/footer.php"; ?>