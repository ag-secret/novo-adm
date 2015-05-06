<div class="login-form">
	<?= $this->Form->create(null) ?>
		<div class="top">
			<?= $this->Html->image('Adm.logo.png') ?>
			<!-- <h1><?= $appName; ?></h1> -->
			<h4>Área administrativa</h4>
		</div>
		<div class="form-area">
			<div class="kode-alert kode-alert-icon kode-alert-click alert6">
				<?= $this->Flash->render() ?>
			</div>
			<div class="group">
				<input
					type="text"
					class="form-control"
					name="email"
					id="email"
					placeholder="Email"
					value="<?= $this->request->data('email')?>">
				<label for="email" class="fa fa-user"></label>
			</div>
			<div class="group">
				<input
					type="password"
					class="form-control"
					name="password"
					id="password"
					placeholder="Senha"
					value="<?= $this->request->data('password')?>">
				<label for="password" class="fa fa-key"></label>
				</div>
				<?= $this->Form->button('ENTRAR', ['class' => 'btn-block']) ?>
			</div>		
		</div>
	<?= $this->Form->end() ?>
</div>