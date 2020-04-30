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
                <h4 class="mt-5 mb-5">Vehicle Details</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('vehicle_details.vehicle_details.create') }}" class="btn btn-success" title="Create New Vehicle Details">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($vehicleDetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Vehicle Details Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Model</th>
                            <th>Plate Number</th>
                            <th>Type</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicleDetailsObjects as $vehicleDetails)
                        <tr>
                            <td>{{ optional($vehicleDetails->user)->id }}</td>
                            <td>{{ $vehicleDetails->model }}</td>
                            <td>{{ $vehicleDetails->plate_number }}</td>
                            <td>{{ $vehicleDetails->type }}</td>

                            <td>

                                <form method="POST" action="{!! route('vehicle_details.vehicle_details.destroy', $vehicleDetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('vehicle_details.vehicle_details.show', $vehicleDetails->id ) }}" class="btn btn-info" title="Show Vehicle Details">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('vehicle_details.vehicle_details.edit', $vehicleDetails->id ) }}" class="btn btn-primary" title="Edit Vehicle Details">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Vehicle Details" onclick="return confirm(&quot;Click Ok to delete Vehicle Details.&quot;)">
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
            {!! $vehicleDetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection