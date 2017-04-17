<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://celke.com.br/">Marcelo Navarro</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuário<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="administrativo.php?link=2">Usuário</a></li>
						<li><a href="administrativo.php?link=6">Nivel de Acesso</a></li>
						<li><a href="administrativo.php?link=10">Situação Usuário</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artigos<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="administrativo.php?link=55">Listar Artigos</a></li>
						<li><a href="administrativo.php?link=50">Categoria do Artigo</a></li>
						<li><a href="administrativo.php?link=51">Situação do Artigo</a></li>
						<li><a href="administrativo.php?link=59">Listar Comentários</a></li>
					</ul>
				</li>
				<li><a href="#">Home</a></li>
			</ul>
			<div class="navbar-form navbar-right">					
				<a href="sair.php"><button type="submit" class="btn btn-success">Sair</button></a>
			</div>
		</div><!--/.nav-collapse -->				
	</div>
</nav>