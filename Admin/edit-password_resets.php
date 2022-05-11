<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$password_resets = getById("password_resets", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Password_resets</legend>
						<input name="cat" type="hidden" value="password_resets">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$password_resets['email']?>" /><br>
							
							<label>Token</label>
							<input class="form-control" type="text" name="token" value="<?=$password_resets['token']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				