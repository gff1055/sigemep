@extends('templates.basic')
@section('content')

<section class="topMenuBar">
	<div class="itemTopMenuBar"><span class="logo">KlinicK</span></div>
	<div class="itemTopMenuBar"><a href="#">Seguranca</a></div>
	<div class="itemTopMenuBar"><a href="#">Ajuda</a></div>
	<div class="itemTopMenuBar"><a href="#">Contato</a></div>
</section>
	<div class="divUserRegisterForm">
	{!! Form::open([
		'route' => 'user.store',
		'class' => 'formUserRegister'
		])
	!!}

	
	<div class="formUserRegisterTitle">
		<span class="logo">KliNicK</span>
		<br>
		Crie sua conta e faça consultas com medicos on-line de varias especialidades
		<br>
	</div>
	<br>	

		{!! Form::text('name', null, [
			'class'=>'atrForm',
			'placeholder'=>'Nome'
		]) !!}

		{!! Form::text('username', null, [
			'class'=>'atrForm',
			'placeholder'=>'Usuario'
		]) !!}
		<span id="passwordWarning"></span>
		
		{!! Form::password('password', [
			'class'=>'atrForm atrFormSizeHalf',
			'id' => 'password',
			'placeholder'=>'Senha'
		]) !!}

		{!! Form::password('checkPassword', [
			'class'=>'atrForm atrFormSizeHalf',
			'id' => 'checkPassword',
			'placeholder'=>'Confirmar senha'
		]) !!}

		{!! Form::text('email', null, [
			'class'=>'atrForm',
			'placeholder'=>'Email'
		]) !!}

		{!! Form::text('dataNasc', null, [
			'class'=>'atrForm atrFormSizeHalf',
			'placeholder'=>'Data de Nascimento'
		]) !!}

		{!!Form::Label('sexo', 'Sexo: ')!!}
		{!! Form::select('sexo', array(
			'masculino' => 'Masculino',
			'feminino' => 'Feminino'
		),[
			'class'=>'atrForm',
		]) !!}

		{!! Form::text('phone', null, [
			'class'=>'atrForm',
			'placeholder'=>'Fone'
		]) !!}

		<div class="divBtEnviar">
		{!!Form::submit('Criar conta',[
			'class' => 'atrForm',
			'id' => 'submitUserRegister'
		])
			!!}
		</div>
		<br>
		<div class="formUserRegisterTitle">Ao me cadastrar eu concordo com os <a href="">termos e usos</a> da KliNick Serviços Medicos</div>
		<br>

<!--
		nome - 		input text
		login - 	--
		password - 	password
		email -		input text
		sexo -		combobox
		*rua -		input text
		*bairro -	--
		*num -		--
		*compl - 	--
		*estad -		--
		*cidad -		--
		*dataNasc -	--
		whatsapp -	--
		phone -		--

	-->	

	{!!Form::close()!!}
	<script src="{{asset('js/checkFormRegister.js')}}"></script>
	</div>
@endsection