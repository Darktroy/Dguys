
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($deliveryGuyDetails)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($deliveryGuyDetails)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
    <label for="latitude" class="col-md-2 control-label">Latitude</label>
    <div class="col-md-10">
        <input class="form-control" name="latitude" type="text" id="latitude" value="{{ old('latitude', optional($deliveryGuyDetails)->latitude) }}" min="-9" max="9" placeholder="Enter latitude here...">
        {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
    <label for="longitude" class="col-md-2 control-label">Longitude</label>
    <div class="col-md-10">
        <input class="form-control" name="longitude" type="text" id="longitude" value="{{ old('longitude', optional($deliveryGuyDetails)->longitude) }}" min="-9" max="9" placeholder="Enter longitude here...">
        {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($deliveryGuyDetails)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_citizen') ? 'has-error' : '' }}">
    <label for="is_citizen" class="col-md-2 control-label">Is Citizen</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_citizen_1">
            	<input id="is_citizen_1" class="" name="is_citizen" type="checkbox" value="1" {{ old('is_citizen', optional($deliveryGuyDetails)->is_citizen) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_citizen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('national_card_serial') ? 'has-error' : '' }}">
    <label for="national_card_serial" class="col-md-2 control-label">National Card Serial</label>
    <div class="col-md-10">
        <input class="form-control" name="national_card_serial" type="text" id="national_card_serial" value="{{ old('national_card_serial', optional($deliveryGuyDetails)->national_card_serial) }}" minlength="1" placeholder="Enter national card serial here...">
        {!! $errors->first('national_card_serial', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('national_card_image') ? 'has-error' : '' }}">
    <label for="national_card_image" class="col-md-2 control-label">National Card Image</label>
    <div class="col-md-10">
        <input class="form-control" name="national_card_image" type="number" id="national_card_image" value="{{ old('national_card_image', optional($deliveryGuyDetails)->national_card_image) }}" placeholder="Enter national card image here...">
        {!! $errors->first('national_card_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('license_image') ? 'has-error' : '' }}">
    <label for="license_image" class="col-md-2 control-label">License Image</label>
    <div class="col-md-10">
        <input class="form-control" name="license_image" type="number" id="license_image" value="{{ old('license_image', optional($deliveryGuyDetails)->license_image) }}" placeholder="Enter license image here...">
        {!! $errors->first('license_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

