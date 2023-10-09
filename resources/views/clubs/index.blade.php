@extends('layouts.app')
@php
    $i = 1;
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <h3>النوادي</h3>
                    <a href="#" class="btn btn-primary mt-2">الصفحة الرئيسية</a>
                </div>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-8 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">النادي</th>
                            <th scope="col">القائد</th>
                            <th scope="col">الحدث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clubs as $club)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->leader->name }}</td>
                                <td>
                                    <a href="{{ route('clubs.show', ['id' => $club->id]) }}" class="btn btn-primary"><i
                                            class="bi bi-eye"></i></a>
                                    <form method="post" action="{{ route('clubs.destroy', ['id' => $club->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                                        </div>
                                        {{-- <span class="btn btn-danger"><i class="bi bi-x-circle"></i></span> --}}
                                    </form>
                                    <a href="{{ route('clubs.edit', ['id' => $club->id]) }}" class="btn btn-success"><i
                                            class="bi-pencil-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
@endsection
