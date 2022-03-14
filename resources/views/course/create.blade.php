@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <p> {{ __('Course Create') }}</p>

        </div>

        <div class="card-body">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">code</label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="code"
                        required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="number" name="price" class="form-control" id="price"
                        placeholder="price" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
