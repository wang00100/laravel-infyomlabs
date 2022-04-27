<div class="table-responsive">

    <table class="table" id="tags-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                       <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td>{{ $tag->updated_at }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('tags.show', [$tag->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('tags.edit', [$tag->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
