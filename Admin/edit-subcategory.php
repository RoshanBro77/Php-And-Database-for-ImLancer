<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$subcategory = getById("subcategory", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Subcategory</legend>
						<input name="cat" type="hidden" value="subcategory">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Category id</label>
							<input class="form-control" type="text" name="category_id" value="<?=$subcategory['category_id']?>" /><br>
							
							<label>Subcategory name</label>
							<input class="form-control" type="text" name="subcategory_name" value="<?=$subcategory['subcategory_name']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$subcategory['date']?>" /><br>
							
							<label>Subcategory image</label>
							<input class="form-control" type="text" name="subcategory_image" value="<?=$subcategory['subcategory_image']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				