@extends('layouts.app')

@section('content')

<div class="login-img">

        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="../assets/images/brand/logo-white.png" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="col-md-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="text-align:center">HOSPITAL APPOINTMENT BOOKING FORM</h4>

                            </div>

                            <div class="card-body">


                                <form action="{{ route('store.booking') }}" method="post">
@csrf
                                    <div class="">
                                        @include('flash::message')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" value="{{ old('fullname') }}">
                                            @if ($errors->has('fullname')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('fullname') }}</strong> </span> @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile" id="exampleInputEmail1" value="{{ old('mobile') }}">
                                            @if ($errors->has('mobile')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('mobile') }}</strong> </span> @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                                            @if ($errors->has('email')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('email') }}</strong> </span> @endif

                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                @php
                                                 $specialities=App\Models\Speciality::All();
                                                @endphp
                                                <select class="form-control select2-show-search form-select" name="speciality"  data-placeholder="Select Speciality" name="speciality">
                                                        <option label="Select Speciality"></option>
                                                        @foreach ($specialities as $value )
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach

                                                    </select>
                                                     @if ($errors->has('speciality')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('speciality') }}</strong> </span> @endif
                                                    </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"  class="form-label">Appointnment Date</label>
                                            <input type="date" name="appointment_date"  class="form-control" id="exampleInputEmail1" value="{{ old('appointment_date') }}">
                                            @if ($errors->has('appointment_date')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('appointment_date') }}</strong> </span> @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Notes</label>
                                            <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px">{{ old('description') }}</textarea>
                                            @if ($errors->has('description')) <span class="help-block" style="color:red"> <strong>{{ $errors->first('description') }}</strong> </span> @endif

                                        </div>

                                    </div>
                                    <button class="btn btn-primary mt-4 mb-0">Make Appointment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div> </div>
        <!-- End PAGE -->
@e