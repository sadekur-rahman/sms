@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Student List') }}</p>

        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Registration No</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->registration_no }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
