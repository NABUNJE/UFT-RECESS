<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $agent->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $agent->name !!}</p>
</div>

<!-- District Field -->
<div class="form-group">
    {!! Form::label('district', 'District:') !!}
    <p>{!! $agent->district !!}</p>
</div>

<!-- Admin Field -->
<div class="form-group">
    {!! Form::label('admin', 'Admin:') !!}
    <p>{!! $agent->admin !!}</p>
</div>

<!-- Signature Field -->
<div class="form-group">
    {!! Form::label('signature', 'Signature:') !!}
    <p>{!! $agent->signature !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $agent->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $agent->updated_at !!}</p>
</div>
