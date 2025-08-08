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
                            <h3 class="card-title">Product Create</h3>
                        </div>
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Product Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="product_name" value="{{ old('product_name') }}" id="product_name" class="form-control"
                                                            placeholder="Product Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Numbering</label>
                                                        <input type="number" name="numbering" value="{{ old('numbering') }}" class="form-control"
                                                            placeholder="Product number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Lowest Price </label>
                                                        <input type="number" value="00.0" value="{{ old('lowest_price') }}" name="lowest_price" class="form-control" placeholder="Lowest Price">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Selling Price <span class="text-danger">*</span></label>
                                                        <input type="number" value="00.0" value="{{ old('regular_price') }}" name="regular_price" id="selling_price" class="form-control" placeholder="Selling Price">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Discount Amount</label>
                                                        <input type="number" class="form-control" value="{{ old('discount_fixed') }}" name="discount_fixed" id="discount_amount" placeholder="Discount Amount &#2547;"> <br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Discount Percent %</label>
                                                        <input type="number" class="form-control" value="{{ old('discount_percentage') }}" name="discount_percentage" id="discount_percentage" placeholder="Discount Percentage %">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Thumbnail Image</label>
                                                        <input type="file" value="{{ old('product_image') }}" name="product_image" class="form-control"
                                                            placeholder="Image">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Featured Images (Max 4)</label>
                                                        <input type="file" class="form-control" value="{{ old('thumbnail_image') }}" name="thumbnail_image[]"
                                                            placeholder="Featured Images" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Warranty Days</label>
                                                        <input type="number" value="{{ old('warranty_day') }}" name="warranty_day" class="form-control"
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
                                                        <select value="{{ old('category_id') }}" name="category_id" class="form-control select2">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub-Category <span class="text-danger">*</span></label>
                                                        <select value="{{ old('sub_category_id') }}" name="sub_category_id" class="form-control select2">
                                                            <option value="">Select Category</option>
                                                            @foreach ($subCategories as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Brand </label>
                                                        <select value="{{ old('brand_id') }}" name="brand_id" class="form-control select2">
                                                            <option value="">Select Brand</option>
                                                            @foreach ($brands as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label for="exampleInputEmail1">Product Status</label> <br>
                                                            <input type="checkbox" name="hot_sale" value="1" class="form-check-input" id="hot_sale">
                                                            <label class="form-check-label" for="hot_sale">Hot Sale</label> <br>

                                                            <input type="checkbox" name="new_arrival" value="1" class="form-check-input" id="new_arrival">
                                                            <label class="form-check-label" for="new_arrival">New Arrival</label> <br>

                                                            <input type="checkbox" name="trending" value="1" class="form-check-input" id="trending">
                                                            <label class="form-check-label" for="trending">Trending</label> <br>

                                                            <input type="checkbox" name="featured" value="1" class="form-check-input" id="featured">
                                                            <label class="form-check-label" for="featured">Featured</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Lowest Price Qty</label>
                                                        <input type="number" class="form-control" name="lowest_price_qty" placeholder="Lowest Price Qty">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bulk Qty</label>
                                                        <input type="number" class="form-control" name="bulk_quantity" placeholder="Bulk Qty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Long Description</label>
                                                <textarea name="long_description" class="form-control " id="summary-ckeditor" placeholder="Long Description" cols="20"
                                                    rows="10">{{ old('long_description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Seo Title</label>
                                                <input type="text" name="seo_title" value="{{ old('seo_title') }}" class="form-control"
                                                    placeholder="Seo Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Seo Keyword</label>
                                                <input type="text" name="seo_keyword" value="{{ old('seo_keyword') }}" class="form-control"
                                                    placeholder="Seo Keyword">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Seo Description</label>
                                                <textarea name="seo_description" class="form-control" placeholder="Seo Description" cols="10"
                                                    rows="5">{{ old('seo_description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="float-right mt-5">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success bg-success">Submit</button>
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

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $("#discount_amount").on("keyup change", function(e) {
            var discountAmount = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = (discountAmount / selling_price) * 100;
            $("#discount_percentage").val(Math.round(totalPercen));
        });

        $("#discount_percentage").on("keyup change", function(e) {
            var discountPercen = $(this).val();
            var selling_price = $('#selling_price').val();
            let totalPercen = ((selling_price * discountPercen) / 100);
            $("#discount_amount").val(Math.round(totalPercen));
        });

        $("#dealer_dis_fixed").on("keyup change", function(e) {
            var discountAmount = $(this).val();
            var selling_price = $('#dealer_selling_price').val();
            let totalPercen = (discountAmount / selling_price) * 100;
            $("#dealer_dis_percentage").val(Math.round(totalPercen));
        });

        $("#dealer_dis_percentage").on("keyup change", function(e) {
            var discountPercen = $(this).val();
            var selling_price = $('#dealer_selling_price').val();
            let totalPercen = ((selling_price * discountPercen) / 100);
            $("#dealer_dis_fixed").val(Math.round(totalPercen));
        });
    </script>
@endpush
