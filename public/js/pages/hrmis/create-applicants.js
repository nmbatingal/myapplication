$(document).ready(function() {
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
    function initDatePicker() {
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
    }
    initDatePicker();

    /**
     * END
     * Embedded Javascript
     */

    /**
     * Creating additional info to new applicant
     */

    /**
     * VUE Apps
     */
    var location = new Vue({
        el: '#address-fieldset',
        data: {
            selected: {
                region: '',
                province: '',
                municipality: '',
                barangay: ''
            },
            regions: '',
            provinces: '',
            municipalities: '',
            barangays: '',
        },
        methods: {
            getRegions: function() {
                var self = this;
                $.ajax({
                    url: '/api/address/regions',
                    method: 'GET',
                    success: function(data, textStatus, jqXHR) {
                        self.regions = data.regions;
                    }
                });
            },
            getProvinces: function() {
                var self = this;

                self.selected.province = '';
                self.selected.municipality = '';
                self.selected.barangay = '';
                
                self.provinces = '';
                self.municipalities = '';
                self.barangays = '';

                $.ajax({
                    url: '/api/address/provinces',
                    method: 'GET',
                    data: {
                        region_code: self.selected.region.code,
                    },
                    success: function(data, textStatus, jqXHR) {
                        self.provinces = data.provinces;
                    }
                });
            },
            getMunicipalities: function() {
                var self = this;

                self.selected.municipality = '';
                self.selected.barangay = '';
                self.municipalities = '';
                self.barangays = '';

                $.ajax({
                    url: '/api/address/municipalities',
                    method: 'GET',
                    data: {
                        province_code: self.selected.province.code,
                    },
                    success: function(data, textStatus, jqXHR) {
                        self.municipalities = data.municipalities;
                    }
                });
            },
            getBarangays: function() {
                var self = this;

                self.selected.barangay = '';
                self.barangays = '';

                $.ajax({
                    url: '/api/address/barangays',
                    method: 'GET',
                    data: {
                        municipality_code: self.selected.municipality.code,
                    },
                    success: function(data, textStatus, jqXHR) {
                        console.log([data, textStatus, jqXHR]);
                        self.barangays = data.barangays;
                    }
                });
            },
        }
    });
    location.getRegions();

    // PROGRAMS
    var buttonAddProgram = document.getElementById("button-add-program");
    buttonAddProgram.addEventListener("click", function() {cloneFieldset("template-programs-info", "programs-info")});
    for(var i=0; i<1; i++) {
        cloneFieldset("template-programs-info", "programs-info");
    }

    // TRAININGS
    var buttonAddTraining = document.getElementById("button-add-training");
    buttonAddTraining.addEventListener("click", function() {cloneFieldset("template-trainings-info", "trainings-info")});
    cloneFieldset("template-trainings-info", "trainings-info");

    // WORK EXPERIENCE
    var buttonAddWorkExperience = document.getElementById("button-add-work");
    buttonAddWorkExperience.addEventListener("click", function() {cloneFieldset("template-work-info", "work-info")});
    cloneFieldset("template-work-info", "work-info");

    // ELIGIBILITY
    var buttonAddEligibility = document.getElementById("button-add-eligibility");
    buttonAddEligibility.addEventListener("click", function() {cloneFieldset("template-eligibilities-info", "eligibilities-info")});
    cloneFieldset("template-eligibilities-info", "eligibilities-info");

    /**
     * ============================================================
     * FUNCTIONS
     * ============================================================
     */
    function cloneFieldset(templateClass, fieldSetId) {
        var templateClone = document.getElementsByClassName(templateClass)[0].content.cloneNode(true);
        document.getElementById(fieldSetId).prepend(templateClone);
        $.AdminBSB.input.activate(); // reinitialize focus event feature on generated shadow DOMs.
        initDatePicker();
    }

    /**
     * ============================================================
     */
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}