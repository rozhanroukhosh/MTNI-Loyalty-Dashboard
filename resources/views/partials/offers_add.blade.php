<!-- Add Offer Modal Form HTML -->
<div class="modal fade" id="addOfferModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddOffer">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add New Offer
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-Offer-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Offer Name
                        </label>
                        <input class="form-control" id="Offer" name="Offer" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <input class="form-control" id="description" name="description" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            code
                        </label>
                        <input class="form-control" id="code" name="code" required="" type="number">
                        </input>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <button class="btn btn-info" id="btn-add" type="button" value="add">
                        Add New Offer
                    </button>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>