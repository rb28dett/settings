@extends('rb28dett::layouts.master')
@section('icon', 'ion-settings')
@section('title', __('rb28dett_settings::general.title'))
@section('subtitle', __('rb28dett_settings::general.subtitle'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_settings::general.home')</a></li>
        <li><span href="">@lang('rb28dett_settings::general.title')</span></li>
    </ul>
@endsection
@section('content')
    @php
        $p = isset($_GET['p']) ? $_GET['p'] : 'Settings';
        $p = strtolower($p);
    @endphp
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-grid-small">
            <div class="uk-width-1-1@s uk-width-2-5@m uk-width-1-3@l uk-width-1-5@xl">
                <div class="uk-card uk-card-default" uk-sticky="media: 960; offset: 120;">
                    <div class="uk-card-header">
                        @lang('rb28dett_settings::general.modules_available')
                    </div>
                    <div class="uk-card-body">
                        <ul class="uk-tab-left" uk-tab="connect: #settings-content; media: 960">
                            @foreach($packages as $package => $view)
                                <li class="@if(strtolower($package) == $p) uk-active @endif">
                                    <a href="#{{ $package }}">
                                        {{ $package }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-3-5@m uk-width-2-3@l uk-width-4-5@xl">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('rb28dett_settings::general.modules_settings')
                    </div>
                    <div class="uk-card-body">
                        <ul id="settings-content" class="uk-switcher">
                            @foreach($packages as $package => $view)
                                <li>
                                    {!! $view !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(function() {
        $(window).resize(function() {
            if ($(window).width() < 1382) {
                $('.uk-form-horizontal').each(function() {
                    $(this).removeClass('uk-form-horizontal');
                    $(this).addClass('uk-form-stacked');
                });
            } else {
                $('.uk-form-stacked').each(function() {
                    $(this).removeClass('uk-form-stacked');
                    $(this).addClass('uk-form-horizontal');
                });
            }
        })
    });
</script>
@endsection
