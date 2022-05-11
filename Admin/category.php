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

<h1>Category</h1>
<p>There are <?php echo counting("category", "id"); ?> categories in the database.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Category image</th>
			<th>Category name</th>
			<th>Date</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$category = getAll("category");
	if ($category) foreach ($category as $categorys) :
	?>
		<tr>
			<td><?php echo $categorys['id'] ?></td>
			<td><?php echo $categorys['category_image'] ?></td>
			<td><?php echo $categorys['category_name'] ?></td>
			<td><?php echo $categorys['date'] ?></td>


			<td><a href="edit-category.php?act=edit&id=<?php echo $categorys['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $categorys['id'] ?>&cat=category" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-category.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Category</a>

<?php include "includes/footer.php"; ?>