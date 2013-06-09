<?php
function cleanAttrs($code) {
	return preg_replace("/ (style|class|rel|width|height|alt|id)='(([a-zA-Z0-9]*)\s*)*'/", "", $code);
}

function getData($api, $name) {
	$curl = curl_init("http://api.dotaprj.me/jd/matches/v130/api.json");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$json = curl_exec($curl);
	curl_close($curl);

	$dota = json_decode($json, true);

	$count = count($dota[$name]);

	for($i = 0; $i < $count; $i++) {
		echo cleanAttrs($dota[$name][$i]) . "\n";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dota 2: Upcoming Matches</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400|Lato:400,700" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style>
		body {
			padding: 20px 0;
			background-color: #002742;
			color: #fff;
			font-weight: 400;
			font-family: "Open Sans", sans-serif; }

		.header { margin-bottom: 50px; }

		.header h1, .header h2, h4 {
			text-align: center;
			text-transform: uppercase;
			text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
			font-weight: 700;
			font-family: "Lato", sans-serif;
			line-height: 1; }

		.header h1 {
			margin: 0;
			color: #B23E2C;
			font-size: 60px; }

		.header h4 {
			margin: 0 !important;
			letter-spacing: 3px; }

		.matches {
			color: #747C81;
			font-weight: 400;
			font-size: 16px; }

		.table {
			background-color: #1A3D55;
			color: #fff;
			table-layout: fixed; }

		.table td {
			padding: 5.5px;
			border-top: 1px solid #002742; }
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="span4 offset4 header">
			<h1>Dota 2</h1>
			<h4 class="matches">Upcoming Matches</h2>
		</div><!--/.span4 -->
		<div class="clearfix"></div>
		<div class="span4">
			<h4 class="matches">Upcoming Matches</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/jd/matches/v130/api.json", "eventSoon"); ?>
				</tbody>
			</table>
		</div><!--/.span4 -->
		<div class="span5">
			<h4 class="matches">Recent Results</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/jd/matches/v130/api.json", "eventDone"); ?>
				</tbody>
			</table>
		</div><!--/.span5 -->
		<div class="span3">
			<h4 class="matches">Live Streams</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/stream/v150/api.json", "stream"); ?>
				</tbody>
			</table>
		</div><!--/.span3 -->
		<div class="span4">
			<h4 class="matches">VODs</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/stream/v150/api.json", "vod"); ?>
				</tbody>
			</table>
		</div><!--/.span4 -->
		<div class="span4">
			<h4 class="matches">joinDota News</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/rankings/v150/api.json", "jd"); ?>
				</tbody>
			</table>
		</div><!--/.span4 -->
		<div class="span4">
			<h4 class="matches">GosuGamers News</h4>
			<table class="table">
				<tbody>
					<?php getData("http://api.dotaprj.me/rankings/v150/api.json", "gg"); ?>
				</tbody>
			</table>
		</div><!--/.span4 -->
	</div><!--/.row -->
</div><!--/.container -->
</body>
</html>