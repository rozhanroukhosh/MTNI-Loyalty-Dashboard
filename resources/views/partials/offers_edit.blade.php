<!-- Edit Modal HTML -->
<div class="modal fade" id="editOfferModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditOffer">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Edit Offer
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-Offer-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Offer
                        </label>
                        <input class="form-control" id="Offer" name="Offer" required="" type="Offer">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <input class="form-control" id="description" name="description" required="" type="text">
                        </input>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="Offer_id" name="Offer_id" type="hidden" value="0">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <button class="btn btn-info" id="btn-edit" type="button" value="add">
                        Update Offer
                    </button>
                    </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>