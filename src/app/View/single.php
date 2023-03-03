<section>
		<article>
			<header>
				<h2><?php echo $postagem->titulo ?></h2>
			</header>

			<p><?php echo $postagem->conteudo ?></p>

			<br>
			<hr>
			<br>

			<form method="post" action="http://localhost/PROJS/VIDEO_AULAS/SERIE/02_PHP+MVC+CRUD/?pagina=post&metodo=addComent">
				<span>Nome:</span><br>
				<input type="text" name="nome"><br><br>

				<span>Mensagem:</span><br>
				<textarea name="msg"></textarea><br><br>

				<input type="hidden" name="id" value="{{id}}">

				<input type="submit" value="Enviar">
			</form>
			<br><br>

			<!-- TODO: Carregar os comentários abaixo -->

		</article>

</section>