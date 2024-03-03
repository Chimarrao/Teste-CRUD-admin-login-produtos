<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Table;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('admin'))
            ->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->append($this->renderProdutos());
                });
            });
    }

    protected function renderProdutos()
    {
        $produtos = Produto::all();

        $table = new Table(['ID', 'Nome', 'SKU', 'Preço', 'Imagens'], $produtos->toArray());

        return $table->render();
    }
}
