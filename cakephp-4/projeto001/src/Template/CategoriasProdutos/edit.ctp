<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriasProduto $categoriasProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoriasProduto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasProduto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorias Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriasProdutos form large-9 medium-8 columns content">
    <?= $this->Form->create($categoriasProduto) ?>
    <fieldset>
        <legend><?= __('Edit Categorias Produto') ?></legend>
        <?php
            echo $this->Form->control('nome_categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
