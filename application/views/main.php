<!DOCTYPE html>
<html>
<head>
	<title>Pokes</title>
	<link rel="stylesheet" href="/CSS/main.css">
</head>
<body>
<div class="container">
	<div id="header">
		<a href="/users/logout/">Logout</a>
		<h2>Welcome, <?=$user['alias'];?>!</h2>
		<p><?=$totalPokes['count']?> people poked you!</p>
	</div>
	<div id="pokeHistory">
<?php foreach($recentPokes as $recentPoke){ ?>
		<p><?=$recentPoke['alias']?> poked you <?=$recentPoke['count']?> times.</p>
<?php } ?>
	</div>
	<div id="usersToPoke">
		<p>People you may want to poke:</p>
		<table>
			<thead>
				<th>Name</th>
				<th>Alias</th>
				<th>Email Address</th>
				<th>Poke History</th>
				<th>Action</th>
			</thead>
			<tbody>
<?php foreach($pokes as $poke){?>
				<tr><td><?=$poke['name']?></td>
				<td><?=$poke['alias']?></td>
				<td><?=$poke['email']?></td>
				<td><?=$poke['count']?> Pokes</td>
				<td><form action="/poke/<?=$poke['id']?>" method="post"><button>Poke!</button></form></td></tr>
<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>