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

<h1>Payment</h1>
<p>There are <?php echo counting("payment", "id"); ?> payments in the database.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Client id</th>
			<th>Amount</th>
			<th>Status</th>
			<th>Date</th>
			<th>Account</th>
			<th>Project id</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$payment = getAll("payment");
	if ($payment) foreach ($payment as $payments) :
	?>
		<tr>
			<td><?php echo $payments['id'] ?></td>
			<td><?php echo $payments['client_id'] ?></td>
			<td><?php echo $payments['amount'] ?></td>
			<td><?php echo $payments['status'] ?></td>
			<td><?php echo $payments['date'] ?></td>
			<td><?php echo $payments['account'] ?></td>
			<td><?php echo $payments['project_id'] ?></td>


			<td><a href="edit-payment.php?act=edit&id=<?php echo $payments['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $payments['id'] ?>&cat=payment" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a class="btn btn-primary" href="edit-payment.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Payment</a>

<?php include "includes/footer.php"; ?>