<section>
		<article>
			<header>
				<h2><?php echo $postagem->titulo ?></h2>
			</header>

			<p><?php echo $postagem->conteudo ?></p>

			<br>
			<hr>
			<br>

			<form method="post" action="http://localhost/teste/?pagina=post&metodo=addComent">
				<span>Nome:</span><br>
				<input type="text" name="nome"><br><br>

				<span>Mensagem:</span><br>
				<textarea name="msg"></textarea><br><br>

				<input type="hidden" name="id" value="{{id}}">

				<input type="submit" value="Enviar">
			</form>
			<br><br>

			<!-- TODO: Carregar os comentários abaixo -->
			<?php if ($postagem->comentarios == false): ?>
				<p>Nenhum comentário encontrado para essa postagem</p>
			<?php else: ?>
				<?php foreach ($postagem->comentarios as $coment): ?>
					<h3><?php echo $coment->nome ?></h3>
					<p><?php echo $coment->mensagem ?></p>
					<br>
				<?php endforeach ?>
			<?php endif ?>

		</article>

</section>