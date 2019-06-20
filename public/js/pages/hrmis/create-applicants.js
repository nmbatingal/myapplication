$(document).ready(function() {
    /** ====================================================================== */
    var formApp = new Vue({
        el: '#form_new_applicant',
        data: {
            applicantProgramsCount: 1,
        },
        methods: {
            addProgramsCount: function() {
                alert("Hello World!");
                this.applicantProgramsCount += 1;
            }
        }
    });
    formApp.addProgramsCount();
    /** ====================================================================== */

    //Advanced form with validation
    var form = $('#form_new_applicant').show();

    form.steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        onInit: function (event, currentIndex) {
            $.AdminBSB.input.activate();

            //Set tab width
            var $tab = $(event.currentTarget).find('ul[role="tablist"] li[aria-selected=true] a');
            //$tab.addClass('bg-blue');
            //var tabCount = $tab.length;
            //$tab.css('width', (100 / tabCount) + '%');

            //set button waves effect
            setButtonWavesEffect(event);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }
            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            //var $tab = $(event.currentTarget).find('ul[role="tablist"] li[aria-selected=true] a');
            //$tab.addClass('bg-blue');

            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            form.submit();
        }
    }).validate({
        rules: {
            firstname   : "required",
            lastname    : "required",
            sex         : "required",
            // program     : "required",
            // school      : "required",
            remarks     : "required",
            /*"attachment[]" : {
                required  : true
            }*/
        },
        /*messages : {
            "attachment[]" : {
               required : "Please upload atleast 1 document",
               //extension: "Only document file is allowed!"
            }
        },*/
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
    });

    //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.masked-input');

    $demoMaskedInput.find('.mobile-phone-number').inputmask('+63 999 999 9999', { placeholder: '+__ ___ ___ ____' });

    /*$('#submitlist').click( function () {
        var table = $('#table-applicant').DataTable();
        var ids   = table.rows('.selected').data();
        $('#table-lineup > tbody').find('tr').remove();

        if (ids.length > 0) {

            ids.each( function(i) {
                var markup = '<tr>' +
                                '<td>'+ i[1] +'</td>' +
                                '<td>'+ i[2] +'</td>' +
                                '<td>'+ i[5] +'</td>' +
                                '<td class="text-center">' +
                                    '<a href="" class="btn btn-remove-app btn-danger btn-sm"><i class="fa fa-remove"></i></a>' +
                                '</td>' +
                            '</tr>';
                $("#table-lineup tbody").append(markup);
            });

            $('#largeModal').modal('show');
        } else {
            swal({
                title   : 'Warning',
                text    : 'Please select atleast one applicant!',
                type    :  'warning',
                allowOutsideClick: false,
            });
        }

        //console.log(ids);
    } );*/


    /**
     * START
     * Embedded Javascript
     */

    /* DATE PICKER*/
    $('.datepicker').bootstrapMaterialDatePicker({
        clearButton: true,
        weekStart: 0,
        time: false
    });

    /* DATE TRAINING */
    $('#date-end-training').bootstrapMaterialDatePicker({ 
        clearButton: true,
        weekStart: 0,
        time: false
    });

    $('#date-start-training').bootstrapMaterialDatePicker({
        clearButton: true,
        weekStart: 0,
        time: false 
    }).on('change', function(e, date) {
        $('#date-end-training').bootstrapMaterialDatePicker('setMinDate', date);
    });

    /* DATE WORK */
    $('#date-end-work').bootstrapMaterialDatePicker({ 
        clearButton: true,
        weekStart: 0,
        time: false
    });
    $('#date-start-work').bootstrapMaterialDatePicker({
        clearButton: true,
        weekStart: 0,
        time: false 
    }).on('change', function(e, date) {
        $('#date-end-work').bootstrapMaterialDatePicker('setMinDate', date);
    });

    $('.dtp-buttons').each(function(){
        $(this).find('button').addClass('col-black');
    });
    /**
     * END
     * Embedded Javascript
     */
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}