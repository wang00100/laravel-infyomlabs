@extends('layouts.app')
@section('title')
    Staff
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Staff</h1>
            <div class="section-header-breadcrumb">

                <a href="{{ route('staff.create')}}" class="btn btn-primary form-btn">Staff <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
    
       <div class="card">
            <div class="card-body">
                @include('staff.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $staff])

    </section>
@endsection
