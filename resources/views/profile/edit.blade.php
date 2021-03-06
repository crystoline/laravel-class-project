@extends('layouts.main')

@section('title')
    Edit Profile
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="post" novalidate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <fieldset>
                    <legend>Edit Profile</legend>
                    <div class="form-group">
                        <label for="first_name">Firstname</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" required value="{{ $profile->first_name }}">
                        @if($errors->has('first_name'))
                            <span style="color:red">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Lastname</label>
                        <input id="last_name" type="text" class="form-control" name="last_name"  required value="{{ $profile->last_name }}">
                        @if($errors->has('last_name'))
                            <span style="color:red">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option></option>
                            <option value="male" {{ ($profile->gender == 'male')? ' selected': '' }} >Male</option>
                            <option value="female" {{ ($profile->gender == 'female')? ' selected': '' }}>Female</option>
                        </select>
                        @if($errors->has('gender'))
                            <span style="color:red">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input id="dob" type="text" class="form-control" name="dob" required
                               placeholder="e.g 1999-01-01" value="{{$profile->dob }}"
                               pattern="[0-9]{4}-[0-9]{2}-[0-3][0-9]" title="Enter date format YYYY-MM-DD">
                        @if($errors->has('dob'))
                            <span style="color:red">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input id="height" type="number" class="form-control" name="height" min="1.00" step="0.01" required value="{{ $profile->height }}">
                        @if($errors->has('height'))
                            <span style="color:red">{{ $errors->first('height') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </fieldset>



            </form>

        </div>
    </div>
@endsection