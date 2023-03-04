<section>
	<article>
		<header>
			<h2>
				<?php echo $postagem->titulo ?>
			</h2>
		</header>

		<p>
			<?php echo $postagem->conteudo ?>
		</p>

		<br>
		<hr>
		<br>

		<!-- Inserir comentário -->
		<form method="post" action="?pagina=post&metodo=addComent">
			<span>Nome:</span><br>
			<input type="text" name="nome"><br><br>

			<span>Mensagem:</span><br>
			<textarea name="msg"></textarea><br><br>

			<input type="hidden" name="id" value="<?php echo $postagem->id ?>">

			<input type="submit" value="Enviar">
		</form>
		<br><br>

		<!-- Comentários -->
		<?php if ($postagem->comentarios == false): ?>
			<p>Nenhum comentário encontrado para essa postagem</p>
		<?php else: ?>
			<?php foreach ($postagem->comentarios as $coment): ?>
				<h3>
					<?php echo $coment->nome ?>
				</h3>
				<p>
					<?php echo $coment->mensagem ?>
				</p>
				<br>
			<?php endforeach ?>
		<?php endif ?>

	</article>

</section>