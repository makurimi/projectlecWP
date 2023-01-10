@extends('layouts.app')
@section('content')
<style>
    body{
        background: #FFFAFA;
    }
</style>
<div class="container">
    <div class="row mt-2">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
           {{ $message }}
          </div>
        @endif
    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header">Change Password</div>

                <div class="card-body ">
                    <form action="{{ route('passwordreset') }}" method="POST">
                        @csrf
                        <div class="mb-3 ">
                            <label>Password </label>
                            <input class="form-control" type="password" name="oldpassword" />
                        </div>
                        <div class="mb-3 ">
                            <label>New Password </label>
                            <input class="form-control" type="password" name="newpassword" />
                        </div>
                        <div class="mb-3 ">
                            <label>New Password Confirmation</label>
                            <input class="form-control" type="password" name="new_password_confirmation" />
                        </div>
                        <div class="mb-3 ">
                            <button class="btn btn-outline-primary">Change</button>
                            <a class="btn btn-outline-danger" href="/">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
