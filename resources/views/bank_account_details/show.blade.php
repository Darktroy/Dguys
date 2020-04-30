@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Bank Account Details' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('bank_account_details.bank_account_details.destroy', $bankAccountDetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('bank_account_details.bank_account_details.index') }}" class="btn btn-primary" title="Show All Bank Account Details">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('bank_account_details.bank_account_details.create') }}" class="btn btn-success" title="Create New Bank Account Details">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('bank_account_details.bank_account_details.edit', $bankAccountDetails->id ) }}" class="btn btn-primary" title="Edit Bank Account Details">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Bank Account Details" onclick="return confirm(&quot;Click Ok to delete Bank Account Details.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($bankAccountDetails->user)->id }}</dd>
            <dt>Bank Name</dt>
            <dd>{{ $bankAccountDetails->bank_name }}</dd>
            <dt>Bank Account Serial</dt>
            <dd>{{ $bankAccountDetails->bank_account_serial }}</dd>

        </dl>

    </div>
</div>

@endsection