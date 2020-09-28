@extends('layouts.business-minimal')
@section('content')
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-4 ml-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Configuration Blade</h3>
                        <p class="alert alert-success">We are almost there :D</p>
                        
                        <form action="{{ route("organizations.store") }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="label-control">Enter Organization Name</label>
                                    <input type="text" name="name" id="name" class="form-control rounded-pill @error('name') is-invalid @enderror" placeholder="Business name"  value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="physical_address" class="label-control">Physical Address</label>
                                    <input type="text" name="physical_address" id="physical_address" class="form-control rounded-pill @error('physical_address') is-invalid @enderror"  value="{{ old('physical_address') }}">
                                    @error('physical_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact_person" class="label-control">Are you the Contact Person at the Business ?</label><br>
                                    <input type="radio" name="contact_person" id=""  value="1"  checked/> Yes 
                                    <input type="radio" name="contact_person" id="" value="0"  /> No
                                </div>

                                <div id="contact-information" style="display: none">
                                    <div class="form-group">
                                        <label for="fullname" class="label-control">Enter Full Name</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control rounded-pill @error('fullname') is-invalid @enderror" data-inputmask="'mask': 'a{3,50}, a{3,50} a{1}'" placeholder="Lastname, Firstname Initial" value="{{ old('fullname') }}">
                                        @error('fullname')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
    
                 
                                    <div class="form-group">
                                        <label for="" class="label-control">Enter Phone Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control rounded-pill @error('phone') is-invalid @enderror" placeholder="xxx-xxx-xxxx" data-inputmask="'mask': '9{3}-9{3}-9{4}'" value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label for="email" class="label-control">Enter valid email address</label>
                                        <input type="text" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="someone@example.com" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="position" class="label-control">Enter  position</label>
                                    <input type="text" name="position" id="position" class="form-control rounded-pill @error('position') is-invalid @enderror" placeholder="xxx-xxx-xxxx" data-inputmask="'mask': '9{3}-9{3}-9{4}'" value="{{ old('position') }}">
                                    @error('position')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="same_as_physical" class="label-control">Is the billing address same as physical ?</label><br>
                                    <input type="radio" name="same_as_physical" id=""  value="1"  checked/> Yes 
                                    <input type="radio" name="same_as_physical" id="" value="0"  /> No
                                </div>

                                <div id="billing-address" class="form-group" style="display: none">
                                    <label for="billing_address" class="label-control">Billing Address</label>
                                    <input type="text" name="billing_address" id="billing_address" class="form-control rounded-pill @error('billing_address') is-invalid @enderror"  value="{{ old('billing_address') }}">
                                    @error('billing_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>   

                                <button type="submit" class="btn btn-success">Register Business</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection