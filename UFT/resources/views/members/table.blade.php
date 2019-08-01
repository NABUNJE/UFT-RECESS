<div class="table-responsive">
    <table class="table" id="members-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
        <th>District</th>
        <th>Recommender</th>
        <th>Dateofenroll</th>
        <th>Gender</th>
        <th>Agent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($members as $member)

              @foreach($names as $name)

                  @if($name == $member->name)
                        <tr style="background-color:aqua">
                @else
                     <tr>
                    @endif

            @endforeach
                         <td>{!! $member->id !!}</td>
                        <td>{!! $member->name !!}</td>
                        <td>{!! $member->district !!}</td>
                        <td>{!! $member->recommender !!}</td>
                        <td>{!! $member->DateOfEnroll !!}</td>
                        <td>{!! $member->gender !!}</td>
                        <td>{!! $member->agent !!}</td>
                            <td>
                                {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('members.show', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>


        @endforeach
        </tbody>
    </table>
</div>
