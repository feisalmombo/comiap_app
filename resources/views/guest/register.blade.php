@extends('layouts.guest-minimal')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-5 mr-auto text-light">
                <h1 style="font-weight: 300; font-size: 48px; line-height: 56px;">Welcome to</h1>
                <h2 style="font-weight:normal; font-size: 24px; line-height: 170.69%;">COMIAP</h2>
                <p class="lead">For Public health purpose, it is important that you register before using this service. While you are required to register, your confidentiality and privacy is paramount to our service.</p>
                <p>Already have an account | <strong><a href="/login" class="text-light">Log In Now</a></strong></p>
            </div>
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-body text-dark">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <h2>Sign Up</h2>
                            <p>Please Answer The Following Questions</p>
                            <h5 class="pt-3">Basic Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="suffix" class="label-control">Suffix</label>
                                        <select name="suffix" id="" class="form-control rounded-pill">
                                            <option value="Jr">Jr</option>
                                            <option value="Sr">Sr</option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fullname" class="label-control">Enter Full Name</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control rounded-pill @error('fullname') is-invalid @enderror" data-inputmask="'mask': 'a{3,50}, a{3,50} a{1}'" placeholder="Lastname, Firstname Initial" value="{{ old('fullname') }}">
                                        @error('fullname')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="label-control">Enter Phone Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control rounded-pill @error('phone') is-invalid @enderror" placeholder="xxx-xxx-xxxx" data-inputmask="'mask': '9{3}-9{3}-9{4}'" value="{{ old('phone') ?? $faker->phone }}">
                                        @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="email" class="label-control">Enter valid email address</label>
                                        <input type="text" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="someone@example.com" value="{{ old('email') ?? $faker->email }}">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender" class="label-control">Please Select gender that applies to you</label>
                                        <select name="gender" id="" class="form-control rounded-pill">
                                            <option value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>Female</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>Male</option>
                                            <option value="others" {{ old('gender') == 'others' ? 'checked' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="suffix" class="label-control">Please Select Your ethnicity group</label>
                                        <select name="ethnicity" id="" class="form-control rounded-pill">
                                            <option value="black" {{ old('ethnicity')  == 'black' ? 'checked' : '' }}>Black (Black American & African origin)</option>
                                            <option value="caucasian" {{ old('ethnicity') == 'caucasian' ? 'checked' : '' }}>Caucasian</option>
                                            <option value="hispanic" {{ old('hispanic') == 'hispanic' ? 'checked' : '' }}>Hispanic</option>
                                            <option value="asian" {{ old('ethnicity') == 'asian' ? 'checked' : '' }}>Asian</option>
                                            <option value="others" {{ old('ethnicity') == 'others' ? 'checked' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label for="account_type" class="label-control">Is the account for personal use?</label>
                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type" id="inlineCheckbox1" value="patient" checked="{{ true || old("account_type") == 'patient' }}">
                                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type" id="inlineCheckbox1" value="business" checked="{{ old("account_type") == "business" }}">
                                        <label class="form-check-label" for="inlineCheckbox1">No</label>
                                    </div>
                                </div>
                            </div>

                            <h5 class="pt-3" >Residential Address <a href="#" data-toggle="tooltip" data-placement="top" title="Residential address is used to match you with nearby service and allow public health care professional to communicate with you if needed in the matter of COVID-19 spread.">[?]</a> </h5>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="building_name" class="label-control">Building Name</label>
                                        <input type="text" name="building_name" class="form-control rounded-pill @error('building_name') is-invalid @enderror" placeholder="" value="{{ old('building_name') }}">
                                        @error('building_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="building_number" class="label-control">Building Number</label>
                                        <input type="text" name="building_number" class="form-control rounded-pill @error('building_number') is-invalid @enderror" placeholder="" value="{{ old('building_number') }}">
                                        @error('building_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="street_address" class="label-control">Street Address</label>
                                        <input type="text" name="street_address" class="form-control rounded-pill @error('street_address') is-invalid @enderror" placeholder="" value="{{ old('street_address') }}">
                                        @error('street_address')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="second_address" class="label-control">Second Address</label>
                                        <input type="text" name="second_address" class="form-control rounded-pill @error('second_address') is-invalid @enderror" placeholder="" value="{{ old('second_address') }}">
                                        @error('second_address')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="zipcode" class="label-control">Zip Code</label>
                                        <input type="text" name="zipcode" class="form-control rounded-pill @error('zipcode') is-invalid @enderror" placeholder="" value="{{ old('zipcode') }}">
                                        @error('zipcode')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city" class="label-control">City</label>
                                        <input type="text" name="city" class="form-control rounded-pill @error('city') is-invalid @enderror" placeholder="" value="{{ old('city') }}">
                                        @error('city')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="state" class="label-control">State</label>
                                        <input type="text" name="state" class="form-control rounded-pill @error('state') is-invalid @enderror" placeholder="" value="{{ old('state') }}">
                                        @error('state')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary px-5">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection