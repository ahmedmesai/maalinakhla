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
                        <form method="post", action="{{ route('teams.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="clubs">النادي</label>
                                <select class="form-control @error('club') is-invalid @enderror" id="clubs"
                                    name="club">
                                    <option value="" selected>اختر نادي</option>
                                    @foreach ($clubs as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('club')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="leader">القائد</label>
                                <select class="form-control @error('leader') is-invalid @enderror" id="leader"
                                    name="leader">
                                    <option value="" selected>اختر قائد</option>
                                    @foreach ($leaders as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('leader')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="co_leader">مساعد القائد</label>
                                <select class="form-control  @error('co_leader') is-invalid @enderror" id="co_leader"
                                    name="co_leader">
                                    <option value="" selected>اختر مساعد قائد</option>
                                    @foreach ($leaders as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('co_leader')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="team">اسم الفوج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="team" placeholder="اسم الفوج" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level">المستوى</label>
                                <select class="form-control @error('level') is-invalid @enderror" id="level"
                                    name="level">
                                    <option value="1" selected>متوسط</option>
                                    <option value="2">ثانوي</option>
                                    <option value="3">جامعي</option>
                                </select>
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">انشاء الفوج</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
