$(document).ready(function() {

    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/Offers',
            data: {
                Offer: $("#frmAddOffer input[name=Offer]").val(),
                description: $("#frmAddOffer input[name=description]").val(),
                code: $("#frmAddOffer input[name=code]").val(),
            },
            dataType: 'json',

            success: function(data) {
                $('#frmAddOffer').trigger("reset");
                $("#frmAddOffer .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-Offer-errors').html('');
                $.each(errors.message, function(key, value) {
                    $('#add-Offer-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    $("#btn-edit").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/Offers/' + $("#frmEditOffer input[name=Offer_id]").val(),
            data: {
                Offer: $("#frmEditOffer input[name=Offer]").val(),
                description: $("#frmEditOffer input[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditOffer').trigger("reset");
                $("#frmEditOffer .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-Offer-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-Offer-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/Offers/' + $("#frmDeleteOffer input[name=Offer_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#frmDeleteOffer .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addOfferForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addOfferModal').modal('show');
    });
}
 function searchOfferForm() {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     var query = $("input[name=search2]").val();

         $.ajax({
             type:'get',
             url:'/Offers/search',
             data:{query:query},
             dataType:'json',
             success:function(response)
             {

                 $('#lol').html(response.table_data);
                 $("#searchOfferModal").modal('show');

             },
             error: function(data) {
                 console.log('hello');
             }
         })
 }
function editOfferForm(Offer_id) {
    $.ajax({
        type: 'GET',
        url: '/Offers/' + Offer_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditOffer input[name=Offer]").val(data.Offer.Offer);
            $("#frmEditOffer input[name=description]").val(data.Offer.description);
            $("#frmEditOffer input[name=Offer_id]").val(data.Offer.id);
            $('#editOfferModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteOfferForm(Offer_id) {
    $.ajax({
        type: 'GET',
        url: '/Offers/' + Offer_id,
        success: function(data) {
            $("#frmDeleteOffer #delete-title").html("Delete Offer (" + data.Offer.Offer + ")?");
            $("#frmDeleteOffer input[name=Offer_id]").val(data.Offer.id);
            $('#deleteOfferModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
