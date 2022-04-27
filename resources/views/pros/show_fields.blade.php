<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $pro->id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $pro->title }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $pro->price }}</p>
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    <p><img src="{{ $pro->cover }}" style="max-width:240px; width:100%;" /></p>
</div>


<!-- Chapters Field -->
<div class="form-group">
    {!! Form::label('chapters', 'Chapters:') !!}
    <p><vince-tags value="{{ $pro->chapters }}" input_id="chapters" data_url="/api/v1/chapters"  /></p>
</div>


<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $pro->content }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pro->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pro->updated_at }}</p>
</div>

