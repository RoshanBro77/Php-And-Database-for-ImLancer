<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$category = getById("category", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Category</legend>
						<input name="cat" type="hidden" value="category">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Category image</label>
							<input class="form-control" type="text" name="category_image" value="<?=$category['category_image']?>" /><br>
							
							<label>Category name</label>
							<input class="form-control" type="text" name="category_name" value="<?=$category['category_name']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$category['date']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				