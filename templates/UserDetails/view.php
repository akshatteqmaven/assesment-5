<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail $userDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Detail'), ['action' => 'edit', $userDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Detail'), ['action' => 'delete', $userDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userDetails view content">
            <h3><?= h($userDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userDetail->has('user') ? $this->Html->link($userDetail->user->first_name, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($userDetail->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($userDetail->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($userDetail->modified_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Bank') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($userDetail->bank)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>