<?php

namespace App\DataTables;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\RegularPrice;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BrandWisePurchaseListDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item" id="purchaseEntry" href="' . route('purchase.entry', $row->id) . '">Entry</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    protected $brandId;

    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }
    public function query()
    {
        $product = Product::where('brand_id', $this->brandId)->first();
        $query = Purchase::query()->where('product_id', $product->id)->orderBy('created_at', 'desc');
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('productdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex', 'S/L'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('invoice_number'),
            Column::computed('product'),
            Column::make('quantity'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Product_' . date('YmdHis');
    }
}
