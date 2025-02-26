@extends('layouts.default')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="../index2.html"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        {{-- แสดงข้อผิดพลาดทั้งหมด --}}
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form action="{{ url('/register') }}" method="post">
        @csrf

          {{-- Name Field --}}
          @error('name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   placeholder="Full name" value="{{ old('name') }}" />
            <div class="input-group-text"><span class="bi bi-person"></span></div>
          </div>

          {{-- Email Field --}}
          @error('email')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   placeholder="Email" value="{{ old('email') }}" />
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>

          {{-- Password Field --}}
          @error('password')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Password" />
            <div class="input-group-text"><span class="bi bi-lock"></span></div>
          </div>

          {{-- Checkbox Field --}}
          @error('checkbox')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input @error('checkbox') is-invalid @enderror" type="checkbox"
                       name="checkbox" id="termsCheck" />
                <label class="form-check-label" for="termsCheck"> I agree to the terms </label>
              </div>
            </div>

            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          </div>
        </form>

        <p class="mb-0">
          <a href="login" class="text-center"> I already have a membership </a>
        </p>
      </div>
    </div>
</div>
@endsection
