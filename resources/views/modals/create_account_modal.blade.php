<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Create Account Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="alerts"></div>
            <div class="modal-body">
                <form id="create_account_form">
                    {{-- <a id="createAccountLink" hidden href="{{ route('account.create') }}"></a> --}}
                    @csrf
                    <div class="mb-4 col-md-6">
                        <label class="col-form-label">Select Account Level</label>
                        <div class="col-sm-12">
                            <select name="customer" id="account_level" class="form-select">
                                <option selected hidden disabled>Select Account</option>
                                <option value="level_1">Level 1 </option>
                                <option value="level_2">Level 2</option>
                                <option value="level_3">Level 3</option>
                                <option value="level_4">Level 4</option>
                            </select>
                        </div>
                    </div>
                     <!-- Level 1 Fields -->
                     <div class="form-group level_1" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" placeholder="Enter Name..." id="name_level_1" name="name_level_1"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group level_1 mt-2" style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Start Code <b class="text-danger">*</b></label>
                                <input type="number" class="form-control" placeholder="Enter Start Code..." id="start_code" name="start_code"/>
                            </div>
                            <div class="col-md-6">
                                <label>End Code <b class="text-danger">*</b></label>
                                <input type="number" class="form-control" placeholder="Enter End Code..." id="end_code" name="end_code" />
                            </div>
                        </div>
                    </div>
                    <!-- Level 1 Fields End -->
                    {{-- Level 2 Fields Start  --}}
                    <div class="form-group level_2" style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Account Level 1</label>
                                <select class="form-select select2 account_selection" id="account_level_1" name="account_level_1">
                                    <option value="" selected disabled>Select Option</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Code <b class="text-danger">*</b></label>
                                <input type="text" id="ac_code" class="form-control" name="ac_code" readonly=""/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group level_2" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name..." name="name_level_2" id="name_level_2"/>
                            </div>
                        </div>
                    </div>
                    <!-- Level 2 Fields End -->
                        <!-- Level 3 Fields -->
                        <div class="form-group level_3" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Account Level 2</label>
                                    <select class="form-select select2 account_selection" id="account_level_2" name="account_level_2">
                                        <option value="" selected disabled>Select Option</option>
                                        {{-- @foreach($level_2 as $l2)
                                        <option value="{{ $l2->id }}">{{ ucwords($l2->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Code <b class="text-danger">*</b></label>
                                    <input type="text" id="ac_code3" class="form-control" name="ac_code2" readonly=""/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group level_3" style="display: none">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Name <b class="text-danger">*</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Name..." name="name_level_3" id="name_level_3"/>
                                </div>
                            </div>
                        </div>
                        <!-- Level 3 Fields End -->
                         <!-- Level 4 Fields -->
                    <div class="form-group level_4" style="display: none">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Account Level 3</label>
                                <select class="form-select select2 account_selection" id="account_level_3" name="account_level_3">
                                    <option value="" selected disabled>Select Option</option>
                                    {{-- @foreach($level_3 as $l3)
                                    <option value="{{ $l3->id }}">{{ ucwords($l3->name) }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Code <b class="text-danger">*</b></label>
                                <input type="text" id="ac_code4" class="form-control" name="ac_code3" readonly="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group level_4" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" placeholder="Enter Name..." id="name_level_4" name="name_level_4" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="opening_balance">Opening Balance</label>
                                <input type="number" class="form-control" name="opening_balance" id="opening_balance" placeholder="Enter Opening Balance...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="transaction_type">Transaction Type</label>
                                <select class="form-select" name="transaction_type" id="transaction_type">
                                    <option value="">Select Type</option>
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- Level 4 Fields End -->
                    <hr>
                    <div class="col-sm-9">
                        <div>
                            <input type="submit" class="btn btn-primary w-md" value="Submit">
                        </div>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
