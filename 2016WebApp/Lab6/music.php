<!DOCTYPE html>
<html>

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->

		<?php
		$music_num = 5678;
		$music_hour = 587;
		 ?>

		<p>
			I love music.
			I have <?= $music_num ?> total songs,
			which is over <?= $music_hour ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>

			<ol>
				<?php
				$page_num = 5;
				if(isset($_GET["newspages"]))
					$page_num = $_GET["newspages"];
				for ($i= 1; $i <= $page_num; $i++) { ?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i?>">Page <?= $i?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				// $my_fav_artist = array("Guns N' Roses", "Green Day", "Blink182", "Muse");
				foreach (file("http://selab.hanyang.ac.kr/courses/cse326/2016/labs/_lab6_2016/favorite.txt") as $value) { ?>
					<li><a href="http://en.wikipedia.org/wiki/<?=$value ?>"><?=$value ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$musics = glob("lab6/musicPHP/songs/*.mp3");
				usort($musics, function($a, $b) {
    			return filesize($b) - filesize($a);
				});
				foreach ($musics as $value) { ?>
					<li class="mp3item">
						<a href="<?= $value ?>"><?= basename($value) ?></a> (<?= (int)(filesize($value)/1024) ?>KB)
					</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$m3ufile = glob("lab6/musicPHP/songs/*.m3u");
				rsort($m3ufile);
				foreach ($m3ufile as $value){
					$tokens = explode("/", $value);
					$text = $tokens[3];
				 ?>
					<li class="playlistitem"><?= $text ?>
					<ul>
						<?php
						$filearray = file($value);
						shuffle($filearray);
						foreach($filearray as $line)
						{
							if(strpos($line,"#")===false) { ?>
								<li><?= $line ?></li>
						<?php }
						} ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
