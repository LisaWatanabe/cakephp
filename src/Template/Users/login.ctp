<div class="users form">
	<?=$this->Flash->render('auth') ?>
	<?=$this->Form->create() ?>
	<fieldset>
		<legend>アカウント名とパスワードを入力ください。</legend>
		<?=$this->Form->input('username') ?>
		<?=$this->Form->input('password') ?>
	</fieldset>
	<?=$this->Form->button(__('送信')); ?>
	<?=$this->Form->end() ?>
</div>