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
            <input type="text" name="phone" id="phone" class="form-control rounded-pill @error('phone') is-invalid @enderror" placeholder="xxx-xxx-xxxx" data-inputmask="'mask': '9{3}-9{3}-9{4}'" value="{{ old('phone') }}">
            @error('phone')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="email" class="label-control">Enter valid email address</label>
            <input type="text" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="someone@example.com" value="{{ old('email') }}">
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
                <option value="black" {{ old('ethnicity') == 'black' ? 'checked' : '' }}>Black (Black American & African origin)</option>
                <option value="caucasian" {{ old('ethnicity') == 'caucasian' ? 'checked' : '' }}>Caucasian</option>
                <option value="hispanic" {{ old('hispanic') == 'hispanic' ? 'checked' : '' }}>Hispanic</option>
                <option value="asian" {{ old('ethnicity') == 'asian' ? 'checked' : '' }}>Asian</option>
                <option value="others" {{ old('ethnicity') == 'others' ? 'checked' : '' }}>Others</option>
            </select>
        </div>
    </div>
</div>