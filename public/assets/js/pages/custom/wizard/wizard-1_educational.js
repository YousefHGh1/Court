"use strict";

var KTWizard1 = function() {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initValidation = function() {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    educational_org: {
                        validators: {
                            notEmpty: {
                                message: 'educational_org details is required'
                            }
                        }
                    },
                    degree: {
                        validators: {
                            notEmpty: {
                                message: 'degree details is required'
                            }
                        }
                    },
                    // majors: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'majors details is required'
                    //         }
                    //     }
                    // },
                    // address_org: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'address_org details is required'
                    //         }
                    //     }
                    // },
                    // graduation: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'graduation details is required'
                    //         }
                    //     }
                    // },
                    // rate: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'rate details is required'
                    //         }
                    //     }
                    // },
                    // rate_num: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'rate_num details is required'
                    //         }
                    //     }
                    // },

                    edu_file: {
                        validators: {
                            notEmpty: {
                                message: 'edu_file details is required'
                            }
                        }
                    },
                    training_file: {
                        validators: {
                            notEmpty: {
                                message: 'training_file details is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

    }

    var _initWizard = function() {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function(wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function(status) {
                    if (status == 'Valid') {
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false; // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on('changed', function(wizard) {
            KTUtil.scrollTop();
        });

        // Submit event
        _wizardObj.on('submit', function(wizard) {
            Swal.fire({
                text: "كل شيئ بخير! يرجى تأكيد تقديم النموذج.",
                icon: "success",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, submit!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function(result) {
                if (result.value) {
                    _formEl.submit(); // Submit form
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been submitted!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    return {
        // public functions
        init: function() {
            _wizardEl = KTUtil.getById('kt_wizard');
            _formEl = KTUtil.getById('kt_form');

            _initValidation();
            _initWizard();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard1.init();
});