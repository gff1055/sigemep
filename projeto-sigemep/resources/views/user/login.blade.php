<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
		<title></title>
	</head>
	<body id="bodyPaginaInicial">
		<section id="conteudo-view" class="login">
			{!!Form::open([
				'route'=>'user.login',
				'method'=>'post',
				'class' => 'formLogin'
			]) !!}
				Entrar
				<br>
				<br>

				{!! Form::text('username', null, [
					'class' => 'atrForm',
					'placeholder' => "Usuario"
				]) !!}
				<br>
				{!! Form::password('password', [
					'class' => 'atrForm',
					'placeholder' => 'Senha'
				]) !!}
				<br>
				{!! Form::submit('Entrar', [
					'class' => 'atrForm',
				]) !!}
				{!! Form::close() !!}

			{!! Form::close() !!}
		</section>
	</body>
</html>