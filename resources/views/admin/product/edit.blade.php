@extends('layouts.admin-master')
@push('css')
    <style>
        .border {
            border: 1px solid #b3b3b3 !important;
        }
    </style>
@endpush
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Edit</h3>
                        </div>
                        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Name <span   class="text-danger">*</span></label>
                                                        <input type="text" value="{{ $product->product_name }}" name="product_name" id="product_name" class="form-control"
                                                            placeholder="Product Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Thumbnail Image </label>
                                                        <input type="file" value="{{ $product->product_image }}" name="product_image" class="form-control" placeholder="Image">
                                                        <label>Upload new one to replace:</label>
                                                        <img src="{{ asset('uploads/product/'.$product->product_image) ?? asset($product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid" id="preview" width="100" height="100"/> <br>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Featured Images</label>
                                                        <input type="file" class="form-control" name="thumbnail_image[]" multiple>
                                                        @isset($product->thumbnail_image)
                                                            <div class="form-group py-3 d-flex justify-content-start">
                                                                <div class="row">
                                                                    @foreach ($product->thumbnail_image as $photo)
                                                                        <div class="col-md-4 " style="border: 1px solid #ccc;" id="photo_{{ $photo }}">
                                                                            <div class="img-responsive position-relative" id="{{ asset($photo) }}" >
                                                                                <img src="{{ asset('uploads/product/'.$photo) ?? asset($product->product_image)  }}" style="height: 70px;" class="img-responsive pt-1" alt="{{ $product->product_name }}" />
                                                                                <button type="button" data-href="{{ route('delete-product-image') }}" class="btn btn-sm btn-outline-danger delete-image" data-photo="{{ $photo }}" data-product_id="{{ $product->id }}"> X </button>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endisset
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Warranty Days</label>
                                                        <input type="number" value="{{ $product->warranty_day }}" name="warranty_day" class="form-control"
                                                            placeholder="Warranty Days">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Category <span
                                                                class="text-danger">*</span></label>
                                                        <select name="category_id" class="form-control select2">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}" @selected($item->id == $product->category_id)>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub-Category </label>
                                                        <select name="sub_category_id" class="form-control select2">
                                                            <option value="">Select Sub-Category</option>
                                                            @foreach ($subCategories as $item)
                                                                <option value="{{ $item->id }}" @selected($item->id == $product->sub_category_id)>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Brand</label>
                                                        <select name="brand_id" class="form-control select2">
                                                            <option value="">Select Brand</option>
                                                            @foreach ($brands as $item)
                                                                <option value="{{ $item->id }}" @selected($item->id == $product->brand_id)>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Lowest Price Qty</label>
                                                        <input type="number" class="form-control" name="lowest_price_qty" value="{{ $product->lowest_price_qty }}" placeholder="Lowest Price Qty">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bulk Qty</label>
                                                        <input type="number" class="form-control" name="bulk_quantity" value="{{ $product->bulk_quantity }}" placeholder="Bulk Qty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Long Description</label>
                                                <textarea name="long_description" class="form-control summernote" id="summary-ckeditor" placeholder="Long Description" cols="20"
                                                    rows="10">{!! $product->long_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="float-right mt-5">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.ck-editor-image.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> --}}
 {{-- <script src="{{ asset('asset/ckeditor5/ckeditor.js') }}"></script> --}}
    <script>
        function viewPreview(image) {
            image.preventDefault();
            console.log(image);
            document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
        }

        $("#discount_amount").on("keyup change", function(e) {
            var discountAmount = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = (discountAmount / selling_price) * 100;
            $("#discount_percentage").val(totalPercen);
        });

        $("#discount_percentage").on("keyup change", function(e) {
            var discountPercen = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = ((selling_price * discountPercen) / 100);
            $("#discount_amount").val(totalPercen);
        });

        $('.delete-image').on('click', function(e) {
            e.preventDefault();
            let url = $(this).data('href');
            let photo = $(this).data('photo');
            let product_id = $(this).data('product_id');
            let color_id = $(this).data('color_id');
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    photo,
                    product_id,
                    color_id
                },
                success: function(data) {
                    toastr.success(data.message);
                    var elementId = "photo_" + data.photo;
                    var element = document.getElementById(elementId);
                    if (element) {
                        element.style.display = 'none';
                    } else {
                        console.error("Element with ID " + elementId + " not found.");
                    }
                    // $('.dataTable').DataTable().ajax.reload();
                    // $('#delete-reload').load("#delete-reload > *");
                },
                error: function(data) {
                    toastr.error(data.responseJSON.message);
                }
            });
        });
    </script>
@endpush
