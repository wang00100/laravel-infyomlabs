@extends('layouts.app')
@section('title')
    Cats
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cats</h1>
            <div class="section-header-breadcrumb">

                <a href="{{ route('cats.create')}}" class="btn btn-primary form-btn">Cat <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
    
       <div class="card">
            <div class="card-body">
                @include('cats.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $cats])

    </section>
@endsection
