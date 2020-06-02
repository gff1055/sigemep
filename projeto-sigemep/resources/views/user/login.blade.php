<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
		<title></title>
	</head>
	<body class="bodyPaginaLogin">
		<section id="conteudo-view">
			<div class="divFormLogin">
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

					<div class="divBtEnviar">
						{!! Form::submit('Entrar', [
							'class' => 'atrForm',
						]) !!}
					</div>

					{!! Form::close() !!}

				{!! Form::close() !!}
			</div>
		</section>
	</body>
</html>