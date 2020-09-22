@extends('templates.basic')

@section('content')

	<body class="bodyPaginaLoginUser">
		<div class="divMaskBackgroundImage">
			<section id="conteudo-view">
				<div class="divFormLogin">
					{!!Form::open([
						'route'=>'user.login_post',
						'method'=>'post',
						'class' => 'formLogin'
					])!!}

						<span class="logo">KliNicK</span>
						<br>
						Fazer Login
						<br><br>

						<svg class="bi bi-person-fill icone" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg>
						{!! Form::text('username', null, [
							'class' => 'atrForm',
							'placeholder' => "Usuario ou Email"
						]) !!}

						<br>

						<svg class="bi bi-lock-fill icone" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<rect width="11" height="9" x="2.5" y="7" rx="2"/>
							<path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
				  		</svg>

						{!! Form::password('password', [
							'class' => 'atrForm',
							'placeholder' => 'Senha'
						]) !!}

						<br><br>
						Não tem uma conta? <a href="{{ route('user.register_get') }}">Crie uma</a>
						<br><br>

						<div class="divBtEnviar">
							{!! Form::submit('Entrar', [
								'class' => 'atrForm',
							]) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</section>
		</div>
	</body>
@endsection
