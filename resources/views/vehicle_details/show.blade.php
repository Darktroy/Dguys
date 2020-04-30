@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Vehicle Details' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('vehicle_details.vehicle_details.destroy', $vehicleDetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('vehicle_details.vehicle_details.index') }}" class="btn btn-primary" title="Show All Vehicle Details">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('vehicle_details.vehicle_details.create') }}" class="btn btn-success" title="Create New Vehicle Details">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('vehicle_details.vehicle_details.edit', $vehicleDetails->id ) }}" class="btn btn-primary" title="Edit Vehicle Details">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Vehicle Details" onclick="return confirm(&quot;Click Ok to delete Vehicle Details.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($vehicleDetails->user)->id }}</dd>
            <dt>Model</dt>
            <dd>{{ $vehicleDetails->model }}</dd>
            <dt>Plate Number</dt>
            <dd>{{ $vehicleDetails->plate_number }}</dd>
            <dt>Type</dt>
            <dd>{{ $vehicleDetails->type }}</dd>

        </dl>

    </div>
</div>

@endsection