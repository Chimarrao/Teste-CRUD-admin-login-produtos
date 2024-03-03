<?php

namespace App\Admin\Controllers;

use App\Models\Produto;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProdutoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produtos';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Produto());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('nome', __('Nome'));
        $grid->column('sku', __('SKU'));
        $grid->column('preco', __('Preço'));
        $grid->column('imagens', __('Imagens'))->image('', 50, 50);
        $grid->column('created_at', __('Criado em'));
        $grid->column('updated_at', __('Atualizado em'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Produto::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('nome', __('Nome'));
        $show->field('sku', __('SKU'));
        $show->field('preco', __('Preço'));
        $show->field('imagens', __('Imagens'))->image();
        $show->field('created_at', __('Criado em'));
        $show->field('updated_at', __('Atualizado em'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Produto());

        $form->display('id', __('ID'));
        $form->text('nome', __('Nome'))->rules('required');
        $form->text('sku', __('SKU'))->rules('required');
        $form->currency('preco', __('Preço'))->rules('required');
        $form->multipleImage('imagens', __('Imagens'))->removable()->sortable();
        $form->display('created_at', __('Criado em'));
        $form->display('updated_at', __('Atualizado em'));

        return $form;
    }
}
