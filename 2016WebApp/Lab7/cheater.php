<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
			if (!isset($_POST["credit_card"], $_POST["name"], $_POST["id"], $_POST["course"]) || strcmp($_POST["credit_card"], "") === 0 || strcmp($_POST["name"], "") === 0 || strcmp($_POST["id"], "") === 0){
		?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		#|| preg_match('/[\s]{2,}/', $_POST["name"]) === 0
	} elseif (preg_match('/^([a-zA-Z]+[\s\-])*[a-zA-Z]+$/', $_POST["name"]) == 0) {
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif (preg_match('/^[0-9]{16}$/', $_POST["credit_card"]) == 0 || preg_match('/^(4|5).\d*$/', $_POST["credit_card"]) == 0 || (strcmp($_POST["cc"], "visa") == 0 && preg_match('/^4.\d*/', $_POST["credit_card"]) == 0) ||
	(strcmp($_POST["cc"], "mastercard") == 0 && preg_match('/^5.\d*$/', $_POST["credit_card"]) == 0)) {

		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<?php
		# if all the validation and check are passed
		 } else {
				if ($_SERVER["REQUEST_METHOD"] == "GET") {

				}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
					$grade = $_POST["Grade"];
					$name = $_POST["name"];
					$id = $_POST["id"];
					$course = $_POST["course"];
					$creditc = $_POST["credit_card"];
					$cardv = $_POST["cc"];
					$creditstr = $creditc." (".$cardv.")";
					function processCheckbox($arrname)
						{
							$arrstr = implode(", ", $arrname);
							return $arrstr;
						}
				}
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<ul>
			<li>Name: <?= $name?></li>
			<li>ID: <?= $id?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= processCheckbox($course); ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit: <?= $creditstr ?></li>
		</ul>
		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
		?>
		<pre>
			<?= file_get_contents($filename); ?>
		</pre>

		<?php
			// function processCheckbox($arrname)
			// {
			// 	$arrstr = implode(", ", $arrname);
			// 	return $arrstr;
			// }
		?>
		<?php
		 }
		?>

	</body>
</html>
