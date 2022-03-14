@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Student Create') }}</p>

        </div>

        <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="first_name" class="form-label">first name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="first name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="registration_no" class="form-label">registration no</label>
                    <input type="number" name="registration_no" class="form-control" id="registration_no"
                        placeholder="registration no" required>
                </div>
                <div class="mb-3">
                    <label for="registration_no" class="form-label">Courses</label>
                    <select class="form-select" aria-label="Default select example" name="course_id[]" multiple>
                        @foreach ($courses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>


                <hr>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="password" class="form-control"
                        id="exampleInputPassword1" min="8" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
