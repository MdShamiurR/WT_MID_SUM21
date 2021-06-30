<?php

    $name="";
	$err_name="";
	
	$password="";
	$err_password="";

	$confirmpassword="";
	$err_confirmpassword="";
	
	$email="";
	$err_email="";
	
	$isdcode="";
	$err_isdcode="";
	
    $phone="";
	$err_phone="";
	
		
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		
		
		if(empty($_POST["name"])){
			$hasError=true;
			$err_name="Name Required";
		}
		elseif (strlen($_POST["name"]) <=6){
			$hasError = true;
			$err_name = "Name must be greater than 6 characters";
		}
		else{
			$name = $_POST["name"];
		}
		
		if(strlen($_POST["password"])>8)
			{
				$pass=$_POST["password"];
			if ((!strpos($_POST["password"],"#"))||(!strpos($_POST["password"],"?")))
				{
				$err_password="Password must contain at least 8 characters and 1 special character!";
				}
			
				for ($j=0;$m<strlen($_POST["password"]);$j++)
				{
					if (ctype_upper($_POST["password"][$j]))
					{
						break;
					}
					else
					{
						$err_pass="Password must contain minimum 1 uppercase alphabet!";
					}
				}
				for($k=0;$n<strlen($_POST["password"]);$k++)
				{
					if(is_numeric($_POST["password"][$k]))
					{
						break;
					}
					else
					{
						$err_password="Password must contain minimum 1 numeric character!";
					}
				}
			}
			else	
			$err_password="Password length must be 8 or longer!";

			if($_POST["confirmpassword"]!=$_POST["password"])
			{
				$err_confirmpassword="Password didn't matched with the upperone!";
			}
			else{$confirmpassword=$_POST["confirmpassword"];}
			
			if(empty($_POST["phone"])){
			$hasError=true;
			$err_phone="contact number Required";
		}
		
		if(!is_numeric($_POST["isdcode"]))
			{
				$err_isdcode="ISD code should be numeric only!";
			}
			else $phone=$_POST["phone"];

			if(!is_numeric($_POST["phone"]))
			{
				$err_phone=" Phone number should be numeric only!";
			}
			else $phone=$_POST["phone"];
			
		if(strpos($_POST["email"],"@"))
			{if(strpos($_POST["email"],"."))
			$email=$_POST["email"];
			}
			else $err_email="Email must contain '@' and '.'!";	
			
	    echo "Name: ".htmlspecialchars($_POST["name"])."<br>";
		echo "Password: ".htmlspecialchars($_POST["password"])."<br>";
		echo "Email: ".htmlspecialchars($_POST["email"])."<br>";
		echo "ISD: ".htmlspecialchars($_POST["isdcode"])."<br>";
		echo "Phone: ".htmlspecialchars($_POST["phone"])."<br>";					
			
			
	}
	
	
	

?>


<html>
	<head></head>
	<body>
		<center>
		<form action="" method="post">
		<fieldset>
		<legend align="center"><h1><b>Profile Update</b></h1></legend>
			<table>
				<tr>
					<td><span >Name:</span></td>
					<td></td>
					<td><input type="text" name="name" value="<?php echo $name;?>"><td><span><?php echo $err_name;?></span></td>
				</tr>

				
				<tr>
					<td><span>Password:</span></td>
					<td></td>
					<td><input type="password" name="password" value="<?php echo $password;?>"> </td><td><span><?php echo $err_password;?></span></td>
				</tr>
				<tr>
					<td><span>Confirm Password:</span></td>
					<td></td>
					<td><input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>"> </td><td><span><?php echo $err_confirmpassword;?></span></td>
				</tr>
				<tr>
					<td><span>Email:</span></td>
					<td></td>
					<td><input type="text" name="email" value="<?php echo $email;?>"> </td><td><span><?php echo $err_email;?></span></td>
				</tr>
				<tr>
					<td><span>Phone:</span></td>
					<td></td>
					<td><input type="text" name="isdcode" value="<?php echo $isdcode;?>" placeholder="code" size="4"><b>-</b><input type="text" name="phone" value="<?php echo $phone;?>" placeholder = "Number" size="9"> </td><td><span><?php echo $err_isdcode;?></span><span><?php echo $err_phone;?></span></td>
				</tr>
				
				
				

				<td colspan="3" align="center">
				<input type="Submit" name="submit" value="register">
				</td>
				
				
				
					
			
				
				
			</table>
	</fieldset>
		</form>
		</center>
	</body>
</html>