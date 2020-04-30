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
                <h4 class="mt-5 mb-5">Bank Account Details</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('bank_account_details.bank_account_details.create') }}" class="btn btn-success" title="Create New Bank Account Details">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($bankAccountDetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Bank Account Details Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Bank Name</th>
                            <th>Bank Account Serial</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bankAccountDetailsObjects as $bankAccountDetails)
                        <tr>
                            <td>{{ optional($bankAccountDetails->user)->id }}</td>
                            <td>{{ $bankAccountDetails->bank_name }}</td>
                            <td>{{ $bankAccountDetails->bank_account_serial }}</td>

                            <td>

                                <form method="POST" action="{!! route('bank_account_details.bank_account_details.destroy', $bankAccountDetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('bank_account_details.bank_account_details.show', $bankAccountDetails->id ) }}" class="btn btn-info" title="Show Bank Account Details">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('bank_account_details.bank_account_details.edit', $bankAccountDetails->id ) }}" class="btn btn-primary" title="Edit Bank Account Details">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Bank Account Details" onclick="return confirm(&quot;Click Ok to delete Bank Account Details.&quot;)">
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
            {!! $bankAccountDetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection