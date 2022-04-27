@extends('layouts.app')
@section('title')
    Tags
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tags</h1>
            <div class="section-header-breadcrumb">

                <a href="{{ route('tags.create')}}" class="btn btn-primary form-btn">Tag <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
    
       <div class="card">
            <div class="card-body">
                @include('tags.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $tags])

    </section>
@endsection
