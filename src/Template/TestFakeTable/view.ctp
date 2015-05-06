<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Test Fake Table'), ['action' => 'edit', $testFakeTable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Test Fake Table'), ['action' => 'delete', $testFakeTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testFakeTable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Test Fake Table'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Fake Table'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="testFakeTable view large-10 medium-9 columns">
    <h2><?= h($testFakeTable->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($testFakeTable->name) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($testFakeTable->password) ?></p>
            <h6 class="subheader"><?= __('Sex') ?></h6>
            <p><?= h($testFakeTable->sex) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($testFakeTable->id) ?></p>
            <h6 class="subheader"><?= __('Idade') ?></h6>
            <p><?= $this->Number->format($testFakeTable->idade) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Birthdate') ?></h6>
            <p><?= h($testFakeTable->birthdate) ?></p>
        </div>
    </div>
</div>
