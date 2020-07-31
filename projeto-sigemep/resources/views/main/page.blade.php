<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
		<title></title>
	</head>
	<body class="bodyMainPage">
		<section class="topMenuBar">
			<div class="itemTopMenuBar"><span class="logo">KlinicK</span></div>
			<div class="itemTopMenuBar"><a href="#">Seguranca</a></div>
			<div class="itemTopMenuBar"><a href="#">Ajuda</a></div>
			<div class="itemTopMenuBar"><a href="#">Contato</a></div>
		</section>
		<div class="beginning">
		Escolha o tipo de acesso!<br>
		
		</div>
		<!-- AQUI PODE SER GRID AO INVES DE FLEX? -->
		<section class="chooseTypeAccess">
			
			<div class="typeAccess" id="accessDoc">
				<a href="{{ route('doctor.login')}}"><span class="typeAccessClick">Médico Parceiro</span></a>
			</div>

			<div class="typeAccess" id="accessPat">
				<a href="{{ route('user.login') }}"><span class="typeAccessClick">Usuário</span></a>
			</div>
		</section>
	</body>
</html>