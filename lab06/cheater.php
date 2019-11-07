<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
		# Ex 4 : 
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
			$name = $_POST["Name"];
			$id = $_POST["ID"];
			$grade = $_POST["Grade"];
			$card_num = $_POST["cardnum"];
			$card = $_POST["card"];
			$patternName = "/\[a-zA-Z\\- \]/";
			$patternCard = "/\d{16}/";
		if ($_POST["Name"] === "" || $_POST["ID"] === "" |
		$_POST["cardnum"] === "" ){
		?>

			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="./gradestore.html">Try again?</a></p>

		<?php
		} 
		elseif ( preg_match($patternName, $name)) { 
		?>


			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="./gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		} 
		elseif ( preg_match($patternCard,$card_num) === FALSE | 
		$card === "Visa" & !preg_match("/^4/",$card)  |
		$card === "MasterCard" & !preg_match("/^5/",$card)) {
		?>


			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="./gradestore.html">Try again?</a></p>

		<?php
		# if all the validation and check are passed 
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<ul> 
			<?php $name = $_POST["Name"];
			$id = $_POST["ID"];
			$courses = $_POST['course'];
			$grade = $_POST["Grade"];
			$card_num = $_POST["cardnum"];
			$card = $_POST["card"]; ?>
			<li>Name:  <?= $name ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?php
			foreach($_POST['course'] as $course){
				?>
				<?= $course ?>,
			<?php } ?>
			</li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit :<?= $card_num ?>,<?= $card ?></li>
		</ul>
		

		<p>Here are all the loosers who have submitted here:</p>
			
		<?php
			$filename = "./loosers.txt";
			$info = $name.";".$id.";".$card_num.";".$card."\n";
			file_put_contents("./loosers.txt",$info,FILE_APPEND);
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		
		<?php $lines = file("./loosers.txt");
			foreach($lines as $line){ ?>
			<p> <?= $line ?> <p>
		<?php } ?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){ }
			}?>


		
	</body>
</html>