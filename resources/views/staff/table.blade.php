<div class="table-responsive">

    <table class="table" id="staff-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>头像</th>
        <th>姓名/编号</th>
        <th>Tags</th>
        <th>Brief</th>
        <th>Intro</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($staff as $staff)
            <tr>
                       <td>{{ $staff->id }}</td>
            <td>{{ $staff->avatar }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->tags }}</td>
            <td>{{ $staff->brief }}</td>
            <td>{{ $staff->intro }}</td>
            <td>{{ $staff->updated_at }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['staff.destroy', $staff->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('staff.show', [$staff->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('staff.edit', [$staff->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
