<div class="table-responsive">

    <table class="table" id="cats-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Slug</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                       <td>{{ $cat->name }}</td>
            <td>{{ $cat->slug }}</td>
            <td>{{ $cat->updated_at }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['cats.destroy', $cat->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('cats.show', [$cat->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('cats.edit', [$cat->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
