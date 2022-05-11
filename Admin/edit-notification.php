<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$notification = getById("notification", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Notification</legend>
						<input name="cat" type="hidden" value="notification">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Title</label>
							<input class="form-control" type="text" name="title" value="<?=$notification['title']?>" /><br>
							
							<label>Description</label>
							<input class="form-control" type="text" name="description" value="<?=$notification['description']?>" /><br>
							
							<label>Type</label>
							<input class="form-control" type="text" name="type" value="<?=$notification['type']?>" /><br>
							
							<label>Content</label>
							<input class="form-control" type="text" name="content" value="<?=$notification['content']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$notification['date']?>" /><br>
							
							<label>Reciever id</label>
							<input class="form-control" type="text" name="reciever_id" value="<?=$notification['reciever_id']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				