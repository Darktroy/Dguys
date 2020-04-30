@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Guy Details' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_guy_details.delivery_guy_details.destroy', $deliveryGuyDetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_guy_details.delivery_guy_details.index') }}" class="btn btn-primary" title="Show All Delivery Guy Details">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_guy_details.delivery_guy_details.create') }}" class="btn btn-success" title="Create New Delivery Guy Details">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_guy_details.delivery_guy_details.edit', $deliveryGuyDetails->id ) }}" class="btn btn-primary" title="Edit Delivery Guy Details">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Guy Details" onclick="return confirm(&quot;Click Ok to delete Delivery Guy Details.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($deliveryGuyDetails->user)->id }}</dd>
            <dt>Latitude</dt>
            <dd>{{ $deliveryGuyDetails->latitude }}</dd>
            <dt>Longitude</dt>
            <dd>{{ $deliveryGuyDetails->longitude }}</dd>
            <dt>Address</dt>
            <dd>{{ $deliveryGuyDetails->address }}</dd>
            <dt>Is Citizen</dt>
            <dd>{{ ($deliveryGuyDetails->is_citizen) ? 'Yes' : 'No' }}</dd>
            <dt>National Card Serial</dt>
            <dd>{{ $deliveryGuyDetails->national_card_serial }}</dd>
            <dt>National Card Image</dt>
            <dd>{{ $deliveryGuyDetails->national_card_image }}</dd>
            <dt>License Image</dt>
            <dd>{{ $deliveryGuyDetails->license_image }}</dd>

        </dl>

    </div>
</div>

@endsection