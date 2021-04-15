<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script defer src="{{ asset('js/ruben.js') }}"></script>
	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<title>Document</title>
</head>

<body>
	<h1>Dev Rubén Sandbox</h1>
	<div id="values">
		<select name="curs" value="Curs">
			<option value="1r">1r</option>
			<option value="2n">2n</option>
		</select>
		<input type="text" placeholder="Nom del curs" name="career_name">
		<input type="text" placeholder="Nom alumne" name="users_name">
		<input type="text" placeholder="Primer cognom" name="users_surname">
		<input type="text" placeholder="Segon cognom" name="users_surname2">
		<button type="submit" name="filter">Filtra solicituds</button>
	</div>
</body>
</html>