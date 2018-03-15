<div class="container">
<?php foreach ($this->post as $p) : ?>
	<div class="block" style="transition: all 1s ease, opacity 1.5s ease; opacity: 1;">
		<?= isset($this->detail[$p->id][1]) ? $this->detail[$p->id][1]->content . '<br />' : '' ?>
	</div>
<?php endforeach; ?>
</div>