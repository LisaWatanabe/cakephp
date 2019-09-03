<style>
	.error { color: red; font-size: smaller; font-weight: bold; }
</style>
<h1>Databaseサンプル</h1>
<?=$this->Form->create($entity, ['url'=>['action'=>'addRecord']]) ?>
<fieldset>
	<div class="error"><?=$this->Form->error('name') ?></div>
	<p><?=$this->Form->text('name') ?></p>
	<div class="error"><?=$this->Form->error('title') ?></div>
	<p><?=$this->Form->text('title') ?></p>
	<div class="error"><?=$this->Form->error('content') ?></div>
	<p><?=$this->Form->textarea('content') ?></p>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>
</fieldset>
<script>
	var nameElement = document.querySelector('#name');
	nameElement.addEventListener('invalid',function(e){
		if(nameElement.validity.valueMissing){
			e.target.setCustomValidity("ちゃんと入力してね");
		} else if(!nameElement.validity.valid){
		}
	}, false);
</script>
