
<div class="form-row">
    <div class="form-row">
            <div class="form-group col-xs-11{{ $errors->has('name') ? ' has-error' : '' }} mb-0 mt-3">
                <label for="name">Unit Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $unit->name}}" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

            </div>
        </div>

    <div class="form-group col-xs-11{{ $errors->has('department_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="department_id">Unit Department</label>
        <select class="form-control" id="department_id" name="department_id">
            <option value=""></option>
            @foreach($departments as $department)
                <option value="{{$department->id}}" @if (old('department_id', $unit->department->id) == $department->id) {{ 'selected' }} @endif>{{$department->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('department_id'))
            <span class="help-block">
                <strong>{{ $errors->first('department_id') }}</strong>
            </span>
        @endif
    </div>

   
     
</div>

 @section('script')
    <script>
        $(document).ready(function () {
            $('#department_id').select2();
        });
    </script>
@endsection