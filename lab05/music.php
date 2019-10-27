<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $songs = 5678; $hours = 100; ?>
		<p>
			I love music.
			I have <?php echo $songs ;?> total songs,
			which is over <?php echo $hours ;?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
				<?php for($i = 11;$i >=7; $i--) { ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>"> 2019-<?= $i ?> </a></li>
				<?php } ?>
			</ol>
		</div>
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<?php $newspages = 5 ?>
			<ol>
				<?php for($i = 11;$i >11-$newspages; $i--) { ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>"> 2019-<?= $i ?> </a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<?php $singers = array("Gun N's Roses","Green Day","Blink182") ?>
		<div class="section">
			<h2>My favorite Artists</h2>
				<ol>
			<?php for($i = 0; $i < count($singers);$i++){ ?>
					<li><?= $singers[$i] ?></li>
			<?php } ?>
				</ol>
		</div>
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			
			<?php $lines = file("favorite.txt") ?>

			<ol>
				<?php foreach ($lines as $line){ ?>
					<li><a href="http://en.wikipedia.org/wiki/<?= $line?>"><?= $line ?></a></li>
			</ol>
				<?php } ?>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php $path = "./lab5/musicPHP/songs/";
			$songs = scandir($path);	?>
			<ul>
				<?php foreach($songs as $song){ 
					if($song == '.' || $song == '..') continue ;
					else { ?>
					<li class="mp3item"><?= $song ?></li>
					<?php } } ?>

			</ul>
		</div>
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			
			<?php $path = "./lab5/musicPHP/songs/";
			$songs = scandir($path);	?>
			<ul>
				<?php foreach($songs as $song){
					$fileinfo = pathinfo($song);
					$ext = $fileinfo['extension'];
					if($song == '.' || $song == '..' || $ext != 'mp3') continue ;
					else { ?>
					<li class="mp3item">
						<a href="lab5/musicPHP/songs/<?= $song ?>" download><?= $song ?> </a>
						(<?= floor(filesize("./lab5/musicPHP/songs/$song")/1024) ?>KB)
					</li>
					<?php } } ?>			

				<!-- Exercise 8: Playlists (Files) -->
				<?php foreach($songs as $song){
					$fileinfo = pathinfo($song);
					$ext = $fileinfo['extension'];
					if($ext != 'm3u'){
						continue;
					}
					else{ ?>
					<li class="playlistitem"> <?= $song ?>:
						<ul>
						<?php $lines = file("./lab5/musicPHP/songs/$song");
						foreach($lines as $line){ 
							if(strpos($line, '#') !== false) { continue; }
							else {?>
						<li> <?= $line ?> </li>
							<?php } ?>
						<?php } ?>
						</ul>
						</li>
						<?php } } ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
