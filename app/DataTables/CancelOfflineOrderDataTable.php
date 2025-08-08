<?php

namespace App\DataTables;

use App\Enums\StatusEnum;
use App\Models\OfflineOrder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CancelOfflineOrderDataTable extends DataTable
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
            ->editColumn('status', function ($row) {
                if ($row->status == StatusEnum::Rejected->value) {
                    $html = '<div class="col-sm-5"><a href="#" class="btn btn-info badge bg-danger">Cancel</a> </div>';
                    return $html;
                }
            })
            ->addColumn('customer_name', function ($row) {
                return $row->customerName->name ?? 'N/A';
            })
            ->addColumn('business', function ($row) {
                return $row->customerName->business_name ?? 'N/A';
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $html .= '<a class="dropdown-item border" href="' . route('offline.order.show', $row->id) . '">View Order</a>';
                $html .= '</div>';
                $html .= '</div>';

                return $html;
            })
            ->filter(function ($query) {
                if (request()->has('search') && !empty(request()->input('search')['value'])) {
                    $search = request()->input('search')['value'];
                    $query->whereHas('customerName', function ($query) use ($search) {
                        $query->where('business_name', 'like', '%' . $search . '%');
                    });
                }
            })
            ->rawColumns(['action','customer_name', 'status']);
    }

    public function query(OfflineOrder $model)
    {
        return $model->newQuery()->where('status', StatusEnum::Rejected->value)->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dealershipdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
            Column::computed('business'),
            Column::computed('customer_name'),
            Column::make('invoice_number'),
            // Column::make('sub_total'),
            Column::make('grand_total'),
            Column::make('payable_amount')
                    ->title('Paid'),
            Column::make('due_amount'),
            Column::make('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Orders_' . date('YmdHis');
    }
}
