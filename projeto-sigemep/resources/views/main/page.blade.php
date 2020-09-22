@extends('templates.basic')

@section('content')
	
@endsection
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
				<a href="{{ route('user.login') }}"><span class="typeAccessClick">Paciente</span></a>
			</div>
		</section>
	</body>
@endsection
