<?php

namespace App\DataTables;

use App\Customer;
use Yajra\Datatables\Services\DataTable;

class CustomerDatatable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $data = Customer::query();
        return $this->datatables
            ->eloquent($data)
            ->addColumn('action', function($data) {
                return '
                    <div class="btn-group btn-group-xs">
                        <a href="/dashboard/master/customer/show/' . $data->id . '" class="btn  btn-default" style="color:blue;"><i class="fa fa-eye"></i></a>
                        <a href="/dashboard/master/customer/edit/' . $data->id . '" class="btn btn-default" style="color:green;"><i class="fa fa-pencil"></i></a>
                        <a href="/dashboard/master/customer/delete/' . $data->id . '" class="btn btn-default" onclick="return confirm(\'Hapus?\')" style="color:red;"><i class="fa fa-trash"></i></a>
                    </div>
                    ';
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Customer::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            // add your columns
            'name',
            'address',
            'city',
            'phone'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customerdatatables_' . time();
    }
}
