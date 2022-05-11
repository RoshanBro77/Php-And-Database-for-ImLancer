<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$profile = getById("profile", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Profile</legend>
						<input name="cat" type="hidden" value="profile">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>User name</label>
							<input class="form-control" type="text" name="user_name" value="<?=$profile['user_name']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$profile['password']?>" /><br>
							
							<label>Email id</label>
							<input class="form-control" type="text" name="email_id" value="<?=$profile['email_id']?>" /><br>
							
							<label>Address</label>
							<input class="form-control" type="text" name="address" value="<?=$profile['address']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" value="<?=$profile['phone']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$profile['date']?>" /><br>
							
							<label>Rating</label>
							<input class="form-control" type="text" name="rating" value="<?=$profile['rating']?>" /><br>
							
							<label>Skill id</label>
							<input class="form-control" type="text" name="skill_id" value="<?=$profile['skill_id']?>" /><br>
							
							<label>Profileimage id</label>
							<input class="form-control" type="text" name="profileimage_id" value="<?=$profile['profileimage_id']?>" /><br>
							
							<label>Mydescription</label>
							<input class="form-control" type="text" name="mydescription" value="<?=$profile['mydescription']?>" /><br>
							
							<label>Myspeciality</label>
							<input class="form-control" type="text" name="myspeciality" value="<?=$profile['myspeciality']?>" /><br>
							
							<label>Document</label>
							<input class="form-control" type="text" name="document" value="<?=$profile['document']?>" /><br>
							
							<label>Socialmedia</label>
							<input class="form-control" type="text" name="socialmedia" value="<?=$profile['socialmedia']?>" /><br>
							
							<label>Gender</label>
							<input class="form-control" type="text" name="gender" value="<?=$profile['gender']?>" /><br>
							
							<label>Notification id</label>
							<input class="form-control" type="text" name="notification_id" value="<?=$profile['notification_id']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				