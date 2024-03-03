<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Grid;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->row(view('admin'))
            ->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->append($this->renderProdutos());
                });
            });
    }

    protected function renderProdutos()
    {

        $grid = new Grid(new Produto());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('imagens', __('Imagens'))->image('', 150, 150);
        $grid->column('nome', __('Nome'));
        $grid->column('sku', __('SKU'));
        $grid->column('preco', __('Preço'));

        return $grid;
    }
}
