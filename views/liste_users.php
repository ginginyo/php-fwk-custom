<table>
	<?php foreach ($users as $user) : ?>
		<tr>
			<td><?= $user->getName(); ?></td>
			<td><?= $user->getGenre(); ?></td>
		</tr>
	<?php endforeach; ?>
</table>