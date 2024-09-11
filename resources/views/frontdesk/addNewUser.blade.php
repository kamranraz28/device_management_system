@extends('frontdesk.master')
@section('title', 'VMS')
@section('content')

<div class="col-md-12 col-lg-12 col-xl-12">

<h2 style="text-align:center">Create New User</h2>
<br>
<br>

    <div class="mx-auto" style="max-width: 500px;">
    @if(session('success_message'))
        <div class="alert" style="background-color: #e8146c; color: white;">
            {{ session('success_message') }}
        </div>
    @endif

    @if(session('error_message'))
        <div class="alert" style="background-color: #e8146c; color: white;">
            {{ session('error_message') }}
        </div>
    @endif



        <form action="{{ route('storeUser') }}" method="post" class="p-4"
            style="background-color: #f8f9fa; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
            @csrf

            <!-- Name Field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label" style="color: #343a40; font-weight: bold;">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"
                    style="border-color: #6c757d; border-radius: 4px;" required>
            </div>

            <!-- Level Dropdown Field -->
            <div class="form-group mb-3">
                <label for="level" class="form-label" style="color: #343a40; font-weight: bold;">Level</label>
                <select name="level" id="level" class="form-select" style="border-color: #6c757d; border-radius: 4px;"
                    required>
                    <option value="">Please Select</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>

            <!-- Email Field -->
            <div class="form-group mb-4">
                <label for="email" class="form-label" style="color: #343a40; font-weight: bold;">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                    style="border-color: #6c757d; border-radius: 4px;" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #e8146c; border-color: #007bff; padding: 8px 16px; border-radius: 4px;">Submit</button>
            </div>
        </form>


    </div>
</div>

@endsection