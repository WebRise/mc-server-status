<?php
include_once('server-status.php'); //Include the API in the example.

$data = status(); //Grab default statistics from the API.
$extra = status('true'); //Grab extra statistics from the API.

$info = array(
	'title'=>'MC Server Status', //This will be displayed in the title, main jumbotron, and navigation bar.
	'description'=>'A server status module for websites using the mcapi.ca API.', //This will be displayed under the title on all pages.
	'theme'=>'yeti'); //This is the name of the theme you wish to load. You can find a list of compatible themes at http://bootswatch.com/.
?>
<html lang="en">
	<head>
		<title>Server Status</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/<?php echo $info['theme']; ?>/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=""><?php echo $info['title']; ?></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="">Status</a></li>
					<li><a href="https://github.com/mathhulk/mc-server-status">GitHub</a></li>
					<li><a href="https://mcapi.ca">MCAPI</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="https://theartex.net">made by mathhulk</a></li>
				</ul>
			</div>
		  </div>
		</nav>
		
		<div class="container">
			<div class="jumbotron">
				<h1><br><?php echo $info['title']; ?></h1> 
				<p><?php echo $info['description']; ?></p>
				<p><a data-toggle="modal" data-target="#help"class="btn btn-primary btn-md">Information</a></p>
			</div>
			
			<div class="jumbotron">
				<h2>Default Statistics <small><?php echo $data['error']; ?></small></h2>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Data</th>
							<th style="text-align: right">Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>IP</td>
							<td style="text-align: right"><?php echo $data['ip']; ?></td>
						</tr>
						<tr>
							<td>Port</td>
							<td style="text-align: right"><?php echo $data['port']; ?></td>
						</tr>
						<tr>
							<td>Minecraft Version</td>
							<td style="text-align: right"><?php echo $data['minecraft']; ?></td>
						</tr>
						<tr>
							<td>Server Protocol</td>
							<td style="text-align: right"><?php echo $data['protocol']; ?></td>
						</tr>
						<tr>
							<td>Online Players</td>
							<td style="text-align: right"><?php echo $data['online_players']; ?></td>
						</tr>
						<tr>
							<td>Max Players</td>
							<td style="text-align: right"><?php echo $data['max_players']; ?></td>
						</tr>
						<tr>
							<td>MOTD</td>
							<td style="text-align: right"><?php echo $data['motd']; ?></td>
						</tr>
						<tr>
							<td>Friendly MOTD</td>
							<td style="text-align: right"><?php echo $data['friendly_motd']; ?></td>
						</tr>
						<tr>
							<td>Icon</td>
							<td style="text-align: right"><?php echo $data['icon']; ?></td>
						</tr>
					</tbody>
				</table>
				<h2>&nbsp;<br>Extra Statistics <small> <?php echo $extra['error']; ?></small></h2>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Data</th>
							<th style="text-align: right">Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>IP</td>
							<td style="text-align: right"><?php echo $extra['ip']; ?></td>
						</tr>
						<tr>
							<td>Port</td>
							<td style="text-align: right"><?php echo $extra['port']; ?></td>
						</tr>
						<tr>
							<td>Minecraft Version</td>
							<td style="text-align: right"><?php echo $extra['minecraft']; ?></td>
						</tr>
						<tr>
							<td>Server Version</td>
							<td style="text-align: right"><?php echo $extra['server']; ?></td>
						</tr>
						<tr>
							<td>Online Players</td>
							<td style="text-align: right"><?php echo $extra['online_players']; ?></td>
						</tr>
						<tr>
							<td>Max Players</td>
							<td style="text-align: right"><?php echo $extra['max_players']; ?></td>
						</tr>
						<tr>
							<td>MOTD</td>
							<td style="text-align: right"><?php echo $extra['motd']; ?></td>
						</tr>
						<tr>
							<td>Map</td>
							<td style="text-align: right"><?php echo $extra['map']; ?></td>
						</tr>
						<tr>
							<td>Icon</td>
							<td style="text-align: right"><?php echo $extra['icon']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div id="help" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" aria-hidden="true" type="button" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<p>Out of all the APIs I could find, mcapi.ca seemed to be the most up-to-date. However, when looking at the API, some of its features are unusable and cannot be displayed. At first, I was planning to release default statistics and extra statistics, but mcapi.ca's extensive feature doesn't seem to be working. Along with that, no APIs that fully supported the grasping of server icons could be found. I will try to fix these issues as soon as possible.</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
