var consultant_country = null

var options2 = {
    selector: "#register_address",
    setup: function (editor) {
        editor.on('change', function () {
            document.getElementById('register_address').value = this.getBody().innerHTML
        })
    }
}
if (KTApp.isDarkMode()) {
    options2["skin"] = "oxide-dark";
    options2["content_css"] = "dark";
}
tinymce.init(options2);
var firmType = 1;
function firm_type(type) {
    firmType = type
    if (type == 2) {
        $("#firmselectdiv").hide(500)
        $('#firm_choose').removeAttr('required');
    } else {
        $("#firmselectdiv").show(500)
        $('#firm_choose').attr('required');
    }

}

function image_show(images) {
    var image = "";
    images.forEach((i) => {
        if(i.type == 'application/pdf'){
         image += `<div class="image_container d-flex justify-content-center position-relative">
                  <img src="${baseURl}/demo1/pdf.png"  alt="Image">
                  <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span><div></div>
              </div>`;  
        }else{
        image += `<div class="image_container d-flex justify-content-center position-relative">
                  <img src="` + i.url + `"  alt="Image">
                  <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span><div></div>
              </div>`;
        }
    })
    return image;
}

function delete_image(e) {
    const image = event.target.parentNode.parentNode.parentNode.childNodes[1].files
    const input = event.target.parentNode.parentNode.parentNode.childNodes[1]
    let images = []
    for (i = 0; i < image.length; i++) {
        images.push({
            "name": image[i].name,
            "url": URL.createObjectURL(image[i]),
            "file": image[i],
            "type":image[i].type
        })
    }
    images = images.filter((item, k) => k !== e)
    event.target.parentNode.parentNode.innerHTML = image_show(images);

    const dt = new DataTransfer()
    const {
        files
    } = input

    for (let i = 0; i < files.length; i++) {
        const file = files[i]
        if (e !== i)
            dt.items.add(file);
    }

    input.files = dt.files;
}

$(document).on("change", '.gallery', function (e) {
    const node = e.target
    var image = e.target.files;
    let images = []
    for (i = 0; i < image.length; i++) {
        images.push({
            "name": image[i].name,
            "url": URL.createObjectURL(image[i]),
            "file": image[i],
            "type":image[i].type
        })
    }
    node.parentNode.childNodes[2].innerHTML = image_show(images);
});

const categorie_id = document.getElementById('categorie_id')
const specialized = document.getElementById('specialized')

const com_con_amount = document.getElementById('com_con_amount')
const com_off_amount = document.getElementById('com_off_amount')
const com_pay_amount = document.getElementById('com_pay_amount')

const countrycode = document.querySelector('.countrycode')
const consultantcurrnect = document.querySelectorAll('.consultantcurrnect')
const proof_clone = document.getElementById('proof_clone')

function Insurance(type){
    if (type == 2) {
        $("#Insurancediv").hide(500)
        $('#insurance_id').val('');
        $('#Insurancediv').removeAttr('required');
    } else {
        $("#Insurancediv").show(500)
        $('#Insurancediv').attr('required');
    }
}


const poofTemplate = function (text) {

    let div = document.createElement('div')
    
    let div2 = document.createElement('div')
    let lable = document.createElement('label')
    let input = document.createElement('input')
    
    div.classList.add('fv-row', 'mb-10','col-md-6')
    div2.classList.add('card-body', 'd-flex', 'flex-wrap', 'justify-content-start')
    lable.classList.add('required', 'form-label', 'fs-6', 'mb-2')
    lable.innerText = text
    input.type = 'file'
    input.name = 'gallery[]'
    input.required = true
    input.accept = '.pdf,image/*'
    input.placeholder = 'Image'
    input.classList.add('form-control', 'form-control-solid', 'mb-3', 'mb-lg-0', 'gallery')
    input.multiple = true

    div.appendChild(lable)
    div.appendChild(input)
    div.appendChild(div2)
    return div
}

com_con_amount.addEventListener('keyup', function (event) {
    let com_con_type = document.querySelector('input[name="com_con_type"]:checked').value
    let AmountFlat = parseFloat(event.target.value)
    let AmountFlatcurrency = admin_country.currency.price * consultant_country.currency.price *AmountFlat
    updateAmount(event.target, com_con_type)
    let voice = document.querySelector('input[name=voice]')
    let direct = document.querySelector('input[name=direct]')
    let text = document.querySelector('input[name=text]')
    let video = document.querySelector('input[name=video]')

    let video_current = document.getElementById("video_current")
    let voice_current = document.getElementById("voice_current")
    let text_current = document.getElementById("text_current")
    let direact_current = document.getElementById("direact_current")

    let video_base = document.getElementById("video_base")
    let voice_base = document.getElementById("voice_base")
    let text_base = document.getElementById("text_base")
    let direact_base = document.getElementById("direact_base")

    if(video.checked) {
        let value = parseFloat(document.querySelector('input[name=video_amount]').value)
        let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

        video_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value : value+AmountFlat} )`
        video_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
    }
    if(voice.checked) {
        let value = parseFloat(document.querySelector('input[name=voice_amount]').value)
        let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

        voice_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
        voice_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
    }
    if(text.checked) {
        let value = parseFloat(document.querySelector('input[name=text_amount]').value)
        let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

        text_current.innerText =`${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
        text_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
    }
    if(direct.checked) {
        let value = parseFloat(document.querySelector('input[name=direct_amount]').value)
        let basepriceconvert = admin_country.currency.price * consultant_country.currency.price * value

        direact_current.innerText = `${value} ( ${ (com_con_type == 1)? ((value/100)*value) + value  : value+AmountFlat} )`
        direact_base.innerText = `${ Number(basepriceconvert).toFixed(2)} ( ${ (com_con_type == 1)? (((basepriceconvert/100)*basepriceconvert)+basepriceconvert).toFixed(2) : (basepriceconvert+AmountFlatcurrency).toFixed(2)} )`
    }

});
com_off_amount.addEventListener('keyup', function (event) {
    updateAmount(event.target, document.querySelector('input[name="com_off_type"]:checked').value)
});
com_pay_amount.addEventListener('keyup', function (event) {
    updateAmount(event.target, document.querySelector('input[name="com_pay_type"]:checked').value)
});
document.querySelectorAll('input[name="com_con_type"]').forEach(e => e.addEventListener('change', function (event) {
    updateAmount(com_con_amount, event.target.value)
}))
document.querySelectorAll('input[name="com_off_type"]').forEach(e => e.addEventListener('change', function (event) {
    updateAmount(com_off_amount, event.target.value)
}))
document.querySelectorAll('input[name="com_pay_type"]').forEach(e => e.addEventListener('change', function (event) {
    updateAmount(com_pay_amount, event.target.value)
}))

function courencyconveter() {
    event.target.parentElement.lastElementChild.innerText = `Base Amount ${(admin_country.currency.price * consultant_country.currency.price * Number(event.target.value)).toFixed(2)}  ${admin_country.currency.currencycode}`
}

function enabledisable(input){
    if(event.target.checked){
        input.disabled = false
    }else{
        input.disabled = true
        input.value = 0
    }
}

function CourencyFlatconveter(type) {
    const parentNode = event.target.parentNode.parentNode
    const inputvalue = parentNode.children[4].children[1]
    if (type == 0) {
        parentNode.children[4].children[2].innerText = `Base Amount ${(admin_country.currency.price * consultant_country.currency.price * Number(inputvalue.value)).toFixed(2)}  ${admin_country.currency.currencycode}`
    } else {
        parentNode.children[4].children[2].innerText = `%`
    }
}

const sub_category_id = $('#sub_category_id');
const specialization_id = $('#specialization_id');

$("#category_id").on('select2:select', function (e) {
    var data = e.params.data;
    $.ajax({
        url: getSubCategory,
        method: "POST",
        data: {
            id: data.id,
            "_token": csrf,
        },
        success: function (data) {
            var option = null
            if (data.subCategory.length != null) {
                data.subCategory.forEach((e) => {
                    option += '<option value=' + e.id + '>' + e.name + '</option>';
                })
            }
            sub_category_id.html(option).trigger("change");
            option = null
            if (data.spec[0].length != null) {
                data.spec[0].forEach((e) => {
                    option += '<option value=' + e.id + '>' + e.title + '</option>';
                })
            }
            specialization_id.html(option).trigger("change");
        }
    })
});

function updateAmount(event, type) {
    if (type == 1) {
        event.value > 100 ? (event.value = 100) : event.value = event.value
    }
}

const yesterday = new Date();
var BasicDetails = null
yesterday.setDate(yesterday.getDate() - 1);

function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
}

function formatDate(date) {
    return [
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
        date.getFullYear(),
    ].join('/');
}

function OtpVerify(event) {
    const input = event.target
    if (input.value.length < 4) return

    input.setAttribute("disabled", true)
    GenerateOtp.textContent = 'Vefiy OTP'
    const data = {
        _token: csrf,
        otp: input.value
    };

    fetch('', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (!data.otp_status) GenerateOtp.textContent = 'Try Again'
            if (data.otp_status) {
                document.getElementById('continue').click()
                document.getElementById('continue').removeAttribute('hidden')
            }
        })
}
$(document).ready(function () {
    document.getElementsByClassName('container-xxl')[0].className = 'container-fluid'
    const continueBtn = document.getElementById('continue')
    const GenerateOtp = document.getElementById('GenerateOtp')
    const other = document.getElementById('other')
    var state = $("#state_id")
    var city = $("#city_id")


    GenerateOtp.addEventListener("click", GenerateOtpFun);

    function GenerateOtpFun(event) {
        const phone_no = document.getElementById('phone_no').value
        const data = {
            _token: csrf,
            phone_no: phone_no
        };
        event.target.innerHTML = 'Senting OTP...'

        fetch('', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('otp').disabled = false
                document.getElementById('otp').value = ''
                event.target.innerHTML = 'OTP Sented'
                document.getElementById('otp_div').removeAttribute('hidden')
            })
    }

    $("#dob").val(formatDate(yesterday))
    $("#dob").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 10),
        maxDate: formatDate(yesterday),
    }, function (start, end, label) {

    })

    $("#country_id").on('select2:select', function (e) {
        var data = e.params.data;
        let has_state =  e.params.data.element.dataset.has_state
            if(has_state != "0"){
                stateDiv.show(500)
                state.attr('required',true);
            }else{
                stateDiv.hide(500)
                state.removeAttr('required');
            }
        $.ajax({
            url: getState,
            method: "POST",
            data: {
                id: data.id,
                "_token": csrf,
            },
            success: function (data) {
                var option = `<option value=''>Select State</option>`
                var option1 = `<option selected> select City</option>`
                if (data.states.length != null) {
                    data.states.forEach((e) => {
                        option += '<option value=' + e.id + '>' + e.state_name + '</option>';
                    })
                }
                if(data.city.length != null){
                    data.city.forEach((e)=>{
                        option1 += '<option value='+e.id+'>'+e.city_name+'</option>';
                    })
                }
                state.html(option).trigger("change");
                city.html(option1).trigger("change");
                BasicDetails = data
            }
        })
    })
    $("#state_id").on('select2:select', function (e) {
        var data = e.params.data;
        $.ajax({
            url: getCity,
            method: "POST",
            data: {
                id: data.id,
                "_token": csrf,
            },
            success: function (data) {
                var option = `<option value=''>Select City</option>`
                if (data.length != null) {
                    data.forEach((e) => {
                        option += '<option value=' + e.id + '>' + e.city_name + '</option>';
                    })
                }
                city.html(option).trigger("change");
            }
        })
    })
    $("#firm_choose").on('select2:select', function (e) {
        var data = e.params.data;
        if (data.id == 'other') document.getElementById('other').removeAttribute('hidden')
        else document.getElementById('other').setAttribute('hidden', true)
    })
})

var KTCreateAccount = function () {
    var e, t, i, o, s, r, k, a = [],
        showSkip = [1, 2, 3, 4, 7, 8, 9, 10, 11],
        showpreview = [],
        funsave = [],
        funprev = [],
        triggervalue = [];
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e),
                t = document.querySelector("#kt_create_account_stepper"),
                i = t.querySelector("#kt_create_account_form"),
                o = t.querySelector('[data-kt-stepper-action="submit"]'),
                k = t.querySelector('[data-kt-stepper-action="skip"]'),
                s = t.querySelector('[data-kt-stepper-action="next"]'),
                pr = t.querySelector('[data-kt-stepper-action="previous"]'),
                (r = new KTStepper(t)).on("kt.stepper.changed", (function (e) {
                    13 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList.add("d-inline-block"), s.classList.add("d-none")) : 13 === r.getCurrentStepIndex() ? (o.classList.add("d-none"), s.classList.add("d-none")) : (o.classList.remove("d-inline-block"), o.classList.remove("d-none"), s.classList.remove("d-none")),
                        showSkip.includes(r.currentStepIndex) ? (k.classList.add("d-inline-block"), k.classList.remove("d-none")) : (k.classList.add("d-none"), k.classList.remove("d-inline-block")),
                        showpreview.includes(r.currentStepIndex) ? (pr.classList.add("d-none"), pr.classList.remove("d-inline-block")) : (pr.classList.add("d-inline-block"), pr.classList.remove("d-none"))
                })), r.on("kt.stepper.next", (function (e) {
                    console.log("stepper.next");
                    var t = a[e.getCurrentStepIndex() - 1];
                    t ? t.validate().then((function (t) {
                        console.log("validated!"), "Valid" == t ? (typeof funsave[e.getCurrentStepIndex() - 1] === 'function' ? funsave[e.getCurrentStepIndex() - 1]().then(function (data) {
                            if (data?.step && data?.next) {
                                e.goTo(data.step + 1);
                                KTUtil.scrollTop();
                                pr.classList.add('d-none');
                                showpreview.push(data.step);
                            } else {
                                if (data) {
                                    e.goNext();
                                    KTUtil.scrollTop()
                                }
                            }
                        }) : e.goNext(), KTUtil.scrollTop()) : Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then((function () {
                            KTUtil.scrollTop()
                        }))
                    })) : (typeof funsave[e.getCurrentStepIndex() - 1] === 'function' ? funsave[e.getCurrentStepIndex() - 1]().then(function (data) {
                        console.log(data);
                        if (data) {
                            e.goNext();
                            KTUtil.scrollTop()
                        }
                    }) : e.goNext(), KTUtil.scrollTop())
                })), r.on("kt.stepper.previous", (function (e) {
                    console.log("stepper.previous"),
                        typeof funprev[e.getCurrentStepIndex() - 1] === 'function' ? funprev[e.getCurrentStepIndex() - 1]().then(function (t) {
                            e.goPrevious(), KTUtil.scrollTop()
                        }) : e.goPrevious(), KTUtil.scrollTop()
                })), r.on("kt.stepper.skip", (function (e) {
                    console.log("stepper.skip"), e.goNext(), KTUtil.scrollTop()
                })),
                a.push(FormValidation.formValidation(i, {   // OTP
                    fields: {
                        phone_no: {
                            validators: {
                                notEmpty: {
                                    message: "Phone no required"
                                },
                                // regexp : {
                                //     message : 'Enter Valide Phone number',
                                //     // regexp : '^([9]{1})([234789]{1})([0-9]{8})$'
                                // },
                            }
                        },
                        country_code: {
                            validators: {
                                notEmpty: {
                                    message: "Select country code"
                                },
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Firm
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Personal
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Name"
                                }
                            }
                        },
                        dob: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Date of Birth"
                                }
                            }
                        },
                        bio_data: {
                            validators: {
                                notEmpty: {
                                    message: "Leave Some comment here"
                                }
                            }
                        },
                        exp_year: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Year of Experience"
                                }
                            }
                        },
                        language: {
                            validators: {
                                notEmpty: {
                                    message: "Select at least one Language"
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Email Address"
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address',
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Address
                    fields: {
                        register_address: {
                            validators: {
                                notEmpty: {
                                    message: "Add Address"
                                }
                            }
                        },
                        country_id: {
                            validators: {
                                notEmpty: {
                                    message: "Select a Option"
                                }
                            }
                        },
                        city_id: {
                            validators: {
                                notEmpty: {
                                    message: "Select a Option"
                                }
                            }
                        },
                        zipcode: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Zip Code"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Profession
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Specialized
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Insurance
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Consultant Details
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Proof
                    fields: {

                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Commission
                    fields: {
                        com_con_amount: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Amount"
                                }
                            }
                        },
                        com_off_amount: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Amount"
                                }
                            }
                        },
                        com_pay_amount: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Amount"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    }
                })),
                a.push(FormValidation.formValidation(i, {   //Bank Details
                    fields: {
                        account_number: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Account Number"
                                }
                            }
                        },
                        account_name: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Account Name"
                                }
                            }
                        },
                        ifsc_code: {
                            validators: {
                                notEmpty: {
                                    message: "Enter IBAN Code / IFSC Code"
                                }
                            }
                        },
                        bank_name: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Bank Name"
                                }
                            }
                        },
                        branch: {
                            validators: {
                                notEmpty: {
                                    message: "Enter Branch"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })),


                funsave.push(async function () {    //OTP
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 0
                    for (var key in triggervalue[0]) {
                        data[key] = triggervalue[0][key].value
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {

                                consultant_country = response.country
                                consultantcurrnect.forEach(e => {
                                    e.innerText = consultant_country.currency.currencycode
                                })
                                response.Document?.forEach(e => proof_clone.appendChild(poofTemplate(e.title)))
                                if (response?.tree) {
                                    $('#kt_docs_jstree_checkable1').jstree(true).settings.core.data = response.tree;
                                    $('#kt_docs_jstree_checkable1').jstree(true).refresh();
                                }
                                return response
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Firm
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 1
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['c_code'] = document.getElementById('c-code').value
                    if(firmType == 2){
                        $('#firm_choose').val('');
                    }else{
                        if(!$('#firm_choose').val()){
                            Swal.fire({
                            text: "Select Firm",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                        })
                        return false
                        }
                    }
                    for (var key in triggervalue[1]) {
                        data[key] = triggervalue[1][key].value
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Personal
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 2
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['c_code'] = document.getElementById('c-code').value
                    let picture = document.getElementById('picture')
                    if (picture.value == '') {
                        Swal.fire({
                            text: "Choose Profile Image",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        })
                        return false
                    }
                    for (var key in triggervalue[2]) {
                        data[key] = triggervalue[2][key].value
                    }
                    data['language'] = $('#language').val().toString()
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Address
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 3
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['c_code'] = document.getElementById('c-code').value

                    for (var key in triggervalue[3]) {
                        data[key] = triggervalue[3][key].value
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Profession
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 4
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['categorie_id'] = categorie_id.value
                    data['c_code'] = document.getElementById('c-code').value

                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Specialized
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 5
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['specialized'] = specialized.value
                    data['c_code'] = document.getElementById('c-code').value

                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Insurance
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 6
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['insurance_id'] = $('#insurance_id').val();
                    data['c_code'] = document.getElementById('c-code').value
                    if(document.querySelector('input[name="insurancecheckbox"]:checked').value == 1 && $('#insurance_id').val().length == 0){
                        Swal.fire({
                            text: "Select insurance",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        })
                        return false
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Consultant Details
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 7
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['c_code'] = document.getElementById('c-code').value


                    for (var key in triggervalue[7]) {
                        if (triggervalue[7][key].type == 'checkbox') data[key] = (triggervalue[7][key].checked) ? 1 : 0
                        else data[key] = triggervalue[7][key].value
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Proof
                    let = invalide = false;
                    let formdata = new FormData()
                    let Node = document.querySelectorAll('.gallery')
                    Node = [...Node]
                    Node.forEach(e => {
                        if (e.files.length < 1) {
                            invalide = true
                        }
                    })
                    if (invalide) {
                        Swal.fire({
                            text: "make sure all documents uploaded",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        })
                        return false
                    }
                    Node.forEach(e => e.files.forEach((i, d) => formdata.append(`proof[${d}]`, i)))

                    formdata.append("phone_no", document.getElementById('phone_no').value);
                    formdata.append("c_code", document.getElementById('c-code').value);
                    formdata.append("step", 8);
                    formdata.append("_token", csrf);

                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            body: formdata
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Commission
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 9
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['com_con_type'] = document.querySelector('input[name="com_con_type"]:checked').value
                    data['com_off_type'] = document.querySelector('input[name="com_off_type"]:checked').value
                    data['com_pay_type'] = document.querySelector('input[name="com_pay_type"]:checked').value
                    data['com_con_amount'] = com_con_amount.value
                    data['com_off_amount'] = com_off_amount.value
                    data['com_pay_amount'] = com_pay_amount.value
                    data['c_code'] = document.getElementById('c-code').value

                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                setTimeout(() => {
                                    window.location.href = indexConsultant
                                }, 1000)
                                return true;
                            }
                            return false

                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                funsave.push(async function () {    //Bank Details
                    var data = {
                        _token: csrf
                    };
                    data['step'] = 10
                    data['phone_no'] = document.getElementById('phone_no').value
                    data['c_code'] = document.getElementById('c-code').value
                    for (var key in triggervalue[7]) {
                        if (triggervalue[10][key].type == 'checkbox') data[key] = (triggervalue[10][key].checked) ? 1 : 0
                        else data[key] = triggervalue[7][key].value
                    }
                    return await fetch(consultantsave, {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then((response) => {
                            if (response.next) {
                                return true
                            }
                            return false
                        })
                        .catch(error => {
                            funerror()
                        })
                }),
                document.querySelectorAll('[data-kt-stepper-element="content"]').forEach(function (e, i) {
                    var obj = {}
                    e.querySelectorAll('[name]').forEach(function (e) {
                        obj[e.name] = e
                    })
                    triggervalue.push(obj)
                }),
                o.addEventListener("click", (function (e) {
                    a[4].validate().then((function (t) {
                        console.log("validated!"), "Valid" == t ? (e.preventDefault(), o.disabled = !0, o.setAttribute("data-kt-indicator", "on"), setTimeout((function () {
                            o.removeAttribute("data-kt-indicator"), o.disabled = !1, r.goNext()
                        }), 2e3)) : Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then((function () {
                            KTUtil.scrollTop()
                        }))
                    }))
                }))
        }
    }
}();

var KTJSTreeCheckable = {
    init: function () {
        $("#kt_docs_jstree_checkable")
            .on('changed.jstree', function (e, data) {

                let temparray = $("#kt_docs_jstree_checkable").jstree("get_selected")
                categorie_id.value = temparray.join(',');
                $.ajax({
                    url: getSubCategory,
                    method: "POST",
                    data: {
                        "_token": csrf,
                        categorie_id: categorie_id.value
                    },
                    success: function (data) {
                        $('#kt_docs_jstree_checkable1').jstree(true).settings.core.data = data.tree;
                        $('#kt_docs_jstree_checkable1').jstree(true).refresh();
                        proof_clone.innerHTML = ''
                        data.Document.forEach(e => proof_clone.appendChild(poofTemplate(e.title)))
                    }
                })
            })
            .jstree({
                plugins: ["wholerow", "checkbox", ],
                core: {
                    themes: {
                        responsive: !1
                    },
                    data: tree
                },

            })
        $("#kt_docs_jstree_checkable1")
            .on('changed.jstree', function (e, data) {
                let temparray = $("#kt_docs_jstree_checkable1").jstree("get_selected")
                specialized.value = temparray.join(',');
            }).jstree({
                plugins: ["wholerow", "checkbox"]
            })
    }
}

KTUtil.onDOMContentLoaded((function () {
    KTCreateAccount.init()
    KTJSTreeCheckable.init()
}));

function funerror() {
    Swal.fire({
        text: "Sorry, looks like there are some errors detected, please try again.",
        icon: "error",
        buttonsStyling: !1,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-light"
        }
    }).then((function () {
        KTUtil.scrollTop()
    }))
}
var country_id = $("#country_id");
var state = $("#state_id")
var city = $("#city_id")
var stateDiv = $('#stateDiv')
var phone_no = $('#c-code')
var landline = $('#landline')
$("#country_code").select2({
    templateResult: formatState,
    width: 'resolve'
});
$("#firm_choose").select2({
    templateResult: insuransetemplate,
    templateSelection: insuransetemplate
});
$("#insurance_id").select2({
    templateResult: insuransetemplate,
    templateSelection: insuransetemplate
});
function insuransetemplate(state){
    if (!state.id) return state.text;
    
   var imag = $(state.element).data('image');
    var $state = $(
        `<span><img style="width:25px;" onerror="this.onerror=null;this.remove()" src="${imag}" class="img-flag" />${state.text}</span>`
    );
     return $state;
}
function formatState(state) {
    if (!state.id) return state.text;

    var baseUrl = `${ baseURl }/demo1/flags/1x1/`;
    var $state = $(
        `<span><img onerror="this.onerror=null;this.remove()" src="${baseUrl}/${state.text.toLowerCase()}.svg" class="img-flag" />${state.text}</span>`
    );
    return $state;
};

$("#country_code").change(function (e) {

    var id = e.currentTarget.options[e.currentTarget.options.selectedIndex].value;
    let has_state = e.currentTarget.options[e.currentTarget.options.selectedIndex].dataset.has_state;
    if (has_state != "0") {
        stateDiv.show(500)
        state.attr('required');
    } else {
        stateDiv.hide(500)
        state.removeAttr('required');
    }
    country_id.val(id).trigger("change");
    $.ajax({
        url: getState,
        method: "POST",
        data: {
            id: id,
            "_token": csrf,
        },
        success: function (data) {
            var option = `<option value=''>Select State</option>`
            var option1 = `<option selected>Select City</option>`

            if (data.states.length != null) {
                data.states.forEach((e) => {
                    option += '<option value=' + e.id + '>' + e.state_name + '</option>';
                })
            }
            if(data.city.length != null){
                data.city.forEach((e)=>{
                    option1 += '<option value='+e.id+'>'+e.city_name+'</option>';
                })
            }
            state.html(option).trigger("change");
            city.html(option1).trigger("change");
            BasicDetails = data
            phone_no.val(data.Country.dialing)
            countrycode.innerText = data.Country.dialing
            // landline.val(data.Country.dialing)
        }
    })
});
