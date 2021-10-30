@extends('app')

@section('title')
    {{ 'MyDB > ' . $dbName . ' > ' . $tableName }}
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-header__title page-header__title--with-angle">
                {{ $dbName }} <i class="fas fa-xs mx-3 fa-angle-right"></i> {{ $tableName }}
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

        <div class="alert alert-success mb-4" role="alert">
            <i class="fas text-success fa-check"></i> {{ $mainSQL }} (Query took {{ $duration }} seconds)
        </div>

        <div class="table-wrapper">
            <div class="table-wrapper__content table-collapse">
                <table id="db-table" class="table table--lines" style="width: 100%">
                    <thead class="table__header">
                        <tr class="table__header-row">
                            @foreach ($cols as $col)
                                <th class="table__th-sort">
                                    <span class="align-middle">{{ $col->COLUMN_NAME }}</span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($res as $row)
                            <tr class="table__row">
                                @foreach ($cols as $col)
                                    <td class="table__td">{{ $row->{$col->COLUMN_NAME} }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
