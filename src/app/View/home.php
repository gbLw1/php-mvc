<section>
	<h1>Postagens:</h1>

	<?php
	foreach ($colecPostagens as $postagem):

		echo "<article>";
			echo "<header>";
				echo "<h2>";
					echo "<a href='?pagina=post&id=" . $postagem->id . "'>";
						echo $postagem->titulo;
					echo "</a>";
				echo "</h2>";
			echo "</header>";

			echo "<p>" . $postagem->conteudo . "</p>";

		echo "</article>";

	endforeach;
	?>

</section>