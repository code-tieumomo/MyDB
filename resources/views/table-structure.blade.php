@extends('app')

@section('title')
    {{ 'MyDB > ' . $dbName . ' > ' . $tableName }}
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-header__title page-header__title--with-angle">
                Structure of {{ $dbName }} <i class="fas fa-xs mx-3 fa-angle-right"></i> {{ $tableName }}
            </h1>
        </div>

        <div class="page-tools">
            <div class="page-tools__breadcrumbs">
                <div class="breadcrumbs">
                    <div class="breadcrumbs__container">
                        <ol class="breadcrumbs__list">
                            <li class="breadcrumbs__item">
                                <a class="breadcrumbs__link" href="{{ route('home') }}">
                                    <svg class="icon-icon-home breadcrumbs__icon">
                                        <use xlink:href="#icon-home"></use>
                                    </svg>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumbs__item disabled">
                                <a class="breadcrumbs__link">
                                    <span>DB</span>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumbs__item">
                                <a class="breadcrumbs__link" href="{{ route('db.show', [$dbName]) }}">
                                    <span>{{ $dbName }}</span>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumbs__item active">
                                <span class="breadcrumbs__link">{{ $tableName }}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="page-tools__right">
                <div class="page-tools__right-row">
                    <div class="page-tools__right-item">
                        <a class="button-icon" href="#">
                            <span class="button-icon__icon">
                                <svg class="icon-icon-print">
                                    <use xlink:href="#icon-print"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="page-tools__right-item">
                        <a class="button-icon" href="#">
                            <span class="button-icon__icon">
                                <svg class="icon-icon-import">
                                    <use xlink:href="#icon-import"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="table-wrapper__content table-collapse">
                <table id="db-table" class="table table--lines" style="width: 100%">
                    <thead class="table__header">
                        <tr class="table__header-row">
                            <th class="table__th-sort">
                                <span class="align-middle">Name</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Type</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Collation</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Position</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Null</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Default</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Extra</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Comment</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($res as $col)
                            <tr class="table__row">
                                <td class="table__td">
                                    {{ $col->COLUMN_NAME }}
                                    @if ($col->COLUMN_KEY == 'PRI')
                                        <i class="fas text-warning fa-key"></i>
                                    @elseif ($col->COLUMN_KEY == 'UNI')
                                        <i class="fas text-secondary fa-key"></i>
                                    @endif
                                </td>
                                <td class="table__td">{{ $col->COLUMN_TYPE }}</td>
                                <td class="table__td">{{ $col->COLLATION_NAME }}</td>
                                <td class="table__td">{{ $col->ORDINAL_POSITION }}</td>
                                <td class="table__td">{{ $col->IS_NULLABLE }}</td>
                                <td class="table__td">{{ $col->COLUMN_DEFAULT }}</td>
                                <td class="table__td">{{ $col->EXTRA }}</td>
                                <td class="table__td">{{ $col->COLUMN_COMMENT }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-header">
            <h1 class="page-header__subtitle page-header__title--with-angle">
                Indexes
            </h1>
        </div>

        <div class="table-wrapper">
            <div class="table-wrapper__content table-collapse">
                <table class="table table--lines" style="width: 100%">
                    <thead class="table__header">
                        <tr class="table__header-row">
                            <th class="table__th-sort">
                                <span class="align-middle">Keyname</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Type</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Column</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Unique</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Packed</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Cardinality</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Collation</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Null</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Comment</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($indexes as $index)
                            <tr class="table__row">
                                <td class="table__td">{{ $index->INDEX_NAME }}</td>
                                <td class="table__td">{{ $index->INDEX_TYPE }}</td>
                                <td class="table__td">{{ $index->COLUMN_NAME }}</td>
                                <td class="table__td">{{ !$index->NON_UNIQUE }}</td>
                                <td class="table__td">{{ $index->PACKED }}</td>
                                <td class="table__td">{{ $index->CARDINALITY }}</td>
                                <td class="table__td">{{ $index->COLLATION }}</td>
                                <td class="table__td">{{ $index->NULLABLE }}</td>
                                <td class="table__td">{{ $index->INDEX_COMMENT }}</td>
                            </tr>
                        @empty
                            <tr class="table__row">
                                <td class="table__td text-center" colspan="9">Not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-header">
            <h1 class="page-header__subtitle page-header__title--with-angle">
                Information
            </h1>
        </div>

        <div class="page-info">
            <ul class="nav nav-tabs" id="infoTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="space-usage-tab" data-toggle="tab" href="#space-usage" role="tab" aria-controls="space-usage"
                        aria-selected="true">Space usage</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="row-statistics-tab" data-toggle="tab" href="#row-statistics" role="tab" aria-controls="row-statistics"
                        aria-selected="false">Row statistics</a>
                </li>
            </ul>
            <div class="tab-content" id="infoTabContent">
                <div class="tab-pane fade show active" id="space-usage" role="tabpanel" aria-labelledby="space-usage-tab">
                    <ul class="list-group">
                        <li class="list-group-item">Data: {{ round($info->DATA_LENGTH / 1024, 2) }} KiB</li>
                        <li class="list-group-item">Index: {{ round($info->INDEX_LENGTH / 1024, 2) }} KiB</li>
                        <li class="list-group-item">Overhead: {{ round($info->DATA_FREE / 1024, 2) }} KiB</li>
                        <li class="list-group-item">Effective:
                            {{ round(($info->DATA_LENGTH + $info->INDEX_LENGTH) / 1024, 2) }} KiB
                        </li>
                        <li class="list-group-item">Total:
                            {{ round(($info->DATA_LENGTH + $info->INDEX_LENGTH + $info->DATA_FREE) / 1024, 2) }} KiB
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="row-statistics" role="tabpanel" aria-labelledby="row-statistics-tab">
                    <ul class="list-group">
                        <li class="list-group-item">Format: {{ $info->ROW_FORMAT }}</li>
                        <li class="list-group-item">Collation: {{ $info->TABLE_COLLATION }}</li>
                        <li class="list-group-item">Next autoIndex: {{ $info->AUTO_INCREMENT }}</li>
                        <li class="list-group-item">Creation: {{ $info->CREATE_TIME }}</li>
                        <li class="list-group-item">Last update: {{ $info->UPDATE_TIME }}</li>
                        <li class="list-group-item">Last check: {{ $info->CHECK_TIME }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
