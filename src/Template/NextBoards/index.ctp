<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NextBoard[]|\Cake\Collection\CollectionInterface $nextBoards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Next Board'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nextBoards index large-9 medium-8 columns content">
    <h3><?= __('Next Boards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('person_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nextBoards as $nextBoard): ?>
            <tr>
                <td><?= $this->Number->format($nextBoard->id) ?></td>
                <td><?= $nextBoard->has('parent_next_board') ? $this->Html->link($nextBoard->parent_next_board->title, ['controller' => 'NextBoards', 'action' => 'view', $nextBoard->parent_next_board->id]) : '' ?></td>
                <td><?= $nextBoard->has('person') ? $this->Html->link($nextBoard->person->name, ['controller' => 'People', 'action' => 'view', $nextBoard->person->id]) : '' ?></td>
                <td><?= h($nextBoard->title) ?></td>
                <td><?= h($nextBoard->content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nextBoard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nextBoard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nextBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nextBoard->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
