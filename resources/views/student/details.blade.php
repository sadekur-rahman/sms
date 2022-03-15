@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Student Details') }}</p>

        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Registration No</td>
                        <td>Courses</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->registration_no }}</td>
                        <td>
                            @foreach ($student->assignCourses as $item)
                                <span class="badge bg-success"> {{ $item->course->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
