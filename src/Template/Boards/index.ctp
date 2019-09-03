<h1><?=$this->RgbText->redString('掲示板') ?></h1>
<p><?=$this->RgbText->greenLink('※投稿する','/boards/add') ?></p>
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
		['style' =>'color:#000066; backgournd-color: #CCCCFF'],
		['style' =>'color:#006600; backgournd-color: #EEFFEE'],
		false, true) ?>
		<?php endforeach; ?>
	</table>
</div>
<?=$this->RgbText->blueLink('※トップに戻る','/') ?>
<?php echo $this->element('SampleBanner'); ?>
