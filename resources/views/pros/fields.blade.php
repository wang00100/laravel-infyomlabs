<!-- 标题 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', '标题:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- 价格 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', '价格:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- 封面 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('cover', '封面:') !!}
    <input type="hidden" id="cover" name="cover" value="{{ $pro->cover ?? '' }}" />
    <avatar-upload value="{{ $pro->cover ?? '' }}" input_id="cover" />

</div>


<!-- 章节 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('chapters', '章节:') !!}
    <input type="hidden" id="chapters" name="chapters" value="{{ $pro->chapters ?? ''}}" />
    <select-tabledata value="{{ $pro->chapters ?? '' }}" input_id="chapters" data_url="/api/v1/chapters"  />

</div>


<!-- 介绍内容 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('content', '介绍内容:') !!}
    <input type="hidden" id="content" name="content" value="{{ $pro->content ?? ''}}" />
    <quill-edit value="{{ $pro->content ?? ''}}" input_id="content" />

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pros.index') }}" class="btn btn-light">Cancel</a>
</div>
