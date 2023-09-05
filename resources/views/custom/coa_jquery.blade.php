<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- Account level change  --}}

<script>
    $(document).on('change', '#account_level', function() {
        let optionSelected = $(this).find("option:selected");
        let level = optionSelected.val();

        if (level == 'level_1') {
            $('.level_1').fadeIn('slow');
            $('.level_2').fadeOut('fast');
            $('.level_3').fadeOut('fast');
            $('.level_4').fadeOut('fast');
        } else if (level == 'level_2') {
            $.ajax({
                type: "get",
                url: "{{ route('account.get_level_1') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#account_level_1').empty();
                        $('#account_level_1').append(
                            '<option value="" selected disabled>Select Option</option'
                        );
                        for (var i = 0; i < response.level_1.length; i++) {
                            $('#account_level_1').append('<option value="' + response
                                .level_1[i]
                                .id + '">' + response.level_1[i].name + '</option>')
                        }
                    }
                }
            });
            $('.level_1').fadeOut('fast');
            $('.level_2').fadeIn('slow');
            $('.level_3').fadeOut('fast');
            $('.level_4').fadeOut('fast');
        } else if (level == 'level_3') {
            $.ajax({
                type: "get",
                url: "{{ route('account.get_level_2') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#account_level_2').empty();
                        $('#account_level_2').append(
                            '<option value="" selected disabled>Select Option</option');
                        response.level1.forEach(level1 => {
                            if (Object.keys(level1.level2).length > 0) {
                                $('#account_level_2').append(
                                    `<option value="" disabled  style="font-weight:bolder">${level1.name}</option>`
                                );
                                level1.level2.forEach(level2 => {
                                    $('#account_level_2').append(
                                        `<option value="${level2.id}">&nbsp;&nbsp;&nbsp;&nbsp; ${level2.name}</option>`
                                    );
                                });
                            }
                        });
                    }
                }
            });
            $('.level_1').fadeOut('fast');
            $('.level_2').fadeOut('fast');
            $('.level_3').fadeIn('slow');
            $('.level_4').fadeOut('fast');
        } else if (level == 'level_4') {
            $.ajax({
                type: "get",
                url: "{{ route('account.get_level_3') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#account_level_3').empty();
                        $('#account_level_3').append(
                            '<option value="" selected disabled>Select Option</option');
                        response.level1.forEach(level1 => {
                            if (Object.keys(level1.level2).length > 0) {
                                $('#account_level_3').append(
                                    `<option value="" disabled  style="font-weight:bolder">${level1.name}</option>`
                                );
                                level1.level2.forEach(level2 => {
                                    $('#account_level_3').append(
                                        `<option disabled value="" style="font-weight:bolder" >&nbsp;&nbsp;&nbsp;&nbsp; ${level2.name}</option>`
                                    );
                                    if (Object.keys(level2.level3).length > 0) {
                                        level2.level3.forEach(level3 => {
                                            $('#account_level_3').append(
                                                `<option value="${level3.id}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ${level3.name}</option>`
                                            );
                                        })
                                    }

                                });
                            }
                        });
                    }
                }
            });
            $('.level_1').fadeOut('fast');
            $('.level_2').fadeOut('fast');
            $('.level_3').fadeOut('fast');
            $('.level_4').fadeIn('slow');
        }
    });


    // get new code
    $(document).on('change', '.account_selection', function() {
        var optionSelected = $(this).find("option:selected");
        var account = optionSelected.val();
        var level = $('#account_level').val();

        $.ajax({
            type: "post",
            url: "{{ route('account.new_code') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                account: account,
                level: level
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    let element =
                        `<div class="alert alert-success m-3" role="alert"> Well done! Account Code Generated</div>`;
                    $('#alerts').append(element);
                    setTimeout(function() {
                        $('.alert').remove();
                    }, 2000)

                    if (level == 'level_2') {
                        $('#ac_code').val(response.code);
                    } else if (level == 'level_3') {
                        $('#ac_code3').val(response.code);
                    } else if (level == 'level_4') {
                        $('#ac_code4').val(response.code);
                    }

                } else {
                    let element =
                        `<div class="alert alert-success m-3" role="alert">${response.message}</div>`;
                    $('#alerts').append(element);
                    setTimeout(function() {
                        $('.alert').remove();
                    }, 2000)
                }
            }
        })
    });

    // create account function

    $(document).ready(function() {

        $(document).on('submit', '#create_account_form', function() {
            event.preventDefault();
            let optionSelected = $('#account_level').find("option:selected");
            let level = optionSelected.val();

            if (level == 'level_1') {
                $.ajax({
                    type: "POST",
                    url: "{{ route('account.create') }}",
                    data: {
                        "level": level,
                        "account_name": $('#name_level_1').val(),
                        "start_code": $('#start_code').val(),
                        "end_code": $('#end_code').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            let element =
                                `<div class="alert alert-success m-3" role="alert">${response.success}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                                location.reload();
                            }, 5000)
                        } else if (response.error) {
                            let element =
                                `<div class="alert alert-danger m-3" role="alert">${response.error}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                            }, 5000)
                        }
                    }
                });
            } else if (level == 'level_2') {
                let optionSelected = $('#account_level_1').find("option:selected");
                let level_1 = optionSelected.val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('account.create') }}",
                    data: {
                        "level": level,
                        "account_level_1": level_1,
                        "code": $('#ac_code').val(),
                        "name_level_2": $('#name_level_2').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            let element =
                                `<div class="alert alert-success m-3" role="alert">${response.success}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                                location.reload();
                            }, 2000)
                        } else if (response.error) {
                            let element =
                                `<div class="alert alert-danger m-3" role="alert">${response.error}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                            }, 2000)
                        }
                    }
                });
            } else if (level == 'level_3') {
                let optionSelected = $('#account_level_2').find("option:selected");
                let level_2 = optionSelected.val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('account.create') }}",
                    data: {
                        "level": level,
                        "account_level_2": level_2,
                        "code": $('#ac_code3').val(),
                        "name_level_3": $('#name_level_3').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            let element =
                                `<div class="alert alert-success m-3" role="alert">${response.success}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                            }, 2000)
                        } else if (response.error) {
                            let element =
                                `<div class="alert alert-danger m-3" role="alert">${response.error}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                                location.reload();
                            }, 2000)
                        }
                    }
                });

            } else {
                let optionSelected = $('#account_level_3').find("option:selected");
                let level_3 = optionSelected.val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('account.create') }}",
                    data: {
                        "level": level,
                        "account_level_3": level_3,
                        "code": $('#ac_code4').val(),
                        "name_level_4": $('#name_level_4').val(),
                        "opening_balance" : $('#opening_balance ').val(),
                        "transaction_type" : $('#transaction_type').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            let element =
                                `<div class="alert alert-success m-3" role="alert">${response.success}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                                location.reload();
                            }, 2000)
                        } else if (response.error) {
                            let element =
                                `<div class="alert alert-danger m-3" role="alert">${response.error}</div>`;
                            $('#alerts').append(element);
                            setTimeout(function() {
                                $('.alert').remove();
                            }, 2000)
                        }
                    }
                });

            }

        });
    });
</script>
