<?php
		if(isset($_POST["s"]))
		{
			extract($_POST);
			$pic=$_FILES["pic"]["tmp_name"];
			$destination="img/".$_FILES["pic"]["name"];
			
			//Start Image validate
			$p_name=$_FILES["pic"]["name"];//demo.jpg
			$p_array=explode(".",$p_name);//array[0]=>demoarray[1]=>jpg
			$ext=$p_array[1]; //jpg
			$validate=array("jpg","png","gif");

			if(in_array($ext,$validate))
			{
				if(move_uploaded_file($pic, $destination))
				{
					$pic=$_FILES["pic"]["name"];
				}
				$qry=mysqli_query($con,"INSERT INTO `signup`(`name`, `email`, `password`, `pic`, `path`) VALUES ('$name','$email','$password','$pic','$destination')");
				if($qry)
				{
					header("location:index.php?insert");
				}
			}
			//print_r($ext);
				

		}
		?>
