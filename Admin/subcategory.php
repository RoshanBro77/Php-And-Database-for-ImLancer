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

<h1>Subcategory</h1>
<p>There are <?php echo counting("subcategory", "id"); ?> subcategories in the databse.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Category id</th>
			<th>Subcategory name</th>
			<th>Date</th>
			<th>Subcategory image</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$subcategory = getAll("subcategory");
	if ($subcategory) foreach ($subcategory as $subcategorys) :
	?>
		<tr>
			<td><?php echo $subcategorys['id'] ?></td>
			<td><?php echo $subcategorys['category_id'] ?></td>
			<td><?php echo $subcategorys['subcategory_name'] ?></td>
			<td><?php echo $subcategorys['date'] ?></td>
			<td><?php echo $subcategorys['subcategory_image'] ?></td>


			<td><a href="edit-subcategory.php?act=edit&id=<?php echo $subcategorys['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $subcategorys['id'] ?>&cat=subcategory" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-subcategory.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Subcategory</a>

<?php include "includes/footer.php"; ?>