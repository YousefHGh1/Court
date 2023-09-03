"use strict";

var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					id_daily: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
							,
							regexp: {
								regexp: /^\d{9}$/,
								message: 'يرجى إدخال 9 أرقام فقط'
							}
						}
					},
		
					daily_name: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
		
					daily_gender: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
					daily_status: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
					daily_address: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
					daily_mobile: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
					daily_birthdate: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
							}
						}
					},
					daily_degree: {
						validators: {
							notEmpty: {
								message: 'الحقل مطلوب'
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

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					daily_fare: {
						validators: {
							notEmpty: {
								message: 'daily_fare details is required'
							}
						}
					},
					monthly_fare: {
						validators: {
							notEmpty: {
								message: 'monthly_fare details is required'
							}
						}
					},
					work_start_date: {
						validators: {
							notEmpty: {
								message: 'work_start_date details is required'
							}
						}
					},
					work_end_date: {
						validators: {
							notEmpty: {
								message: 'work_end_date details is required'
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
					kara: {
						validators: {
							notEmpty: {
								message: 'kara details is required'
							}
						}
					},
					file: {
						validators: {
							notEmpty: {
								message: 'file details is required'
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


		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			// {
			// 	fields: {
			// 		wife_name: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'wife_name details is required'
			// 				}
			// 			}
			// 		},
			// 		id_wife: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'id_wife details is required'
			// 				}
			// 			}
			// 		},
			// 		wife_birth: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'wife_birth details is required'
			// 				}
			// 			}
			// 		},
			// 		date_marriage: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'date_marriage details is required'
			// 				}
			// 			}
			// 		},
			// 		wife_file: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'wife_file details is required'
			// 				}
			// 			}
			// 		},
			// 		wife_job: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'wife_job details is required'
			// 				}
			// 			}
			// 		},
			// 		id_son: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'id_son details is required'
			// 				}
			// 			}
			// 		},
			// 		son_name: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_name details is required'
			// 				}
			// 			}
			// 		},
			// 		son_num: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_num details is required'
			// 				}
			// 			}
			// 		},
			// 		son_satuts: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_satuts details is required'
			// 				}
			// 			}
			// 		},
			// 		son_file: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_file details is required'
			// 				}
			// 			}
			// 		},
			// 		son_birth: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_birth details is required'
			// 				}
			// 			}
			// 		},
			// 		son_job: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_job details is required'
			// 				}
			// 			}
			// 		},
			// 		son_gender: {
			// 			validators: {
			// 				notEmpty: {
			// 					message: 'son_gender details is required'
			// 				}
			// 			}
			// 		}
			// 	},
			// 	plugins: {
			// 		trigger: new FormValidation.plugins.Trigger(),
			// 		// Bootstrap Framework Integration
			// 		bootstrap: new FormValidation.plugins.Bootstrap({
			// 			//eleInvalidClass: '',
			// 			eleValidClass: '',
			// 		})
			// 	}
			// }
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
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
					majors: {
						validators: {
							notEmpty: {
								message: 'majors details is required'
							}
						}
					},
					address_org: {
						validators: {
							notEmpty: {
								message: 'address_org details is required'
							}
						}
					},
					graduation: {
						validators: {
							notEmpty: {
								message: 'graduation details is required'
							}
						}
					},
					rate: {
						validators: {
							notEmpty: {
								message: 'rate details is required'
							}
						}
					},
					edu_file: {
						validators: {
							notEmpty: {
								message: 'edu_file details is required'
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

		// Step 5
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					dependent_name: {
						validators: {
							notEmpty: {
								message: 'dependent_name details is required'
							}
						}
					},
					id_dependent: {
						validators: {
							notEmpty: {
								message: 'id_dependent details is required'
							}
						}
					},
					dependent_birth: {
						validators: {
							notEmpty: {
								message: 'dependent_birth details is required'
							}
						}
					},
					dependent_num: {
						validators: {
							notEmpty: {
								message: 'dependent_num details is required'
							}
						}
					},
					dependent_gender: {
						validators: {
							notEmpty: {
								message: 'dependent_gender details is required'
							}
						}
					},
					dependent_file: {
						validators: {
							notEmpty: {
								message: 'dependent_file details is required'
							}
						}
					},
					relative_relation: {
						validators: {
							notEmpty: {
								message: 'relative_relation details is required'
							}
						}
					},
					dependent_address: {
						validators: {
							notEmpty: {
								message: 'dependent_address details is required'
							}
						}
					},
					notes: {
						validators: {
							notEmpty: {
								message: 'notes details is required'
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

	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
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
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
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
			}).then(function (result) {
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
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initValidation();
			_initWizard();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});