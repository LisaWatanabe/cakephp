<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NextBoard $nextBoard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Next Board'), ['action' => 'edit', $nextBoard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Next Board'), ['action' => 'delete', $nextBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nextBoard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Next Boards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Next Board'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Next Boards'), ['controller' => 'NextBoards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Next Board'), ['controller' => 'NextBoards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Next Boards'), ['controller' => 'NextBoards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Next Board'), ['controller' => 'NextBoards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nextBoards view large-9 medium-8 columns content">
    <h3><?= h($nextBoard->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent Next Board') ?></th>
            <td><?= $nextBoard->has('parent_next_board') ? $this->Html->link($nextBoard->parent_next_board->title, ['controller' => 'NextBoards', 'action' => 'view', $nextBoard->parent_next_board->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $nextBoard->has('person') ? $this->Html->link($nextBoard->person->name, ['controller' => 'People', 'action' => 'view', $nextBoard->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($nextBoard->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($nextBoard->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nextBoard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($nextBoard->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($nextBoard->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Next Boards') ?></h4>
        <?php if (!empty($nextBoard->child_next_boards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Person Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nextBoard->child_next_boards as $childNextBoards): ?>
            <tr>
                <td><?= h($childNextBoards->id) ?></td>
                <td><?= h($childNextBoards->parent_id) ?></td>
                <td><?= h($childNextBoards->person_id) ?></td>
                <td><?= h($childNextBoards->title) ?></td>
                <td><?= h($childNextBoards->content) ?></td>
                <td><?= h($childNextBoards->lft) ?></td>
                <td><?= h($childNextBoards->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NextBoards', 'action' => 'view', $childNextBoards->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NextBoards', 'action' => 'edit', $childNextBoards->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextBoards', 'action' => 'delete', $childNextBoards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childNextBoards->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
