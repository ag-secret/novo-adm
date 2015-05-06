<?php if (isset($bcOptions)): ?>
	<ol class="breadcrumb">
		<?php if (isset($bcOptions['children'])): ?>
			<?php foreach ($bcOptions['children'] as $value): ?>
				<li>
					<?= $this->Html->link($value['text'], $value['url']) ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>
		<li class="active">
			<?= $bcOptions['active'] ?>
		</li>
	</ol>
<?php endif ?>