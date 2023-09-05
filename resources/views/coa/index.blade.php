@extends('layout.main')

@section('title', 'Chart Of Accounts')

@section('content')

    <div class="card text-muted">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Chart Of Accounts</h4>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                        data-bs-target=".bs-example-modal-xl">Create Account</button>
                </div>
            </div>
            <div class="card-body">
                @if (count($account) > 0)
                    <tr>
                        <td colspan="2">
                            <ul>
                                @foreach ($account as $ac)
                                    <li>
                                        @php
                                            $sentence = str_replace('0', '', $ac->start_code);
                                        @endphp
                                        <div class="border p-2">
                                            <span>
                                                <b> {{ $sentence }} - {{ ucwords($ac->name) }} </b>
                                                <b style="float: right"> (0) </b>
                                                {{-- <div style="float: right" class="btn-group">
                                                    <button style="margin-top: -5px; margin-right: 10px" data-toggle="dropdown"
                                                        class="btn btn-sm dropdown-toggle" type="button"><i
                                                            class="fa fa-chevron-down"></i></button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        @if ($ac->transactions->count() == 0)
                                                            <li style="border: none !important">
                                                                <a href="#" style="padding: 0px"
                                                                    class="coa_level_delete text-danger" data-toggle="modal"
                                                                    data-target="#coa_delete_modal" style=""
                                                                    data-level="1" data-id="{{ $ac->id }}"
                                                                    data-code="{{ $ac->start_code }}"
                                                                    data-name="{{ $ac->name }}"><i class="fa fa-trash"></i>
                                                                    @lang('messages.delete')
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <li style="border: none !important">
                                                            <a href="#" style="padding: 0px" class="coa_level_edit"
                                                                data-toggle="modal" data-target="#coa_edit_modal" style=""
                                                                data-level="1" data-id="{{ $ac->id }}"
                                                                data-code="{{ $ac->start_code }}"
                                                                data-name="{{ $ac->name }}"><i class="fa fa-pencil"></i>
                                                                @lang('messages.edit')
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </span>
                                        </div>
                                        <ul>
                                            @if ($ac->level2->count())
                                                @foreach ($ac->level2 as $acl2)
                                                    <li>
                                                        <div class="border p-2">
                                                            <span>{{ $acl2->code }} - {{ ucwords($acl2->name) }}
                                                                <b style="float: right"> (
                                                                    {{ $acl2->id }} ) </b>
                                                                {{-- <div style="float: right" class="btn-group">
                                                                    <button style="margin-top: -5px; margin-right: 10px" data-toggle="dropdown"
                                                                        class="btn btn-sm dropdown-toggle"
                                                                        type="button"><i class="fa fa-chevron-down"></i></button>
                                                                    <ul role="menu" class="dropdown-menu">
                                                                        @if ($acl2->transactions->count() == 0)
                                                                            <li style="border: none !important">
                                                                                <a href="#" style="padding: 0px"
                                                                                    class="coa_level_delete text-danger" data-toggle="modal"
                                                                                    data-target="#coa_delete_modal" style=""
                                                                                    data-level="4" data-id="{{ $acl2->id }}"
                                                                                    data-code="{{ $acl2->code }}"
                                                                                    data-name="{{ $acl2->name }}"><i class="fa fa-trash"></i>
                                                                                    @lang('messages.delete')
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        <li style="border: none !important">
                                                                            <a href="#" style="padding: 0px" class="coa_level_edit"
                                                                                data-toggle="modal" data-target="#coa_edit_modal" style=""
                                                                                data-level="2" data-id="{{ $acl2->id }}"
                                                                                data-code="{{ $acl2->code }}"
                                                                                data-name="{{ $acl2->name }}"><i class="fa fa-pencil"></i>
                                                                                Edit
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div> --}}
                                                            </span>
                                                        </div>
                                                        <ul>
                                                            @if ($acl2->level3->count())
                                                                @foreach ($acl2->level3 as $acl3)
                                                                    <li>
                                                                        <div class="border p-2">
                                                                            <span>{{ $acl3->code }} - {{ ucwords($acl3->name) }}
                                                                                <b style="float: right"> (
                                                                                    {{ $acl3->id }}
                                                                                    ) </b>
                                                                                {{-- <div style="float: right" class="btn-group">
                                                                                    <button style="margin-top: -5px; margin-right: 10px"
                                                                                        data-toggle="dropdown"
                                                                                        class="btn btn-sm dropdown-toggle"
                                                                                        type="button"><i class="fa fa-chevron-down"></i></button>
                                                                                    <ul role="menu" class="dropdown-menu">
                                                                                        @if ($acl3->transactions->count() == 0)
                                                                                            <li style="border: none !important">
                                                                                                <a href="#" style="padding: 0px"
                                                                                                    class="coa_level_delete text-danger"
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#coa_delete_modal"
                                                                                                    style="" data-level="3"
                                                                                                    data-id="{{ $acl3->id }}"
                                                                                                    data-code="{{ $acl3->code }}"
                                                                                                    data-name="{{ $acl3->name }}"><i
                                                                                                        class="fa fa-trash"></i>
                                                                                                    @lang('messages.delete')
                                                                                                </a>
                                                                                            </li>
                                                                                        @endif
                                                                                        <li style="border: none !important">
                                                                                            <a href="#" style="padding: 0px"
                                                                                                class="coa_level_edit" data-toggle="modal"
                                                                                                data-target="#coa_edit_modal" style=""
                                                                                                data-level="3" data-id="{{ $acl3->id }}"
                                                                                                data-code="{{ $acl3->code }}"
                                                                                                data-name="{{ $acl3->name }}"><i
                                                                                                    class="fa fa-pencil"></i>
                                                                                                @lang('messages.edit')
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div> --}}

                                                                            </span>
                                                                        </div>
                                                                        <ul>
                                                                            @if ($acl3->level4->count())
                                                                                @foreach ($acl3->level4 as $acl4)
                                                                                    <li>
                                                                                        <div class="border p-2">
                                                                                            <span>
                                                                                                <a href=""
                                                                                                    style="text-decoration: none">
                                                                                                    {{ $acl4->code }} -
                                                                                                    {{ ucwords($acl4->name) }} </a>
                                                                                                <b style="float: right"> (
                                                                                                    {{ $acl4->balance }} ) </b>

                                                                                                {{-- <div style="float: right" class="btn-group">
                                                                                                    <button
                                                                                                        style="margin-top: -5px; margin-right: 10px"
                                                                                                        data-toggle="dropdown"
                                                                                                        class="btn btn-sm dropdown-toggle"
                                                                                                        type="button"><i class="fa fa-chevron-down"></i></button>
                                                                                                    <ul role="menu" class="dropdown-menu">
                                                                                                        @if ($acl4->transactions->count() == 0)
                                                                                                            <li
                                                                                                                style="border: none !important">
                                                                                                                <a href="#"
                                                                                                                    style="padding: 0px"
                                                                                                                    class="coa_level_delete text-danger"
                                                                                                                    data-toggle="modal"
                                                                                                                    data-target="#coa_delete_modal"
                                                                                                                    style=""
                                                                                                                    data-level="4"
                                                                                                                    data-id="{{ $acl4->id }}"
                                                                                                                    data-code="{{ $acl4->code }}"
                                                                                                                    data-name="{{ $acl4->name }}"><i
                                                                                                                        class="fa fa-trash"></i>
                                                                                                                    @lang('messages.delete')
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                        <li style="border: none !important">
                                                                                                            <a href="#"
                                                                                                                style="padding: 0px"
                                                                                                                class="coa_level_edit"
                                                                                                                style=""
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#coa_edit_modal"
                                                                                                                data-opening_balance="{{ $acl4->opening_balance }}"
                                                                                                                data-level="4"
                                                                                                                data-id="{{ $acl4->id }}"
                                                                                                                data-code="{{ $acl4->code }}"
                                                                                                                data-name="{{ $acl4->name }}"><i
                                                                                                                    class="fa fa-pencil"></i>
                                                                                                                @lang('messages.edit')
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li style="border: none !important">
                                                                                                            <a href="#"
                                                                                                                data-target="#coa_transactions_import"
                                                                                                                style="padding: 0px"
                                                                                                                class="coa_transactions_import"
                                                                                                                style=""
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#coa_transactions_import"
                                                                                                                data-id="{{ $acl4->id }}"><i
                                                                                                                    class="fa fa-upload"></i>
                                                                                                                @lang('messages.import')
                                                                                                            </a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div> --}}
                                                                                            </span>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            @else
                                                                                No Record Found
                                                                            @endif
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                No Record Found
                                                            @endif
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            @else
                                                No Record Found
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>


                        </td>
                    </tr>
                @else
                    <p class="text-danger">No records found</p>
                    @endif
            </div>
        </div>
    </div>

    @include('custom.coa_jquery')

    @include('modals.create_account_modal')

@endsection
