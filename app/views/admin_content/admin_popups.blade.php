<div class="modal fade" id="new-product-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel1">Add Product</h4>
      </div>
      <div class="modal-body">
        <form id="create-product-form" role="form">
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="product-time-standart">Manufacture Time Standard</label>
                <input type="text" id="product-time-standart" class="form-control" placeholder="Time Standart for example tons/hour">
            </div>
            <div class="form-group">
                <label for="product-payment-standard">Payment Standard</label>
                <input type="text" id="product-payment-standard" class="form-control" placeholder="Payment Standard for example USD/ton">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add product</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="new-product-type-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel2">Add Product Type</h4>
      </div>
      <div class="modal-body">
        <form id="add-product-type-form" role="form">
            <div class="form-group">
                <label for="product-name">Product Type Name</label>
                <input type="text" id="product-name" class="form-control" placeholder="Product Name">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add type</button>
            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="new-product-item-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel3">Add Product Item</h4>
      </div>
      <div class="modal-body">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Add Item</button>
      </div>

    </div>
  </div>
</div>