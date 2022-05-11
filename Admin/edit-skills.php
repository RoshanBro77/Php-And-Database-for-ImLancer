<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$skills = getById("skills", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Skills</legend>
						<input name="cat" type="hidden" value="skills">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Skill name</label>
							<input class="form-control" type="text" name="skill_name" value="<?=$skills['skill_name']?>" /><br>
							
							<label>Subcategory id</label>
							<input class="form-control" type="text" name="subcategory_id" value="<?=$skills['subcategory_id']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$skills['date']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				