@extends('layouts.app')
@section('title')
    Pros
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pros</h1>
            <div class="section-header-breadcrumb">

                <a href="{{ route('pros.create')}}" class="btn btn-primary form-btn">Pro <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
    
       <div class="card">
            <div class="card-body">
                @include('pros.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $pros])

    </section>
@endsection
