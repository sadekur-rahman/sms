@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Course Details') }}</p>

        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Code</td>
                        <td>Courses</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->code }}</td>
                        <td>
                            @foreach ($course->assignCourses as $item)
                                <span class="badge bg-success"> {{ $item->student->first_name }}
                                    {{ $item->student->last_name }}-{{ $item->student->registration_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
