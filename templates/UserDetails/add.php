<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail $userDetail
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userDetails form content">
            <?= $this->Form->create($userDetail) ?>
            <fieldset>
                <legend><?= __('Add User Detail') ?></legend>
                <?php
                echo $this->Form->control('bank');
                echo $this->Form->control('address');
                echo $this->Form->control('users_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>