@extends('users.admin.layout.app')
@section('title', 'Manage Theme Preview')
@section('style')
<style>
    .dataTables_empty{
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


                <a href="{{ route('theme.show', $theme->id) }}" class="text-dark">
                    <div class="">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">
                                    <img alt="image" src="{{ $image->first()->getFullUrl() }}" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items px-1">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Subscriber</div>
                                            <div class="profile-widget-item-value text-danger">187</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Price</div>
                                            <div class="profile-widget-item-value text-danger"><span class="fa">&#8358;</span>{{ $theme->price }}</div>
                                        </div>


                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">
                                        {{ ucwords(str_replace("_", " ", $theme->name)) }}
                                    </div>
                                    {{ $theme->description }}
                                </div>

                            </div>
                        </div>
                    {{-- <div class="card">
                        <img class="card-img img-fluid" src="{{ $image->first()->getFullUrl() }}" style="height: 200px" alt="{{ $image->first()->name }}">
                    </div> --}}
                </a>
                @endforeach
            @endif
        </div>


            </div>
        </div>
    </div>

</section>
@endsection

