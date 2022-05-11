<?php
		include("includes/connect.php");

		$cat = $_POST['cat'];
		$cat_get = $_GET['cat'];
		$act = $_POST['act'];
		$act_get = $_GET['act'];
		$id = $_POST['id'];
		$id_get = $_GET['id'];

		
				if($cat == "bid" || $cat_get == "bid") {
					$project_id = addslashes(htmlentities($_POST["project_id"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
$bid_price = addslashes(htmlentities($_POST["bid_price"], ENT_QUOTES));
$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `bid` (  `project_id` , `date` , `user_id` , `bid_price` , `status` ) VALUES ( '".$project_id."' , '".$date."' , '".$user_id."' , '".$bid_price."' , '".$status."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `bid` SET  `project_id` =  '".$project_id."' , `date` =  '".$date."' , `user_id` =  '".$user_id."' , `bid_price` =  '".$bid_price."' , `status` =  '".$status."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `bid` WHERE id = '".$id_get."' ");
					}
					header("location:"."bid.php");
				}
				
				if($cat == "category" || $cat_get == "category") {
					$category_image = addslashes(htmlentities($_POST["category_image"], ENT_QUOTES));
$category_name = addslashes(htmlentities($_POST["category_name"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `category` (  `category_image` , `category_name` , `date` ) VALUES ( '".$category_image."' , '".$category_name."' , '".$date."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `category` SET  `category_image` =  '".$category_image."' , `category_name` =  '".$category_name."' , `date` =  '".$date."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `category` WHERE id = '".$id_get."' ");
					}
					header("location:"."category.php");
				}
				
				if($cat == "notification" || $cat_get == "notification") {
					$title = addslashes(htmlentities($_POST["title"], ENT_QUOTES));
$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
$type = addslashes(htmlentities($_POST["type"], ENT_QUOTES));
$content = addslashes(htmlentities($_POST["content"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$reciever_id = addslashes(htmlentities($_POST["reciever_id"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `notification` (  `title` , `description` , `type` , `content` , `date` , `reciever_id` ) VALUES ( '".$title."' , '".$description."' , '".$type."' , '".$content."' , '".$date."' , '".$reciever_id."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `notification` SET  `title` =  '".$title."' , `description` =  '".$description."' , `type` =  '".$type."' , `content` =  '".$content."' , `date` =  '".$date."' , `reciever_id` =  '".$reciever_id."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `notification` WHERE id = '".$id_get."' ");
					}
					header("location:"."notification.php");
				}
				
				if($cat == "password_resets" || $cat_get == "password_resets") {
					$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
$token = addslashes(htmlentities($_POST["token"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `password_resets` (  `email` , `token` ) VALUES ( '".$email."' , '".$token."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `password_resets` SET  `email` =  '".$email."' , `token` =  '".$token."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `password_resets` WHERE id = '".$id_get."' ");
					}
					header("location:"."password_resets.php");
				}
				
				if($cat == "payment" || $cat_get == "payment") {
					$client_id = addslashes(htmlentities($_POST["client_id"], ENT_QUOTES));
$amount = addslashes(htmlentities($_POST["amount"], ENT_QUOTES));
$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$account = addslashes(htmlentities($_POST["account"], ENT_QUOTES));
$project_id = addslashes(htmlentities($_POST["project_id"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `payment` (  `client_id` , `amount` , `status` , `date` , `account` , `project_id` ) VALUES ( '".$client_id."' , '".$amount."' , '".$status."' , '".$date."' , '".$account."' , '".$project_id."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `payment` SET  `client_id` =  '".$client_id."' , `amount` =  '".$amount."' , `status` =  '".$status."' , `date` =  '".$date."' , `account` =  '".$account."' , `project_id` =  '".$project_id."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `payment` WHERE id = '".$id_get."' ");
					}
					header("location:"."payment.php");
				}
				
				if($cat == "profile" || $cat_get == "profile") {
					$user_name = addslashes(htmlentities($_POST["user_name"], ENT_QUOTES));
$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
$email_id = addslashes(htmlentities($_POST["email_id"], ENT_QUOTES));
$address = addslashes(htmlentities($_POST["address"], ENT_QUOTES));
$phone = addslashes(htmlentities($_POST["phone"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$rating = addslashes(htmlentities($_POST["rating"], ENT_QUOTES));
$skill_id = addslashes(htmlentities($_POST["skill_id"], ENT_QUOTES));
$profileimage_id = addslashes(htmlentities($_POST["profileimage_id"], ENT_QUOTES));
$mydescription = addslashes(htmlentities($_POST["mydescription"], ENT_QUOTES));
$myspeciality = addslashes(htmlentities($_POST["myspeciality"], ENT_QUOTES));
$document = addslashes(htmlentities($_POST["document"], ENT_QUOTES));
$socialmedia = addslashes(htmlentities($_POST["socialmedia"], ENT_QUOTES));
$gender = addslashes(htmlentities($_POST["gender"], ENT_QUOTES));
$notification_id = addslashes(htmlentities($_POST["notification_id"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `profile` (  `user_name` , `password` , `email_id` , `address` , `phone` , `date` , `rating` , `skill_id` , `profileimage_id` , `mydescription` , `myspeciality` , `document` , `socialmedia` , `gender` , `notification_id` ) VALUES ( '".$user_name."' , '".md5($password)."', '".$email_id."' , '".$address."' , '".$phone."' , '".$date."' , '".$rating."' , '".$skill_id."' , '".$profileimage_id."' , '".$mydescription."' , '".$myspeciality."' , '".$document."' , '".$socialmedia."' , '".$gender."' , '".$notification_id."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `profile` SET  `user_name` =  '".$user_name."' , `email_id` =  '".$email_id."' , `address` =  '".$address."' , `phone` =  '".$phone."' , `date` =  '".$date."' , `rating` =  '".$rating."' , `skill_id` =  '".$skill_id."' , `profileimage_id` =  '".$profileimage_id."' , `mydescription` =  '".$mydescription."' , `myspeciality` =  '".$myspeciality."' , `document` =  '".$document."' , `socialmedia` =  '".$socialmedia."' , `gender` =  '".$gender."' , `notification_id` =  '".$notification_id."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `profile` WHERE id = '".$id_get."' ");
					}
					header("location:"."profile.php");
				}
				
				if($cat == "project" || $cat_get == "project") {
					$budget = addslashes(htmlentities($_POST["budget"], ENT_QUOTES));
$project_category = addslashes(htmlentities($_POST["project_category"], ENT_QUOTES));
$project_subcategory = addslashes(htmlentities($_POST["project_subcategory"], ENT_QUOTES));
$project_name = addslashes(htmlentities($_POST["project_name"], ENT_QUOTES));
$duration = addslashes(htmlentities($_POST["duration"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$deadline = addslashes(htmlentities($_POST["deadline"], ENT_QUOTES));
$client_id = addslashes(htmlentities($_POST["client_id"], ENT_QUOTES));
$freelancer_id = addslashes(htmlentities($_POST["freelancer_id"], ENT_QUOTES));
$project_status = addslashes(htmlentities($_POST["project_status"], ENT_QUOTES));
$file = addslashes(htmlentities($_POST["file"], ENT_QUOTES));
$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
$skill_id = addslashes(htmlentities($_POST["skill_id"], ENT_QUOTES));
$review = addslashes(htmlentities($_POST["review"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `project` (  `budget` , `project_category` , `project_subcategory` , `project_name` , `duration` , `date` , `deadline` , `client_id` , `freelancer_id` , `project_status` , `file` , `description` , `skill_id` , `review` ) VALUES ( '".$budget."' , '".$project_category."' , '".$project_subcategory."' , '".$project_name."' , '".$duration."' , '".$date."' , '".$deadline."' , '".$client_id."' , '".$freelancer_id."' , '".$project_status."' , '".$file."' , '".$description."' , '".$skill_id."' , '".$review."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `project` SET  `budget` =  '".$budget."' , `project_category` =  '".$project_category."' , `project_subcategory` =  '".$project_subcategory."' , `project_name` =  '".$project_name."' , `duration` =  '".$duration."' , `date` =  '".$date."' , `deadline` =  '".$deadline."' , `client_id` =  '".$client_id."' , `freelancer_id` =  '".$freelancer_id."' , `project_status` =  '".$project_status."' , `file` =  '".$file."' , `description` =  '".$description."' , `skill_id` =  '".$skill_id."' , `review` =  '".$review."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `project` WHERE id = '".$id_get."' ");
					}
					header("location:"."project.php");
				}
				
				if($cat == "skills" || $cat_get == "skills") {
					$skill_name = addslashes(htmlentities($_POST["skill_name"], ENT_QUOTES));
$subcategory_id = addslashes(htmlentities($_POST["subcategory_id"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `skills` (  `skill_name` , `subcategory_id` , `date` ) VALUES ( '".$skill_name."' , '".$subcategory_id."' , '".$date."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `skills` SET  `skill_name` =  '".$skill_name."' , `subcategory_id` =  '".$subcategory_id."' , `date` =  '".$date."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `skills` WHERE id = '".$id_get."' ");
					}
					header("location:"."skills.php");
				}
				
				if($cat == "subcategory" || $cat_get == "subcategory") {
					$category_id = addslashes(htmlentities($_POST["category_id"], ENT_QUOTES));
$subcategory_name = addslashes(htmlentities($_POST["subcategory_name"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$subcategory_image = addslashes(htmlentities($_POST["subcategory_image"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `subcategory` (  `category_id` , `subcategory_name` , `date` , `subcategory_image` ) VALUES ( '".$category_id."' , '".$subcategory_name."' , '".$date."' , '".$subcategory_image."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `subcategory` SET  `category_id` =  '".$category_id."' , `subcategory_name` =  '".$subcategory_name."' , `date` =  '".$date."' , `subcategory_image` =  '".$subcategory_image."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `subcategory` WHERE id = '".$id_get."' ");
					}
					header("location:"."subcategory.php");
				}
				
				if($cat == "users" || $cat_get == "users") {
					$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
$role = addslashes(htmlentities($_POST["role"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `users` (  `name` , `email` , `password` , `role` ) VALUES ( '".$name."' , '".$email."' , '".md5($password)."', '".$role."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `users` SET  `name` =  '".$name."' , `email` =  '".$email."' , `role` =  '".$role."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `users` WHERE id = '".$id_get."' ");
					}
					header("location:"."users.php");
				}
