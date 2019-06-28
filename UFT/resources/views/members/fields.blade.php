<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', 'District:') !!}
    {!! Form::text('district', null, ['class' => 'form-control']) !!}
</div>

<!-- Recommender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recommender', 'Recommender:') !!}
    {!! Form::text('recommender', null, ['class' => 'form-control']) !!}
</div>

<!-- Dateofenroll Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DateOfEnroll', 'Dateofenroll:') !!}
    {!! Form::date('DateOfEnroll', null, ['class' => 'form-control','id'=>'DateOfEnroll']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#DateOfEnroll').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Agent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agent', 'Agent:') !!}
    {!! Form::text('agent', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('members.index') !!}" class="btn btn-default">Cancel</a>
</div>
