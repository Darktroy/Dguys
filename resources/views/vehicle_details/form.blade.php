
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($vehicleDetails)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($vehicleDetails)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
    <label for="model" class="col-md-2 control-label">Model</label>
    <div class="col-md-10">
        <input class="form-control" name="model" type="text" id="model" value="{{ old('model', optional($vehicleDetails)->model) }}" minlength="1" placeholder="Enter model here...">
        {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plate_number') ? 'has-error' : '' }}">
    <label for="plate_number" class="col-md-2 control-label">Plate Number</label>
    <div class="col-md-10">
        <input class="form-control" name="plate_number" type="number" id="plate_number" value="{{ old('plate_number', optional($vehicleDetails)->plate_number) }}" placeholder="Enter plate number here...">
        {!! $errors->first('plate_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($vehicleDetails)->type) }}" minlength="1" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

