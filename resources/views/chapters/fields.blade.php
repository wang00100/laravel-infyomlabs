<!-- 标题 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', '标题:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- 封面 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('cover', '封面:') !!}
    <input type="hidden" id="cover" name="cover" value="{{ $chapter->cover ?? '' }}" />
    <avatar-upload value="{{ $chapter->cover ?? '' }}" input_id="cover" />

</div>


<!-- 作者 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('staffs', '作者:') !!}
    <input type="hidden" id="staffs" name="staffs" value="{{ $chapter->staffs ?? ''}}" />
    <select-tabledata value="{{ $chapter->staffs ?? '' }}" input_id="staffs" data_url="/api/v1/staff"  />

</div>


<!-- 媒体文件 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('media', '媒体文件:') !!}
    <input type="hidden" id="media" name="media" value="{{ $chapter->media ?? '' }}" />
    <file-upload value="{{ $chapter->media ?? '' }}" input_id="media" />

</div>


<!-- 分类 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('cats', '分类:') !!}
    <input type="hidden" id="cats" name="cats" value="{{ $chapter->cats ?? ''}}" />
    <select-tabledata value="{{ $chapter->cats ?? '' }}" input_id="cats" data_url="/api/v1/cats"  />

</div>


<!-- 关键词 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('tags', '关键词:') !!}
    <input type="hidden" id="tags" name="tags" value="{{ $chapter->tags ?? ''}}" />
    <select-tabledata value="{{ $chapter->tags ?? '' }}" input_id="tags" data_url="/api/v1/tags"  />

</div>


<!-- 介绍内容 Field -->
<div class="form-group col-sm-12">

    {!! Form::label('content', '介绍内容:') !!}
    <input type="hidden" id="content" name="content" value="{{ $chapter->content ?? ''}}" />
    <quill-edit value="{{ $chapter->content ?? ''}}" input_id="content" />

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chapters.index') }}" class="btn btn-light">Cancel</a>
</div>
