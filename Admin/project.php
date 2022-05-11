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

<h1>Project</h1>
<p>There are <?php echo counting("project", "id"); ?> projects in the databse.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Budget</th>
			<th>Project category</th>
			<th>Project subcategory</th>
			<th>Project name</th>
			<th>Duration</th>
			<th>Date</th>
			<th>Deadline</th>
			<th>Client id</th>
			<th>Freelancer id</th>
			<th>Project status</th>
			<th>File</th>
			<th>Description</th>
			<th>Skill id</th>
			<th>Review</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$project = getAll("project");
	if ($project) foreach ($project as $projects) :
	?>
		<tr>
			<td><?php echo $projects['id'] ?></td>
			<td><?php echo $projects['budget'] ?></td>
			<td><?php echo $projects['project_category'] ?></td>
			<td><?php echo $projects['project_subcategory'] ?></td>
			<td><?php echo $projects['project_name'] ?></td>
			<td><?php echo $projects['duration'] ?></td>
			<td><?php echo $projects['date'] ?></td>
			<td><?php echo $projects['deadline'] ?></td>
			<td><?php echo $projects['client_id'] ?></td>
			<td><?php echo $projects['freelancer_id'] ?></td>
			<td><?php echo $projects['project_status'] ?></td>
			<td><?php echo $projects['file'] ?></td>
			<td><?php echo $projects['description'] ?></td>
			<td><?php echo $projects['skill_id'] ?></td>
			<td><?php echo $projects['review'] ?></td>


			<td><a href="edit-project.php?act=edit&id=<?php echo $projects['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $projects['id'] ?>&cat=project" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-project.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Project</a>

<?php include "includes/footer.php"; ?>