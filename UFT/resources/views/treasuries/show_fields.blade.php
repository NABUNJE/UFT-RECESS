<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $treasury->id !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $treasury->amount !!}</p>
</div>

<!-- Well-Wisher Field -->
<div class="form-group">
    {!! Form::label('well-wisher', 'Well-Wisher:') !!}
    <p>{!! $treasury->well-wisher !!}</p>
</div>

<!-- Received-On Field -->
<div class="form-group">
    {!! Form::label('received-on', 'Received-On:') !!}
    <p>{!! $treasury->received-on !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $treasury->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $treasury->updated_at !!}</p>
</div>

