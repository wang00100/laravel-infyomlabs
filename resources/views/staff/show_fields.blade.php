<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $staff->id }}</p>
</div>

<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', 'Avatar:') !!}
    <p>{{ $staff->avatar }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $staff->name }}</p>
</div>

<!-- Tags Field -->
<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    <p>{{ $staff->tags }}</p>
</div>

<!-- Brief Field -->
<div class="form-group">
    {!! Form::label('brief', 'Brief:') !!}
    <p>{{ $staff->brief }}</p>
</div>

<!-- Intro Field -->
<div class="form-group">
    {!! Form::label('intro', 'Intro:') !!}
    <p>{{ $staff->intro }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $staff->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $staff->updated_at }}</p>
</div>

