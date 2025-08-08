<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Order Update</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('offline.order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Invoice Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $order->invoice_number  }}" name="invoice_number " placeholder="invoice_number" required readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="">Payable Amount <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" value="{{ $order->payable_amount }}" name="payable_amount" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Due Amount <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" value="{{ $order->due_amount }}" name="due_amount" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Grand Total <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" value="{{ $order->grand_total }}" name="grand_total" >
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>
