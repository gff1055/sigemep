@extends('templates.basic')

@section('content')

<section class="topMenuBar">
	
	<div class="itemTopMenuBar">
		<div id="menuToggle">
			<input type="checkbox" />
			<span></span>
			<span></span>
			<span></span>
			<ul id="menu">
				<a href="#"><li>Home</li></a>
				<a href="#"><li>About</li></a>
				<a href="#"><li>Info</li></a>
				<a href="#"><li>Contact</li></a>
				<a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
			</ul>
		</div>
	</div>
		<!--<div class="subMenuSandwich">
			<ul>
				<li> Opcao1 </li>
				<li> Opcao1 </li>
				<li> Opcao1 </li>
			</ul>
		</div>-->
	
	<div class="itemTopMenuBar"><span class="logo">KlinicK</span></div>
	<div class="itemTopMenuBar"><a href="#">Seguranca</a></div>
	<div class="itemTopMenuBar"><a href="#">Ajuda</a></div>
	<div class="itemTopMenuBar"><a href="#">Contato</a></div>
</section>



	
@endsection
