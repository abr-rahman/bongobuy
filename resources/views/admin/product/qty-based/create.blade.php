<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Product Quantity Based Price</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('product.qty_based.price_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group mb-2">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group mb-2">
                    <label for="">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="quantity" placeholder="Please Enter quantity">
                </div>
                <div class="form-group mb-2">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Please Enter price">
                </div>
                <div class="form-group mb-2">
                    <label for="">Save Price</label>
                    <input type="number" class="form-control" name="save_price" placeholder="Please Enter save price">
                </div>
                <div class="form-group mb-2">
                    <label for="">More Quantiy</label>
                    <input type="number" class="form-control" name="more_qty" placeholder="Please Enter more Quantiy">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>
