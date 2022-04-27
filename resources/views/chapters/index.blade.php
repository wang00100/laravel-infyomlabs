@extends('layouts.app')
@section('title')
    Chapters
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chapters</h1>
            <div class="section-header-breadcrumb">

                <a href="{{ route('chapters.create')}}" class="btn btn-primary form-btn">Chapter <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
    
       <div class="card">
            <div class="card-body">
                @include('chapters.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $chapters])

    </section>
@endsection
