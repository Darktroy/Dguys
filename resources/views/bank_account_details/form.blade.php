
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($bankAccountDetails)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($bankAccountDetails)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
    <label for="bank_name" class="col-md-2 control-label">Bank Name</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_name" type="text" id="bank_name" value="{{ old('bank_name', optional($bankAccountDetails)->bank_name) }}" minlength="1" placeholder="Enter bank name here...">
        {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_account_serial') ? 'has-error' : '' }}">
    <label for="bank_account_serial" class="col-md-2 control-label">Bank Account Serial</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_account_serial" type="number" id="bank_account_serial" value="{{ old('bank_account_serial', optional($bankAccountDetails)->bank_account_serial) }}" placeholder="Enter bank account serial here...">
        {!! $errors->first('bank_account_serial', '<p class="help-block">:message</p>') !!}
    </div>
</div>

