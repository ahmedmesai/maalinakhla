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
                            <h4>إنشاء طالب</h4>
                        </div>
                        <form method="post" action="{{ route('members.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="team">الفوج</label>
                                <select class="form-control @error('team_key') is-invalid @enderror" id="team"
                                    name="team_key">
                                    <option value="" selected>الفوج</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{!! $team->name . ' - ' . $team->club->name !!}</option>
                                    @endforeach
                                </select>
                                @error('team_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="first_name">الاسم</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" placeholder="الاسم">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">اللقب</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" placeholder="اللقب">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_name">الولي</label>
                                <input type="text" class="form-control @error('parent_name') is-invalid @enderror"
                                    id="parent_name" name="parent_name" placeholder="اسم و لقب الولي">
                                @error('parent_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level_study">المستوى الدراسي</label>
                                <input type="text" class="form-control @error('level_study') is-invalid @enderror"
                                    id="level_study" name="level_study" placeholder="المستوى الدراسي">
                                @error('level_study')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">رقم الهاتف</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" placeholder="رقم الهاتف الولي">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">تسجيل</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
