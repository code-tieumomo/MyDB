@extends('app')

@section('title')
    {{ 'MyDB > ' . $dbName }}
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-header__title">{{ $dbName }}</h1>
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
                            <li class="breadcrumbs__item active">
                                <span class="breadcrumbs__link">{{ $dbName }}</span>
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
                <table id="db-table" class="table table--lines">
                    <thead class="table__header">
                        <tr class="table__header-row">
                            <th class="table__th-sort">
                                <span>Table</span>
                            </th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th--action inorderable"></th>
                            <th class="table__th-sort">
                                <span class="align-middle">Row</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Engine</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Type</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Collation</span>
                            </th>
                            <th class="table__th-sort">
                                <span class="align-middle">Size (KB)</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($res as $table)
                            <tr class="table__row">
                                <td class="table__td">
                                    <a href="{{ route('table.show', ['dbName' => $dbName, 'tableName' => $table->TABLE_NAME]) }}">
                                        {{ $table->TABLE_NAME }}
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="{{ route('table.show', ['dbName' => $dbName, 'tableName' => $table->TABLE_NAME]) }}"
                                        data-tippy-content="Browse" data-tippy-placement="top">
                                        <i class="fab text-success fa-safari"></i>
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="{{ route('table.structure', ['dbName' => $dbName, 'tableName' => $table->TABLE_NAME]) }}"
                                        data-tippy-content="Structure" data-tippy-placement="top">
                                        <i class="far text-primary fa-folder-open"></i>
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="#" data-tippy-content="Search" data-tippy-placement="top">
                                        <i class="fas text-secondary fa-search"></i>
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="#" data-tippy-content="Insert" data-tippy-placement="top">
                                        <i class="fas text-info fa-paint-brush"></i>
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="#" data-tippy-content="Empty" data-tippy-placement="top">
                                        <i class="far text-warning fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td class="table__td table__td--action">
                                    <a href="#" data-tippy-content="Drop" data-tippy-placement="top">
                                        <i class="fas text-danger fa-minus-circle"></i>
                                    </a>
                                </td>
                                <td class="table__td">{{ $table->TABLE_ROWS }}</td>
                                <td class="table__td"><span class="text-grey">{{ $table->ENGINE }}</span></td>
                                <td class="table__td"><span class="text-grey">{{ $table->TABLE_TYPE }}</span></td>
                                <td class="table__td"><span class="text-grey">{{ $table->TABLE_COLLATION }}</span></td>
                                <td class="table__td">
                                    <span class="text-grey">
                                        {{ number_format(round(($table->DATA_LENGTH + $table->INDEX_LENGTH) / 1024, 2), 2, ',', '.') . ' KiB' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
