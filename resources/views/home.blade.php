@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">الصفحة الرئيسية</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-center">
                            <a href="{{ route('clubs') }}" class="btn btn-primary">الأفواج</a>
                            <a href="{{ route('leaders') }}" class="btn btn-secondary">القادة</a>
                            <a href="{{ route('members') }}" class="btn btn-success">الطلبة</a>
                            <a href="{{ route('clubs') }}" class="btn btn-danger">الطلبة</a>
                            <a href="{{ route('clubs') }}" class="btn btn-warning">الطلبة</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
