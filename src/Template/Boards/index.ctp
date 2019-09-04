<h1>掲示板</h1>
<p><?=$this->Html->link('※投稿する',['action' => 'add']) ?></p>
<div>
	<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>title</th>
	</tr>
		<?php foreach ($data as $obj): ?>
		<?=$this->Html->tableCells(
			[
				$obj['id'],
				$obj['person']['name'],
				$obj['title']
			],
			['style' => 'color:#000066; background-color:#CCCCFF'],
			['style' => 'color:#006600; background-color:#EEFFEE'],
			false, true) ?>
		<?php endforeach; ?>
	</table>
</div>
<p><?=$this->Html->link('一覧に戻る', ['action' => 'index']) ?></p>

