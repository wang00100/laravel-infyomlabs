<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $chapter->id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $chapter->title }}</p>
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    <p><img src="{{ $chapter->cover }}" style="max-width:240px; width:100%;" /></p>
</div>


<!-- Public Time Field -->
<div class="form-group">
    {!! Form::label('public_time', 'Public Time:') !!}
    <p>{{ $chapter->public_time }}</p>
</div>

<!-- Staffs Field -->
<div class="form-group">
    {!! Form::label('staffs', 'Staffs:') !!}
    <p><vince-tags value="{{ $chapter->staffs }}" input_id="staffs" data_url="/api/v1/staff"  /></p>
</div>


<!-- Media Field -->
<div class="form-group">
    {!! Form::label('media', 'Media:') !!}
    <p>{{ $chapter->media }}</p>
</div>

<!-- Cats Field -->
<div class="form-group">
    {!! Form::label('cats', 'Cats:') !!}
    <p><vince-tags value="{{ $chapter->cats }}" input_id="cats" data_url="/api/v1/cats"  /></p>
</div>


<!-- Tags Field -->
<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    <p><vince-tags value="{{ $chapter->tags }}" input_id="tags" data_url="/api/v1/tags"  /></p>
</div>


<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $chapter->content }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chapter->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chapter->updated_at }}</p>
</div>

