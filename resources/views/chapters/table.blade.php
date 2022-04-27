<div class="table-responsive">

    <table class="table" id="chapters-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>标题</th>
        <th>封面</th>
        <th>作者</th>
        <th>分类</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chapters as $chapter)
            <tr>
                       <td>{{ $chapter->id }}</td>
            <td>{{ $chapter->title }}</td>
            <td><img src="{{ $chapter->cover }}" width="60"></td>

            
<td>
    <vince-tags value="{{ $chapter->staffs }}" input_id="staffs" data_url="/api/v1/staff" />
</td>

            
<td>
    <vince-tags value="{{ $chapter->cats }}" input_id="cats" data_url="/api/v1/cats" />
</td>

            <td>{{ $chapter->updated_at }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['chapters.destroy', $chapter->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('chapters.show', [$chapter->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('chapters.edit', [$chapter->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
