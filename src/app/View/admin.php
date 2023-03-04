<h1>Gerenciador de Conteúdo</h1>

<a href="http://localhost/teste/?pagina=admin&metodo=create">Criar Publicação</a><br><br>
<hr>
<br><table border="2">
	<tr>
		<th>ID</th>
		<th>TÍTULO</th>
		<th>ALTERAÇÃO</th>
		<th>DELEÇÃO</th>
	</tr>


	<?php foreach ($postagens as $postagem): ?>
	<tr>
		<th><?php echo $postagem->id ?></th>
		<th><?php echo $postagem->titulo ?></th>
		<th><a href="http://localhost/teste/?pagina=admin&metodo=change&id=<?php echo $postagem->id ?>">Alterar</a></th>
		<th><a href="http://localhost/teste/?pagina=admin&metodo=delete&id=<?php echo $postagem->id ?>">Deletar</a></th>
	</tr>
	<?php endforeach ?>

</table>