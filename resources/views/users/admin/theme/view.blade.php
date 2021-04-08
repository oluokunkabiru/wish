@extends('users.admin.layout.app')
@section('title', 'Manage Theme Preview')
@section('style')
    <style>
        .dataTables_empty {
            color: red;
            font-weight: bold;
        }

    </style>
@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Manage Theme View</h1>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('theme.create') }}" class="btn btn-success text-uppercase">add new theme</a>
                </div>
                <div class="card-body">
                    <div class="card-columns">
                        @if ($themies)
                            @foreach ($themies as $theme)
                                @php
                                    $image = $theme->getMedia('preview');

                                @endphp


                                {{-- <div class=""> --}}
                                @if ($theme->active == 'disabled')
                                    <a href="#disabled-theme" class="text-dark" data-toggle="modal">

                                        <div class="card profile-widget">
                                            <div class="profile-widget-header">
                                                <img alt="image" src="{{ $image->first()->getFullUrl() }}"
                                                    class="rounded-circle profile-widget-picture">
                                                <div class="profile-widget-items px-1">
                                                    <div class="profile-widget-item">
                                                        <div class="profile-widget-item-label">Subscriber</div>
                                                        <div class="profile-widget-item-value text-danger">187</div>
                                                    </div>
                                                    <div class="profile-widget-item">
                                                        <div class="profile-widget-item-label">Price</div>
                                                        <div class="profile-widget-item-value text-danger"><span
                                                                class="fa">&#8358;</span>{{ $theme->price }}</div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="profile-widget-description">
                                                <div class="profile-widget-name">
                                                    {{ ucwords(str_replace('_', ' ', $theme->name)) }}
                                                </div>
                                                {{ $theme->description }}
                                            </div>

                                        </div>
                                    </a>


                                @else



                                        <div class="card profile-widget">
                                            <a href="{{ route('previewTemplate', $theme->id) }}" class="text-dark">
                                            <div class="profile-widget-header">
                                                <img alt="image" src="{{ $image->first()->getFullUrl() }}"
                                                    class="rounded-circle profile-widget-picture">
                                                <div class="profile-widget-items px-1">
                                                    <div class="profile-widget-item">
                                                        <div class="profile-widget-item-label">Subscriber</div>
                                                        <div class="profile-widget-item-value text-danger">187</div>
                                                    </div>
                                                    <div class="profile-widget-item">
                                                        <div class="profile-widget-item-label">Price</div>
                                                        <div class="profile-widget-item-value text-danger"><span
                                                                class="fa">&#8358;</span>{{ $theme->price }}</div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="profile-widget-description">
                                                <div class="profile-widget-name">
                                                    {{ ucwords(str_replace('_', ' ', $theme->name)) }}
                                                </div>
                                                {{ $theme->description }}
                                            </div>
                                            </a>
                                             <a href="{{ route('themePreset', [$theme->id, $theme->name]) }}"
                                        class="btn btn-secondary p-2 text-uppercase">Preset the theme</a>
                                        </div>



                                @endif


                            @endforeach
                        @endif

                    </div>



                </div>

            </div>


        </div>




    </section>
    <!-- The Modal -->
  <div class="modal fade" id="disabled-theme">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-danger text-uppercase"> activation alert</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h4>This theme is not yet activated, please contact the admin for the activation</h4>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
@endsection
