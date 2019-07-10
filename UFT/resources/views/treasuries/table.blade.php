<div class="table-responsive">
    <table class="table" id="treasuries-table">
        <thead>
            <tr>
                <th>Amount</th>
        <th>Well-Wisher</th>
        <th>Received-On</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($treasuries as $treasury)
            <tr>
                <td>{!! $treasury->amount !!}</td>
            <td>{!! $treasury->well_wisher !!}</td>
            <td>{!! $treasury->received_on !!}</td>
                <td>
                    {!! Form::open(['route' => ['treasuries.destroy', $treasury->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('treasuries.show', [$treasury->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('treasuries.edit', [$treasury->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
