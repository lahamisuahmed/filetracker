<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('number') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="name">File Number</label>
        <input id="name" type="text" class="form-control" name="number" value="{{ old('number') }}" required>
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>
</div>
   