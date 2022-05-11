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

<h1>Profile</h1>
<p>There are <?php echo counting("profile", "id"); ?> profiles in the databse.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>User name</th>
			<th>Password</th>
			<th>Email id</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Date</th>
			<th>Rating</th>
			<th>Skill id</th>
			<th>Profileimage id</th>
			<th>Mydescription</th>
			<th>Myspeciality</th>
			<th>Document</th>
			<th>Socialmedia</th>
			<th>Gender</th>
			<th>Notification id</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("profile");
	if ($profile) foreach ($profile as $profiles) :
	?>
		<tr>
			<td><?php echo $profiles['id'] ?></td>
			<td><?php echo $profiles['user_name'] ?></td>
			<td><?php echo $profiles['password'] ?></td>
			<td><?php echo $profiles['email_id'] ?></td>
			<td><?php echo $profiles['address'] ?></td>
			<td><?php echo $profiles['phone'] ?></td>
			<td><?php echo $profiles['date'] ?></td>
			<td><?php echo $profiles['rating'] ?></td>
			<td><?php echo $profiles['skill_id'] ?></td>
			<td><?php echo $profiles['profileimage_id'] ?></td>
			<td><?php echo $profiles['mydescription'] ?></td>
			<td><?php echo $profiles['myspeciality'] ?></td>
			<td><?php echo $profiles['document'] ?></td>
			<td><?php echo $profiles['socialmedia'] ?></td>
			<td><?php echo $profiles['gender'] ?></td>
			<td><?php echo $profiles['notification_id'] ?></td>


			<td><a href="edit-profile.php?act=edit&id=<?php echo $profiles['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?>&cat=profile" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-profile.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Profile</a>

<?php include "includes/footer.php"; ?>