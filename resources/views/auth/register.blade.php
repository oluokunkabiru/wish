@extends('pages.layouts.app')
@section('title', 'Register')

@section('content')
<section class="inner-banner2 clearfix">
    <div class="container clearfix">
      <h2 class="text-center">Register</h2>
    </div>
  </section>
  <section class="breadcumb-wrapper">
    <div class="container clearfix">
      <ul class="breadcumb">
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><span>Register</span></li>
      </ul>
    </div>
  </section>
  <!-- Contact us Page-->
  <section class="core-projects touch">
    <div class="sectpad touch_bg">
      <div class="container clearfix">
        {{-- <h1>Stat connected</h1>
        <p>You can talk to our online representative at any time. Please use our Live Chat System on our website or<br>Fill up below instant messaging programs.</p>
        <h6>Please be patient, We will get back to you. Our 24/7 Support, <span>General Inquireies Phone: + 0987 654 321</span></h6> --}}
        <div class="row touch_middle">
          <div class="col-md-4 open_hours">
            <div class="touch_top-con">
              <ul class="nav">
                <li class="item">
                  <div class="media">
                    <div class="media-left"><a href="#"><i class="fa fa-map-marker"></i></a></div>
                    <div class="media-body">Wood Workshop, 562, Mallin Street New Youk, NY 100 254</div>
                  </div>
                </li>
                <li class="item">
                  <div class="media">
                    <div class="media-left"><a href="#"><i class="fa fa-envelope-o"></i></a></div>
                    <div class="media-body"><a href="mailto:info@woodworkshop.com">info@woodworkshop.com</a><a href="mailto:support@woodworkshop.com">support@woodworkshop.com</a></div>
                  </div>
                </li>
                <li class="item">
                  <div class="media">
                    <div class="media-left"><a href="#"><i class="fa fa-phone"></i></a></div>
                    <div class="media-body">+ 1800 562 2487<br>                                        + 3215 546 8975</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-8 input_form">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                    {{-- <div class="col-md-6"> --}}
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{-- </div> --}}
                </div>

                <div class="form-group row">
                    <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    {{-- <div class="col-md-6"> --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{-- </div> --}}
                </div>

                <div class="form-group row">
                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                    {{-- <div class="col-md-6"> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{-- </div> --}}
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    {{-- <div class="col-md-6"> --}}
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    {{-- </div> --}}
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- <section id="map-area">
    <div id="contact-google-map" data-map-lat="-37.812802" data-map-lng="144.956981" data-icon-path="images/map/map-marker.png" data-map-title="Envato HQ" data-map-zoom="12" class="google-map"></div>
  </section> --}}
@endsection
