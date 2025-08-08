@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Purchase') }}
                <div class="dropdown show float-right" style="margin-right: 4px;">
                    <button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Brands</button>
                    <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -349px, 0px);">
                        @php
                            $brands = App\Models\Brand::select('id', 'name')->get();
                        @endphp
                        @foreach ($brands as $brand)
                        <a class="dropdown-item" href="{{ route('product.brand_wise_purchase_list', $brand->id) }}">{{ $brand->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>

    @push('js')
        <script>

            $('body').on('click', '.edit-btn', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            });

            $(document).on('click', '#check_status', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.confirm({
                    title: 'Confirmation!',
                    content: 'Are you sure?',
                    buttons: {
                        confirm: function() {
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(data) {
                                    toastr.success(data);
                                    $('.dataTable').DataTable().ajax.reload();
                                }
                            });
                        },
                        somethingElse: {
                            text: 'Cancel',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                        },
                    }
                });
            });
        </script>
    @endpush
@endsection
