<?php
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bid Details</title>
</head>
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

<body>

	<h1>Bid</h1>
	<p>There are <?php echo counting("bid", "id"); ?> bids in the database.</p>
	<div>
		<table id="sorted" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Project id</th>
					<th>Date</th>
					<th>User id</th>
					<th>Bid price</th>
					<th>Status</th>

					<th class="not">Edit</th>
					<th class="not">Delete</th>
				</tr>
			</thead>

			<?php
			$bid = getAll("bid");
			if ($bid) foreach ($bid as $bids) :
			?>
				<tr>
					<td><?php echo $bids['id'] ?></td>
					<td><?php echo $bids['project_id'] ?></td>
					<td><?php echo $bids['date'] ?></td>
					<td><?php echo $bids['user_id'] ?></td>
					<td><?php echo $bids['bid_price'] ?></td>
					<td><?php echo $bids['status'] ?></td>


					<td><a href="edit-bid.php?act=edit&id=<?php echo $bids['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
					<td><a href="save.php?act=delete&id=<?php echo $bids['id'] ?>&cat=bid" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>


	<a class="btn btn-primary" href="edit-bid.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Bid</a>

</body>

</html>
<?php include "includes/footer.php"; ?>