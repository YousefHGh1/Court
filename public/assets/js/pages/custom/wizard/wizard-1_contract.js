"use strict";

var KTWizard1 = function() {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initValidation = function() {

        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    id_contract  : {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            },
                            regexp: {
                                regexp: /^\d{9}$/,
                                message: 'يرجى إدخال 9 أرقام فقط'
                            }
                        }
                    },
                    contract_num: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_name: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_email: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            },
                            emailAddress: {
                                message: 'يرجى إدخال عنوان بريد إلكتروني صحيح'
                            }
                        }
                    },
                    contract_gender: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_status: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_address: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_mobile: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_birthdate: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    },
                    contract_degree: {
                        validators: {
                            notEmpty: {
                                message: 'الحقل مطلوب'
                            }
                        }
                    }

                    // ,
                    // contract_son: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'الحقل مطلوب'
                    //         }
                    //     }
                    // },
                    // contract_wife: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'الحقل مطلوب'
                    //         }
                    //     }
                    // }
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

        // Step 2
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    contract_type: {
                        validators: {
                            notEmpty: {
                                message: 'contract_type details is required'
                            }
                        }
                    },
                    contract_value: {
                        validators: {
                            notEmpty: {
                                message: 'contract_value details is required'
                            }
                        }
                    },
                    contract_start_date: {
                        validators: {
                            notEmpty: {
                                message: 'contract_start_date details is required'
                            }
                        }
                    },
                    contract_end_date: {
                        validators: {
                            notEmpty: {
                                message: 'contract_end_date details is required'
                            }
                        }
                    },
                    operator: {
                        validators: {
                            notEmpty: {
                                message: 'operator details is required'
                            }
                        }
                    },
                    workplace: {
                        validators: {
                            notEmpty: {
                                message: 'workplace details is required'
                            }
                        }
                    },



                    circle: {
                        validators: {
                            notEmpty: {
                                message: 'circle details is required'
                            }
                        }
                    },
                    section: {
                        validators: {
                            notEmpty: {
                                message: 'section details is required'
                            }
                        }
                    },
                    division: {
                        validators: {
                            notEmpty: {
                                message: 'division details is required'
                            }
                        }
                    },
                    named: {
                        validators: {
                            notEmpty: {
                                message: 'named details is required'
                            }
                        }
                    },
                    file: {
                        validators: {
                            notEmpty: {
                                message: 'file details is required'
                            }
                        }
                    },

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