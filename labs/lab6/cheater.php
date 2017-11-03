<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if (!isset($_POST["name"], $_POST["id"], $_POST["course"], $_POST["grade"], $_POST["creditCard"]) ||
			strcmp($_POST["name"], "") === 0 ||
			strcmp($_POST["id"], "") === 0 ||
			strcmp($_POST["course"], "") === 0 ||
			strcmp($_POST["grade"], "") === 0 ||
			strcmp($_POST["creditCard"], "") === 0
		) {
		?>

		<!-- Ex 4 :
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		} elseif (preg_match("/^([a-zA-Z]+[\s\-])*[a-zA-Z]+$/", $_POST["name"]) === 0) {
		?>

		<!-- Ex 5 :
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		} elseif (
			!((	strcmp($_POST["cc"], "visa") === 0 &&
					preg_match("/^4[0-9]{15}$/", $_POST["creditCard"]) === 1) ||
				(	strcmp($_POST["cc"], "mastercard") === 0 &&
					preg_match("/^5[0-9]{15}$/", $_POST["creditCard"]) === 1))
		) {
		?>

		<!-- Ex 5 :
			Display the below error message :
		-->
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<?php
		# if all the validation and check are passed
		} else {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  # process a POST request
			  $name = $_POST["name"];
				$id = $_POST["id"];
				$course = $_POST["course"];
				$grade = $_POST["grade"];
				$creditCard = $_POST["creditCard"];
				$cc = $_POST["cc"];
			}
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?=$name?></li>
			<li>ID: <?=$id?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?=processCheckbox($course)?></li>
			<li>Grade: <?=$grade?></li>
			<li>Credit <?=$creditCard." (".$cc.")"?></li>
		</ul>

		<!-- Ex 3 : -->
		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			 $inputContent = implode(";", array($name, $id, $creditCard, $cc))."\n";
			 file_put_contents($filename, $inputContent, FILE_APPEND);
		?>

		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
		<pre><?=file_get_contents($filename);?></pre>

		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$str = implode(", ", $names);
				return $str;
			}
		?>

	</body>
</html>
