<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserDetail> $userDetails
 */
?>
<div class="userDetails index content">
    <?= $this->Html->link(__('New User Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('bank') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userDetails as $userDetail) : ?>
                    <tr>
                        <td><?= $this->Number->format($userDetail->id) ?></td>
                        <td><?= $userDetail->has('user') ? $this->Html->link($userDetail->user->first_name, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?></td>
                        <td><?= h($userDetail->address) ?></td>
                        <td><?= h($userDetail->bank) ?></td>
                        <td><?= h($userDetail->created_date) ?></td>
                        <td><?= h($userDetail->modified_date) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $userDetail->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userDetail->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>