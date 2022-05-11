<?php
		$link = mysqli_connect("127.0.0.1", "root", "");
		mysqli_select_db($link, "imlancer");
		mysqli_query($link, "SET CHARACTER SET utf8");
