@extends('layouts.main')

@section('title')
    Profiles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <a href="{{ route('profile.create') }}" class="btn btn-primary">New Profile</a>
            <div class="card">
                <div class="card-header">
                    Profiles
                </div>
                <div class="card-block">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>gender</th>
                            {{--    <th>DOB</th>
                                <th>Height</th>--}}
                                <th>Date Created</th>
                              {{--  <th>Date Modified</th>--}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                            <tr>
                                <td>{{ $profile->id }}</td>
                                <td>{{ $profile->first_name }}</td>
                                <td>{{ $profile->last_name }}</td>
                                <td>{{ $profile->gender }}</td>
                                {{--<td>{{ $profile->dob }}</td>
                                <td>{{ number_format($profile->height, 2) }}</td>--}}
                                <td>{{ $profile->created_at }}</td>
                                {{--<td>{{ $profile->updated_at }}</td>--}}
                                <th>
                                    <a href="{{ route('profile.show', [ 'profile' => $profile->id]) }}" class="btn btn-primary btn-xs">View</a>
                                    <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}" class="btn btn-info btn-xs">Edit</a>
                                    <form action="{{route('profile.destroy', ['profile' => $profile->id] )}}"
                                          onsubmit="return confirm('Are you sure?')"
                                          method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection