<style>
div.flashInfo {
	text-align::right;
	font-size:16pt;
		font-weight:bold;
		background-color: #60a060;
		color: white;
}
</style>
<div class="message flashinfo" onclick=$this.class.add('hidden'); >
<?= h($message) ?>
</div>