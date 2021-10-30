@extends('app')

@section('content')
    <div class="container">
        <div class="widgets">
            <div class="widgets__row row gutter-bottom-xl">
                <div class="col-12 col-md-6 col-xl-4 d-flex">
                    <div class="widget">
                        <div class="widget__wrapper">
                            <div class="widget__row">
                                <div class="widget__left">
                                    <h3 class="widget__title">{{ trans('text.dashboard.general_settings') }}</h3>
                                    <div class="widget__status-title text-grey">{{ trans('text.dashboard.server_connection_collation') }}</div>
                                    <div class="widget__trade">
                                        <span class="widget__trade-count">{{ $info->collation_connection }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 d-flex">
                    <div class="widget">
                        <div class="widget__wrapper">
                            <div class="widget__row">
                                <div class="widget__left">
                                    <h3 class="widget__title">{{ trans('text.dashboard.database_server') }}</h3>
                                    <div class="widget__status-title text-grey">
                                        {{ trans('text.dashboard.server') }}: {{ $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS) }}</div>
                                    <div class="widget__status-title text-grey">
                                        {{ trans('text.dashboard.server_type') }}: {{ $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) }}
                                    </div>
                                    <div class="widget__status-title text-grey">
                                        {{ trans('text.dashboard.server_version') }}: {{ $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) }}
                                    </div>
                                    <div class="widget__status-title text-grey">{{ trans('text.dashboard.user') }}: {{ $user }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 d-flex">
                    <div class="widget">
                        <div class="widget__wrapper">
                            <div class="widget__row">
                                <div class="widget__left">
                                    <h3 class="widget__title">{{ trans('text.dashboard.web_server') }}</h3>
                                    <div class="widget__status-title text-grey">{{ $_SERVER['SERVER_SOFTWARE'] }}</div>
                                    <div class="widget__status-title text-grey">
                                        {{ trans('text.dashboard.database_client_version') }}: {{ $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION) }}
                                    </div>
                                    <div class="widget__status-title text-grey">
                                        {{ trans('text.dashboard.php_version') }}: {{ phpversion() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
