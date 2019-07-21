<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Offers</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Manage <b>offers</b></h2>
                </div>
                <form class=" my-2 my-sm-0 form-inline active-cyan-4" style="float: left;">
                    <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                           aria-label="Search" name="search2">
                    <a onclick="event.preventDefault();searchOfferForm();" href="" id="search"> <i class="fa fa-search" style="color:white;"></i></a>
                </form>
                <div class=" my-2 my-sm-0">
                    <a href="{{ route("Offers.chart") }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-search" style="color:white;"></i> <span>chart</span></a>
                </div>
                <div class=" my-2 my-sm-0">
                    <a onclick="event.preventDefault();addOfferForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Offer</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>offer</th>
                <th>Created At</th>
                <th>Description</th>
                <th>code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Offers as $Offer)
                <tr>
                    <td>{{$Offer->id}}</td>
                    <td>{{$Offer->Offer}}</td>
                    <td>{{$Offer->created_at}}</td>
                    <td>{{$Offer->description}}</td>
                    <td>{{($Offer->code)}}</td>
                    <td>
                        <a onclick="event.preventDefault();editOfferForm({{$Offer->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$Offer->id}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a onclick="event.preventDefault();deleteOfferForm({{$Offer->id}});" href="#" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="clearfix">
{{--            <div class="hint-text">Showing <b>{{$Offer->count()}}</b> out of <b>{{$Offer->total()}}</b> entries</div>--}}
{{--            {{ $Offer->links() }}--}}
        </div>

    </div>
</div>
@include('partials.Offers_add')
@include('partials.Offers_edit')
@include('partials.offers_delete')
@include('partials. offers_search')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('js/Offers.js')}}"></script>
</body>
</html>
