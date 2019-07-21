<!-- search Offer Modal Form HTML -->
<div class="modal fade" id="searchOfferModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmSearchOffer">
                <div class="modal-header">
                    <h4 class="modal-title">
                        searched Offer
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>

                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>ID</th>
                    <th>offer</th>
                    <th>Created At</th>
                    <th>Description</th>
                    <th>code</th>
                    </thead>
                    <tbody id="lol">

{{--                    @foreach($datas as $Offer)--}}
{{--                        <tr>--}}
{{--                            <td>{{$Offer->id}}</td>--}}
{{--                            <td>{{$Offer->Offer}}</td>--}}
{{--                            <td>{{$Offer->created_at}}</td>--}}
{{--                            <td>{{$Offer->description}}</td>--}}
{{--                            <td>{{($Offer->code)}}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}


                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>