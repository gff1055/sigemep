@extends('templates.basic')
@section('content')

<section class="topMenuBar">
	<div class="itemTopMenuBar"><span class="logo">KlinicK</span></div>
	<div class="itemTopMenuBar"><a href="#">Seguranca</a></div>
	<div class="itemTopMenuBar"><a href="#">Ajuda</a></div>
	<div class="itemTopMenuBar"><a href="#">Contato</a></div>
</section>

	{!! Form::open([
		'route' => 'user.store',
		'class' => 'formUserRegister'
		])
	!!}

	<hr>
	<div class="formUserRegisterTitle"> <span class="logo">KliNicK</span>
		<br>
		Crie sua conta e faça consultas com medicos on-line de varias especialidades
	</div>
	<hr>

		{!! Form::text('name', null, [
			'class'=>'atrForm',
			'placeholder'=>'Nome'
		]) !!}

		{!! Form::text('username', null, [
			'class'=>'atrForm',
			'placeholder'=>'Usuario'
		]) !!}

		{!! Form::password('password', [
			'class'=>'atrForm atrSizeHalf',
			'placeholder'=>'Senha'
		]) !!}

		{!! Form::password('password', [
			'class'=>'atrForm atrSizeHalf',
			'placeholder'=>'Confirmar senha'
		]) !!}

		{!! Form::text('email', null, [
			'class'=>'atrForm',
			'placeholder'=>'Email'
		]) !!}

		{!!
		Form::Label('sexo', 'Sexo: ')!!}
		{!! Form::select('sexo', array(
			'masculino' => 'Masculino',
			'feminino' => 'Feminino'
		),[
			'class'=>'atrForm',
		]) !!}

		{!! Form::text('dataNasc', null, [
			'class'=>'atrForm',
			'placeholder'=>'Data de Nascimento'
		]) !!}

		{!! Form::text('phone', null, [
			'class'=>'atrForm',
			'placeholder'=>'Fone'
		]) !!}

		{!!Form::submit('Criar conta',[
			'class' => 'atrForm'
		])
			!!}
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
@endsection