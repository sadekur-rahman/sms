@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Course List') }}</p>

        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Code</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <a href="{{ route('course.buy', $item->id) }}" class="btn btn-info">Buy</a>
                                <a href="{{ route('course.show', $item->id) }}" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
