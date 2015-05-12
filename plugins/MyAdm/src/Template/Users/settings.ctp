<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - Configurações de conta') ?>

<div class="page-header">
    <h1 class="title">Configurações de conta</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Configurações de conta',
        ]
    ]) ?>
</div>

<div class="container-widget">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<?= $this->Form->create($user, ['type' => 'file']) ?>
				<div class="row">
					<div class="col-md-4 text-center col-md-offset-4">
						<?php
							echo $this->Form->label('imagem_perfil_file', 'Imagem de Perfil');
							echo '<br>';
							echo $this->Html->image($user->imagem_perfil_trabalhada,
								['class' => 'img-circle', 'width' => 100, 'style' => 'padding: 10px 0;']);

							echo $this->Form->input('imagem_perfil_file',
								['type' => 'file', 'label' => false]);
						?>	
					</div>
				</div>
				<?php
						echo $this->Form->input('name', ['label' => 'Nome']);
						echo $this->Form->input('email');
						echo $this->Form->submit('Alterar dados da conta', ['bootstrap-type' => 'danger']);
					echo $this->Form->end();
				?>		

				<hr>

				<?php
					echo $this->Form->create($user);
						echo $this->Form->input('current_password', ['label' => 'Senha atual', 'type' => 'password']);
						echo $this->Form->input('new_password', ['label' => 'Nova senha', 'type' => 'password']);
						echo $this->Form->input('confirm_password', ['label' => 'Confirmar nova senha', 'type' => 'password']);
						echo $this->Form->button('Trocar senha', ['bootstrap-type' => 'danger']);
					echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>