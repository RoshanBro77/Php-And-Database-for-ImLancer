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

<h1>Skills</h1>
<p>There are <?php echo counting("skills", "id"); ?> skills in the databse.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Skill name</th>
			<th>Subcategory id</th>
			<th>Date</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$skills = getAll("skills");
	if ($skills) foreach ($skills as $skillss) :
	?>
		<tr>
			<td><?php echo $skillss['id'] ?></td>
			<td><?php echo $skillss['skill_name'] ?></td>
			<td><?php echo $skillss['subcategory_id'] ?></td>
			<td><?php echo $skillss['date'] ?></td>


			<td><a href="edit-skills.php?act=edit&id=<?php echo $skillss['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $skillss['id'] ?>&cat=skills" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-skills.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Skills</a>

<?php include "includes/footer.php"; ?>