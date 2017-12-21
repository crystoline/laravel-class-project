@extends('layouts.main')

@section('title')
    User Profiles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <a href="{{ route('profile.create') }}" class="btn btn-primary">New Profile</a>
            <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}" class="btn btn-info">Edit</a>
            <div class="card">
                <div class="card-header">
                    User Profiles
                </div>
                <div class="card-block">

                    <table class="table table-bordered" style="max-width: 500px">
                        <tr>
                            <th>Firstname</th>
                            <td>{{ $profile->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Lastname</th>
                            <td>{{ $profile->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucfirst($profile->gender) }}</td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td>{{ $profile->dob }}</td>
                        </tr>
                        <tr>
                            <th>Height</th>
                            <td>{{ number_format($profile->height, 2) }}m</td>
                        </tr>
                        <tr>
                            <th>Date Registered</th>
                            <td>{{ $profile->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Date Updated</th>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection