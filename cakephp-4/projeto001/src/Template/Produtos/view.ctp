<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias Produtos'), ['controller' => 'CategoriasProdutos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorias Produto'), ['controller' => 'CategoriasProdutos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Produto') ?></th>
            <td><?= h($produto->nome_produto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorias Produto') ?></th>
            <td><?= $produto->has('categorias_produto') ? $this->Html->link($produto->categorias_produto->id, ['controller' => 'CategoriasProdutos', 'action' => 'view', $produto->categorias_produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
</div>
