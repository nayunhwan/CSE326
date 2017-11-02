<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 5678;
			$song_hour = 567;
		?>
		<p>
			I love music.
			I have <?=$song_count?> total songs
			which is over <?=$song_hour?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
			<ol>
				<?php
					$news_pages = 5;
					if (isset($_GET["newspages"])) $news_pages = $_GET["newspages"];
					for ($i = 0; $i < $news_pages; $i++) {
				?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?=($i+1)?>">Page <?=($i+1)?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
					foreach(file("./favorite.txt") as $item) {
						$link = implode(explode(" ", $item), "_");
				?>
						<li><a href="http://en.wikipedia.org/wiki/<?=$link?>"><?=$item?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
					$musics = glob("./lab5/musicPHP/songs/*.mp3");
					usort($musics, function($a, $b){
						return filesize($b) - filesize($a);
					});
					foreach($musics as $music) {
				?>
						<li class="mp3item">
							<a href="<?=$music?>"><?=basename($music)?></a> (<?=(int)(filesize($music)/1024)?>KB)
						</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$playLists = glob("./lab5/musicPHP/songs/*.m3u");
					rsort($playLists);
					foreach($playLists as $list) {
				?>
						<li class="playlistitem"> <?=basename($list)?>
							<ul>
								<?php
									$musicList = file($list);
									shuffle($musicList);
									foreach($musicList as $music) {

										if(strpos($music, "#") === false) {
								?>
											<li><?=$music?></li>
								<?php
										}
									}
								?>
							</ul>
						</li>

				<?php	} ?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
