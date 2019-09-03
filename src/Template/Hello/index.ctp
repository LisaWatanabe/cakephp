<<<<<<< HEAD
=======
<h1>サンプル見出し</h1>
<p>これはサンプルページ</p>
<?=$this->Form->create() ?>
<fieldset>
	<?=$this->Form->text('name') ?>
	<?=$this->Form->password('password') ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>
<!-- <div><?=$this->Flash->render('info') ?></div> -->
>>>>>>> master
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="content-type" content="text/html;
	 charset=UTF-8">
	<title>Hello Page</title>
</head>
<body>
	<h1>サンプル見出し</h1>
		<p>こんにちは！これは、CakePHPのサンプルです。</p>
		<?=date('Y/m/d', time())    ?>
</body>
</html> -->


<!-- GET -->
<!-- 	<h1>サンプル見出し</h1>
	<p>フォームの送信</p>
	<form method="get" action="hello/sendForm">
 -->		<!-- hiddenを書くことによって選択していない場合に項目とoffを表示させることができる -->
<!-- 		<input type="hidden" name="check1" value="off">
		<input type="hidden" name="radio1" id="r1" value="off">
		<input type="checkbox" name="check1" id="c1">
			<label for="c1">チェック</label><br>
		<input type="radio" name="radio1" id="r1" value="No.1">
			<label for="r1">ラジオ1</label><br>
		<input type="radio" name="radio1" id="r2" value="No.2">
			<label for="r2">ラジオ2</label><br>
		<select name="select1">
			<option value="Windows">Windows</option>
			<option value="Linux">Linux</option>
			<option value="MacOSX">MacOSX</option>
		</select>
 -->		<!-- <input type="text" name="text1"> -->
<!-- 		<input type="submit">
	</form> -->
<!-- 		<p>こんにちは！これは、CakePHPのサンプルです。</p>
		<br/><br/>
		<?=date('Y/m/d', time())    ?>-->



<!-- POST -->
<!-- 	<h1>サンプル見出し</h1>
	<p>フォームの送信</p>
	<form method="post" action="hello/sendForm">
		<input type="text" name="text1">
		<input type="submit">
	</form>
 -->



<!-- Formヘルパー -->
<h1>サンプル見出し</h1>
<!-- <p>
	<?=$result; ?>
</p> -->
<<<<<<< HEAD
=======
<p>これはサンプルページです。</p>
>>>>>>> master
<?=$this->Form->create(null,
	['type'=>'post', 'url'=>['controller'=>'Hello',
	'action'=>'index']]) ?>
	<?=$this->Form->text("HelloForm.text1") ?>
	<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

<!-- 上記Formヘルパーで生成されたinput Formのコード↓ -->
<!-- <form method="post" accept-charset="utf-8" action="hello">
	<div style="display: none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<input type="text" name="HelloForm[text1]">
	<div class="submit">
		<input type="submit" value="送信">
	</div>
</form>
 -->
<?=$this->Form->create(null,
		['type'=>'post', 'url'=>['action'=>'index']]) ?>
	<?=$this->Form->checkbox("HelloForm.check1",
		['checked'=>true]) ?>
	<?=$this->Form->label('HelloForm.check1') ?>
	<br>
	<?=$this->Form->checkbox("HelloForm.check2") ?>
	<?=$this->Form->label('HelloForm.check2') ?>
	<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>
<!-- 上記Formヘルパーで生成されたcheckbox Formのコード↓ -->
<!-- <form method="post" accept-charset="utf-8" index="index" action="hello">
	<div style="display: none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<input type="hidden" name="HelloForm[check1]" value="0">
	<input type="checkbox" name="HelloForm[check1]" value="1" checked="checked">
	checkbox

	<div class="submit">
		<input type="submit" value="送信">
	</div>
</form>
 -->

<!-- ラジオボタン -->
<?=$this->Form->create(null,
['type'=>'post', 'url'=>['action'=>'index']]) ?>
<?=$this->Form->radio("HelloForm.radio1",
	[
		['text'=>'ウィンドウズ', 'value'=>'Windows'],
		['text'=>'リナックス', 'value'=>'Linux'],
		['text'=>'マックOS', 'value'=>'MacOS']
	],
	['label'=>true]) ?>
<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

<!-- 選択リスト -->
<?=$this->Form->create(null,
['type'=>'post', 'url'=>['action'=>'index']]) ?>
<?=$this->Form->select('HelloForm.select1',
	[
	'ウィンドウズ'=>'Windows','リナックス'=>'Linux','マックOS'=>'MacOS X'
	],
	['size'=>5, 'multiple'=>true, 'empty'=>'項目を選んでください']) ?>
<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

<!-- 階層的な項目 -->
<?=$this->Form->create(null,
['type'=>'post', 'url'=>['action'=>'index']]) ?>
<?=$this->Form->select('HelloForm.select1',
	[
	'PC'=>[
	'ウィンドウズ'=>'Windows',
	'リナックス'=>'Linux',
	'マックOS'=>'macOS'
	],
	'mobile'=>[
	'アンドロイド'=>'Android',
	'アイフォン'=>'iPhone',
	'ガラケー'=>'cellphone'
	]
	],
	['size'=>10, 'multiple'=>true, 'empty'=>'項目を選んでください']) ?>
<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

<<<<<<< HEAD
<!-- 日時の入力フォーム生成 -->
=======
<!-- 日時の入力フォーム生成 --><!-- 
>>>>>>> master
<pre>
	<?php print_r($result); ?>
</pre>
<?php
	echo $this->Form->create(null,
	['type'=>'post', 'url'=>['action'=>'index']]);
	echo $this->Form->dateTime('HelloForm.date');
	echo $this->Form->submit("送信");
	echo $this->Form->end();

<<<<<<< HEAD
?>
=======
?> -->
>>>>>>> master












