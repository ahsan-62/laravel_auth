@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <h4 class="card-title p-2">Login Form</h4>
                    <div class="card-body">
                        <form action="{{ route('login.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="email"class="form-label">Email</label>
                                <input type="text" name="email"
                                    id=""class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password"class="form-label">Password</label>
                                <input type="password" name="password"
                                    id=""class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Log in</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
