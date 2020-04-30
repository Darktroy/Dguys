@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Delivery Guy Details</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_guy_details.delivery_guy_details.create') }}" class="btn btn-success" title="Create New Delivery Guy Details">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deliveryGuyDetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Guy Details Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Address</th>
                            <th>Is Citizen</th>
                            <th>National Card Serial</th>
                            <th>National Card Image</th>
                            <th>License Image</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryGuyDetailsObjects as $deliveryGuyDetails)
                        <tr>
                            <td>{{ optional($deliveryGuyDetails->user)->id }}</td>
                            <td>{{ $deliveryGuyDetails->latitude }}</td>
                            <td>{{ $deliveryGuyDetails->longitude }}</td>
                            <td>{{ $deliveryGuyDetails->address }}</td>
                            <td>{{ ($deliveryGuyDetails->is_citizen) ? 'Yes' : 'No' }}</td>
                            <td>{{ $deliveryGuyDetails->national_card_serial }}</td>
                            <td>{{ $deliveryGuyDetails->national_card_image }}</td>
                            <td>{{ $deliveryGuyDetails->license_image }}</td>

                            <td>

                                <form method="POST" action="{!! route('delivery_guy_details.delivery_guy_details.destroy', $deliveryGuyDetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_guy_details.delivery_guy_details.show', $deliveryGuyDetails->id ) }}" class="btn btn-info" title="Show Delivery Guy Details">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('delivery_guy_details.delivery_guy_details.edit', $deliveryGuyDetails->id ) }}" class="btn btn-primary" title="Edit Delivery Guy Details">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Guy Details" onclick="return confirm(&quot;Click Ok to delete Delivery Guy Details.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $deliveryGuyDetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection