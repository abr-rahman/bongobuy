@extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-header">
            {{ __('Product List') }}
            <div class="dropdown show float-right" style="margin-right: 4px;">
                <button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Brands</button>
                <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -349px, 0px);">
                    @php
                        $brands = App\Models\Brand::select('id', 'name')->get();
                    @endphp
                    @foreach ($brands as $brand)
                    <a class="dropdown-item" href="{{ route('product.brand_wise_purchase', $brand->id) }}">{{ $brand->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <span class="text-center">Note: <span class="text-danger p-2">Please Wait atleast 1 min after entering once & <strong>(Max Entry 15000)</strong></span></span>
        <div class="card-body">
            <x-datatable :dataTable="$dataTable"></x-datatable>
        </div>
    </div>

    @push('js')
        <script>
            function create() {
                $.ajax({
                    url: "{{ route('products.create') }}",
                    success: function(html) {
                        $("#bodycontent").html(html);
                    }
                });
            }

            $('body').on('click', '#purchaseEntry', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            });
            </script>
    @endpush
@endsection
