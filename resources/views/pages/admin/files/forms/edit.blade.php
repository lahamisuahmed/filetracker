<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('number') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="number">File Number</label>
        <input id="number" type="text" class="form-control" name="number" value="{{ $file->number}}" required>
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif

    </div>
</div>