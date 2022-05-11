<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$project = getById("project", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Project</legend>
						<input name="cat" type="hidden" value="project">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Budget</label>
							<input class="form-control" type="text" name="budget" value="<?=$project['budget']?>" /><br>
							
							<label>Project category</label>
							<input class="form-control" type="text" name="project_category" value="<?=$project['project_category']?>" /><br>
							
							<label>Project subcategory</label>
							<input class="form-control" type="text" name="project_subcategory" value="<?=$project['project_subcategory']?>" /><br>
							
							<label>Project name</label>
							<input class="form-control" type="text" name="project_name" value="<?=$project['project_name']?>" /><br>
							
							<label>Duration</label>
							<input class="form-control" type="text" name="duration" value="<?=$project['duration']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$project['date']?>" /><br>
							
							<label>Deadline</label>
							<input class="form-control" type="text" name="deadline" value="<?=$project['deadline']?>" /><br>
							
							<label>Client id</label>
							<input class="form-control" type="text" name="client_id" value="<?=$project['client_id']?>" /><br>
							
							<label>Freelancer id</label>
							<input class="form-control" type="text" name="freelancer_id" value="<?=$project['freelancer_id']?>" /><br>
							
							<label>Project status</label>
							<input class="form-control" type="text" name="project_status" value="<?=$project['project_status']?>" /><br>
							
							<label>File</label>
							<input class="form-control" type="text" name="file" value="<?=$project['file']?>" /><br>
							
							<label>Description</label>
							<input class="form-control" type="text" name="description" value="<?=$project['description']?>" /><br>
							
							<label>Skill id</label>
							<input class="form-control" type="text" name="skill_id" value="<?=$project['skill_id']?>" /><br>
							
							<label>Review</label>
							<input class="form-control" type="text" name="review" value="<?=$project['review']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				