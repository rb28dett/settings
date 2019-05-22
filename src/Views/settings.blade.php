@php
    $settings = RB28DETT\Settings\Models\Settings::first();
@endphp
<div uk-grid>
    @can('update', RB28DETT\Settings\Models\Settings::class)
        <div class="uk-width-1-1@s uk-width-1-5@l"></div>
        <div class="uk-width-1-1@s uk-width-3-5@l">
            <form class="uk-form-horizontal" method="POST" action="{{ route('rb28dett::settings.general.update') }}">
                {{ csrf_field() }}
                <fieldset class="uk-fieldset">

                    <div class="uk-margin">
                        <label class="uk-form-label">@lang('rb28dett_settings::general.appname')</label>
                        <div class="uk-form-controls">
                            <input value="{{ old('appname', $settings->appname ? $settings->appname : '') }}" name="appname" class="uk-input" type="text" placeholder="@lang('rb28dett_settings::general.appname_ph')">
                            <small class="uk-text-meta">@lang('rb28dett_settings::general.appname_hp')</small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label">@lang('rb28dett_settings::general.description')</label>
                        <div class="uk-form-controls">
                            <input value="{{ old('description', $settings->description ? $settings->description : '') }}" name="description" class="uk-input" type="text" placeholder="@lang('rb28dett_settings::general.description_ph')">
                            <small class="uk-text-meta">@lang('rb28dett_settings::general.description_hp')</small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label">@lang('rb28dett_settings::general.keywords')</label>
                        <div class="uk-form-controls">
                            <input value="{{ old('keywords', $settings->keywords ? $settings->keywords : '') }}" name="keywords" class="uk-input" type="text" placeholder="@lang('rb28dett_settings::general.keywords_ph')">
                            <small class="uk-text-meta">@lang('rb28dett_settings::general.keywords_hp')</small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label">@lang('rb28dett_settings::general.author')</label>
                        <div class="uk-form-controls">
                            <input value="{{ old('author', $settings->author ? $settings->author : '') }}" name="author" class="uk-input" type="text" placeholder="@lang('rb28dett_settings::general.author_ph')">
                            <small class="uk-text-meta">@lang('rb28dett_settings::general.author_hp')</small>
                        </div>
                    </div>

                    <div class="uk-margin uk-align-right">
                        <button type="submit" class="uk-button uk-button-primary">
                            <span class="ion-forward"></span>&nbsp; @lang('rb28dett_settings::general.save')
                        </button>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="uk-width-1-1@s uk-width-1-5@l"></div>
    @else
        <div class="uk-width-1-1">
            <div class="content-background">
                <div class="uk-section uk-section-small uk-section-default">
                    <div class="uk-container uk-text-center">
                        <h3>
                            <span class="ion-minus-circled"></span>
                            @lang('rb28dett_settings::general.unauthorized_action')
                        </h3>
                        <p>
                            @lang('rb28dett_settings::general.unauthorized_desc')
                        </p>
                        <p class="uk-text-meta">
                            @lang('rb28dett_settings::general.contact_webmaster')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
