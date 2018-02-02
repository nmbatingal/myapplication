$(function () {
    
    var $form = $('#form-user');

    /* toggle switch button */
    $('input.u_active').on('change', function() {
        var id    = $('input[name=u_id]').val();

        $.ajax({
            type: $form.attr('method'),
            url : $form.attr('action') + '/status',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : id,
                'value'  : $('input.u_active:checked').val()
            },
            success: function(data) {
                //
            }
        });
    });

    /* toggle switch button */
    $('input.u_admin').on('change', function() {
        
        var id    = $('input[name=u_id]').val();
        
        $.ajax({
            type: $form.attr('method'),
            url : $form.attr('action') + '/admin',
            data: {
                '_token' : $('input[name=_token]').val(),
                'id'     : id,
                'value'  : $('input.u_admin:checked').val()
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
            type: $form.attr('method'),
            url : $form.attr('action') + '/reset',
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
            $('select[name=u_unit]').val(data['div_unit']);
            $('input.u_position').val(data['position']);

            $('input.u_active').prop('checked', !!data['__isActive']);
            $('input.u_admin').prop('checked', !!data['__isAdmin']);

            $('select[name=u_unit]').selectpicker('refresh');
            
            /*$('#form-user').attr('action', function(i, value) {
                return value + "/" + data['id'];
            });*/

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
            // form.submit();
            //submit via ajax
            var id    = $('input[name=u_id]').val();

            $.ajax({
                type: "GET",
                url: $(form).attr('action') + '/' + id,
                data: $(form).serialize(),
                success: function(data) {

                    if ((data.errors)) {
                        alert("ERROR!");
                    } else {
                        console.log(data);
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
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });

    //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.masked-input');

    $demoMaskedInput.find('.mobile-phone-number').inputmask('+63 999 999 9999', { placeholder: '+__ ___ ___ ____' });
});