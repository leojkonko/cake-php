<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriasProduto $categoriasProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorias Produto'), ['action' => 'edit', $categoriasProduto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorias Produto'), ['action' => 'delete', $categoriasProduto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasProduto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorias Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriasProdutos view large-9 medium-8 columns content">
    <h3><?= h($categoriasProduto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Categoria') ?></th>
            <td><?= h($categoriasProduto->nome_categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoriasProduto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($categoriasProduto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($categoriasProduto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($categoriasProduto->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Produto') ?></th>
                <th scope="col"><?= __('Categorias Produto Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoriasProduto->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->id) ?></td>
                <td><?= h($produtos->nome_produto) ?></td>
                <td><?= h($produtos->categorias_produto_id) ?></td>
                <td><?= h($produtos->created) ?></td>
                <td><?= h($produtos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
