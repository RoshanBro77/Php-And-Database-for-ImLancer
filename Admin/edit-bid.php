<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$bid = getById("bid", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Bid</legend>
		<input name="cat" type="hidden" value="bid">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Project id</label>
		<input class="form-control" type="text" name="project_id" value="<?= $bid['project_id'] ?>" /><br>

		<label>Date</label>
		<input class="form-control" type="text" name="date" value="<?= $bid['date'] ?>" /><br>

		<label>User id</label>
		<input class="form-control" type="text" name="user_id" value="<?= $bid['user_id'] ?>" /><br>

		<label>Bid price</label>
		<input class="form-control" type="text" name="bid_price" value="<?= $bid['bid_price'] ?>" /><br>

		<label>Status</label>
		<input class="form-control" type="text" name="status" value="<?= $bid['status'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>