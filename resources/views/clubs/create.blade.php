@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <a href="#" class="btn btn-primary">الصفحة الرئيسية</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-center">
                            <h4>إنشاء النادي</h4>
                        </div>
                        <form method="post" action="{{ route('clubs.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="leader">القائد</label>
                                <select class="form-control @error('leader_key') is-invalid @enderror" id="leader"
                                    name="leader_key">
                                    <option value="" selected>القائد</option>
                                    @foreach ($leaders as $leader)
                                        <option value="{{ $leader->id }}">{!! $leader->name !!}</option>
                                    @endforeach
                                </select>
                                @error('team_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">الاسم النادي</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="الاسم النادي">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">تسجيل النادي</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
