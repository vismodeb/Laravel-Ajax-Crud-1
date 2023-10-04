
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="" id="updateproductForm">
        @csrf

        <input type="hidden" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errorMessage mb-3"></div>

                    <div class="form_group">
                        <label for="up_name">Name</label>
                        <input type="text" name="up_name" id="up_name" class="form-control">
                    </div>

                    <div class="form_group mt-2">
                        <label for="up_price">Price</label>
                        <input type="text" name="up_price" id="up_price" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>