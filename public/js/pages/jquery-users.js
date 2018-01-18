$(function () {
    
    /* toggle switch button */
    $("input[name=u_active]").bootstrapSwitch({
        size    : "sm",
        onText  : "Yes",
        onColor : "success",
        offText : "No",
        offColor: "danger"
    });
    $("input[name=u_active]").on('switchChange.bootstrapSwitch', function (event, state) {
        var id    = $('input[name=u_id]').val();
        $.ajax({
            type: 'POST',
            url: '/accounts/users/status',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : id,
                'value'  : $('input[name=u_active]:checked').val()
            },
            success: function(data) {
                //
            }
        });
    });

    /* toggle switch button */
    $("input[name='u_admin']").bootstrapSwitch({
        size    : "sm",
        onText  : "Yes",
        onColor : "success",
        offText : "No",
        offColor: "danger"
    });
    $("input[name=u_admin]").on('switchChange.bootstrapSwitch', function (event, state) {
        var id    = $('input[name=u_id]').val();
        $.ajax({
            type: 'POST',
            url: '/accounts/users/admin',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : id,
                'value'  : $('input[name=u_admin]:checked').val()
            },
            success: function(data) {
                //
            }
        });
    });

    /* reset user password */
    $('a#resetPassword').on('click', function() {
        var id    = $('input[name=u_id]').val();
        $.ajax({
            type: 'POST',
            url: '/accounts/users/reset',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : id
            },
            success: function(data) {
                location.reload();
            }
        });
    });

    /* on user click */
	$('.list-user').on('click', function(e) {
        e.preventDefault();

        $.get( $(this).attr('href') , function( data ) {
            $('.u_username').text(data['username']);
            $('input[name=u_id]').val(data['id']);
            $('input.u_fname').val(data['firstname']);
            $('input.u_mname').val(data['middlename']);
            $('input.u_lname').val(data['lastname']);
            $('input.u_email').val(data['email']);
            $('input.u_contact').val(data['mobile_number']);
            $('select[name=u_unit]').val(data['division_unit']);
            $('input.u_position').val(data['position']);

            $('input[name="u_active"]').bootstrapSwitch('state', data['status']);
            $('input[name="u_admin"]').bootstrapSwitch('state', data['__is']);

            $('#form_button').removeClass('hidden');
        });
    });
    
    /* on form update validate */
	$('#form-user').validate({
        rules: {
            u_fname    : "required",
            u_lname    : "required",
            u_email    : {
                required   : true,
                email      : true
            },
            u_contact  : {
                required   : true,
            },
            u_unit     : "required",
            u_position : "required"
        },
        messages: {
            firstname   : "Please enter your firstname",
            lastname    : "Please enter your lastname",
            email       : "Please enter a valid email address",
        },
        submitHandler: function(form) { 
            //submit via ajax
            var id    = $('input[name=u_id]').val();

            $.ajax({
                url: $(form).attr('action') + '/' + id,
                data: $(form).serialize(),
                success: function(data) {

                    if ((data.errors)) {
                        alert("ERROR!");
                    } else {
                        location.reload();
                    }
                }
            });

            //console.log($('[name=u_img]').val());

            return false;
        },
        onfocusout: function(element) {
            this.element(element);  
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        highlight: function (element) {
            $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
            $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
        },
        unhighlight: function (element) {
            $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
            $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            error.addClass( "help-block" );

            $(element).parents('.col-sm-9').append(error);
        }
    });

    /* on form reset */
    $('button.reset').on('click', function() {
        $('.u_username').text('');
        $('#form_button').addClass('hidden');
    });
});