<?php
include "includes/header.php";
?>
<style>
	table {
		border: solid 4px #292929;
		border-style: groove;
	}
</style>
<table class="table table-striped">
	<tr style="background-color: #ff642e; color: white;">
		<th class="not">Table</th>
		<th class="not">Entries</th>
	</tr>

	<tr>
		<td><a href="bid.php">Bid</a></td>
		<td><?= counting("bid", "id") ?></td>
	</tr>

	<tr>
		<td><a href="category.php">Category</a></td>
		<td><?= counting("category", "id") ?></td>
	</tr>

	<tr>
		<td><a href="notification.php">Notification</a></td>
		<td><?= counting("notification", "id") ?></td>
	</tr>

	<tr>
		<td><a href="password_resets.php">Password_resets</a></td>
		<td><?= counting("password_resets", "id") ?></td>
	</tr>

	<tr>
		<td><a href="payment.php">Payment</a></td>
		<td><?= counting("payment", "id") ?></td>
	</tr>

	<tr>
		<td><a href="profile.php">Profile</a></td>
		<td><?= counting("profile", "id") ?></td>
	</tr>

	<tr>
		<td><a href="project.php">Project</a></td>
		<td><?= counting("project", "id") ?></td>
	</tr>

	<tr>
		<td><a href="skills.php">Skills</a></td>
		<td><?= counting("skills", "id") ?></td>
	</tr>

	<tr>
		<td><a href="subcategory.php">Subcategory</a></td>
		<td><?= counting("subcategory", "id") ?></td>
	</tr>

	<tr>
		<td><a href="users.php">Admins</a></td>
		<td><?= counting("users", "id") ?></td>
	</tr>
</table>
<?php include "includes/footer.php"; ?>