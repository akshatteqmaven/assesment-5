<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail $userDetail
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userDetails form content">
            <?= $this->Form->create($userDetail) ?>
            <fieldset>
                <legend><?= __('Edit User Detail') ?></legend>
                <?php
                echo $this->Form->control('users_id', ['options' => $users]);
                echo $this->Form->control('address');
                echo $this->Form->control('bank');
                echo $this->Form->control('modified_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>