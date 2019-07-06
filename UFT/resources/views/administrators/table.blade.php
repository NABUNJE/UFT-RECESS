<div class="table-responsive">
    <table class="table" id="administrators-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Email Verified At</th>
        <th>Password</th>
        <th>Remember Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($administrators as $administrator)
            <tr>
                <td>{!! $administrator->name !!}</td>
            <td>{!! $administrator->email !!}</td>
            <td>{!! $administrator->email_verified_at !!}</td>
            <td>{!! $administrator->password !!}</td>
            <td>{!! $administrator->remember_token !!}</td>
                <td>
                    {!! Form::open(['route' => ['administrators.destroy', $administrator->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('administrators.show', [$administrator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('administrators.edit', [$administrator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
