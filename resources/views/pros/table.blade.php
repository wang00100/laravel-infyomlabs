<div class="table-responsive">

    <table class="table" id="pros-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>标题</th>
        <th>价格</th>
        <th>封面</th>
        <th>章节</th>
        <th>介绍内容</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pros as $pro)
            <tr>
                       <td>{{ $pro->id }}</td>
            <td>{{ $pro->title }}</td>
            <td>{{ $pro->price }}</td>
            <td><img src="{{ $pro->cover }}" width="60"></td>

            
<td>
    <vince-tags value="{{ $pro->chapters }}" input_id="chapters" data_url="/api/v1/chapters" />
</td>

            <td>{{ $pro->content }}</td>
            <td>{{ $pro->updated_at }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['pros.destroy', $pro->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('pros.show', [$pro->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('pros.edit', [$pro->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
