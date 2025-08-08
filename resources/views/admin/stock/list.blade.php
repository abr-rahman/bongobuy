@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                    {{ __('Stock List') }}
            </div>
            <div class="card-body">
                <x-datatable id="stockTable" :dataTable="$dataTable">
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                </x-datatable>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#stockTable').DataTable();

            var intVal = function(i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };

            var createdAtTotal = table.column(2).data().reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);

            $(table.column(2).footer()).html(createdAtTotal);
        });

    </script>
@endpush
