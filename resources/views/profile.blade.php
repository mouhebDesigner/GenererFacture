@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">{{ __('Profile') }}</a></li>
    </ol>
</nav>
<div class="row profile-body">
    @if (Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="card rounded">
            <div class="card-body">
                <div>
                    <img class="wd-50 rounded-circle"
                        src="{{ asset('storage/'.Auth::user()->avatar) }}"
                        alt="profile">
                    <span class="h4 ms-3 text-dark">
                        @if(App::getLocale() == "ar")
                            {{ Auth::user()->firstNameAr }}
                            {{ Auth::user()->lastNameAr }}
                        @else 
                            {{ Auth::user()->firstName }}
                            {{ Auth::user()->lastName }}
                        @endif
                    </span>
                </div>
               
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                    <p class="text-muted">{{ Auth::user()->created_at->format('F d, Y') }}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                    <p class="text-muted">{{ Auth::user()->phone }}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-9 middle-wrapper">
        
        <div class="card">
            <div class="card-body">
                <div class="example">
                    <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        @if($errors->has('current_password') || $errors->has('password'))

                        <a class="nav-link " id="home-line-tab" data-bs-toggle="tab" data-bs-target="#informations" role="tab" aria-controls="informations" aria-selected="true">{{ __('Informations') }}</a>
                        @else 

                        <a class="nav-link  active" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#informations" role="tab" aria-controls="informations" aria-selected="true">{{ __('Informations') }}</a>
                        @endif
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link @if($errors->has('current_password') || $errors->has('password')) active @endif" id="profile-line-tab" data-bs-toggle="tab" data-bs-target="#update-password" role="tab" aria-controls="update-password" aria-selected="false" tabindex="-1">{{ __('Update password')}}</a>
                      </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                      <div 
                        @if($errors->has('current_password') || $errors->has('password'))
                            class="tab-pane fade"                         
                        @else 
                            class="tab-pane fade active show"                                                 
                        @endif
                        id="informations" role="tabpanel" aria-labelledby="home-line-tab">
                        <h6 class="card-title">{{ __('Edit profile informations') }}</h6>
                        <form method="POST" action="{{ route('profile.update') }}" id="updateInformations" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="firstName" class="form-label">{{ __('First Name') }}</label>
                                <input type="text" data-required="true" class="form-control @error('firstName') is-invalid @enderror" id="firstName"
                                    name="firstName" value="{{ Auth::user()->firstName }}">
                                @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">{{ __('Last Name') }}</label>
                                <input type="text" data-required="true" class="form-control @error('lastName') is-invalid @enderror" id="lastName"
                                    name="lastName" value="{{ Auth::user()->lastName }}">
                                @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="firstNameAr" class="form-label">{{ __('First Name (Arabic)') }}</label>
                                <input type="text" data-required="false" class="form-control @error('firstNameAr') is-invalid @enderror" id="firstNameAr"
                                    name="firstNameAr" value="{{ Auth::user()->firstNameAr }}">
                                @error('firstNameAr')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lastNameAr" class="form-label">{{ __('Last Name (Arabic)') }}</label>
                                <input type="text" data-required="false" class="form-control @error('lastNameAr') is-invalid @enderror" id="lastNameAr"
                                    name="lastNameAr" value="{{ Auth::user()->lastNameAr }}">
                                @error('lastNameAr')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                                <input type="file" data-required="false" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                                    name="avatar">
                                @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input type="text" data-required="false" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" data-required="true" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ Auth::user()->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2" id="updateBtnInfo">{{ __('Update') }}</button>
                            <a href="{{ route('topAdmin.platforms.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </form>
                      </div>
                      <div class="tab-pane fade @if($errors->has('current_password') || $errors->has('password')) active show @endif" id="update-password" role="tabpanel" aria-labelledby="profile-line-tab">
                        <form method="POST" action="{{ route('updatePassword') }}" id="formInputs">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                <input type="password" data-required="true" class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                                    name="current_password">
                                @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('New Password') }}</label>
                                <input type="password" data-required="true" class="form-control @error('password') is-invalid @enderror" id="password"
                                    name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
                                <input type="password" data-required="true" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2" id="addBtn">{{ __('Update Password') }}</button>
                            <a href="{{ route('topAdmin.platforms.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </form>
                        
                      </div>
                      
                      
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

</div>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function(){

      // Disable the "Add New Service" button by default
      $('#updateInformations input, #updateInformations select, #updateInformations textarea').each(function() {
        if(this.value === '' && $(this).data('required')){

          console.log($(this).attr('name'));
        }
      });
      console.log($('#updateInformations input, #updateInformations select, #updateInformations textarea').filter(function() {
        return this.value === '' && $(this).data('required');
      }).length);
      
      // Check form completion status on input change
      $(document).on('input change', '#updateInformations input, #updateInformations select, #updateInformations textarea', function() {

          // Check if all form inputs are completed
          console.log($('#updateInformations input, #updateInformations select, #updateInformations textarea').filter(function() {
              return this.value === '' && $(this).data('required');
          }).length);
          
          var allInputsCompleted = $('#updateInformations input, #updateInformations select, #updateInformations textarea').filter(function() {
              return this.value === '' && $(this).data('required');
          }).length === 0;
         
          // Enable or disable the "Update Service" button based on completion status
          $('#updateBtnInfo').prop('disabled', !allInputsCompleted);
      });
    });
  </script>
@endpush