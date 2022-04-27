<!-- 头像 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('avatar', '头像:') !!}
    <input type="hidden" id="avatar" name="avatar" value="{{ $staff->avatar ?? '' }}" />
    <avatar-upload value="{{ $staff->avatar ?? '' }}" input_id="avatar" />

</div>


<!-- 姓名/编号 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '姓名/编号:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-12">

    {!! Form::label('tags', 'Tags:') !!}
    <input type="hidden" id="tags" name="tags" value="{{ $staff->tags ?? ''}}" />
    <select-tabledata value="{{ $staff->tags ?? '' }}" input_id="tags" data_url="/api/v1/tags"  />

</div>


<!-- Brief Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brief', 'Brief:') !!}
    {!! Form::text('brief', null, ['class' => 'form-control']) !!}
</div>

<!-- Intro Field -->
<div class="form-group col-sm-12">

    {!! Form::label('intro', 'Intro:') !!}
    <input type="hidden" id="intro" name="intro" value="{{ $staff->intro ?? ''}}" />
    <quill-edit value="{{ $staff->intro ?? ''}}" input_id="intro" />

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('staff.index') }}" class="btn btn-light">Cancel</a>
</div>
