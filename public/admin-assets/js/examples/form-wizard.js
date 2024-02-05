'use strict';
$(document).ready(function () {

    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '#index# #title#',
		labels: {
			cancel: 'انصراف',
			current: 'قدم کنونی:',
			pagination: 'صفحه بندی',
			finish: 'پایان',
			next: 'بعدی',
			previous: 'قبلی',
			loading: 'در حال بارگذاری ...'
		}
    });

    $('#wizard2').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '#index# #title#',
		labels: {
			cancel: 'انصراف',
			current: 'قدم کنونی:',
			pagination: 'صفحه بندی',
			finish: 'پایان',
			next: 'بعدی',
			previous: 'قبلی',
			loading: 'در حال بارگذاری ...'
		},
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                var form = document.getElementById('form1'),
                    form2 = document.getElementById('form2');

                if (currentIndex === 0) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        form.classList.add('was-validated');
                    } else {
                        return true;
                    }
                } else if (currentIndex === 1) {
                    if (form2.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        form2.classList.add('was-validated');
                    } else {
                        return true;
                    }
                } else {
                    return true;
                }
            } else {
                return true;
            }
        }
    });

    var form = $("#contact");
    jQuery.validator.setDefaults({
        errorPlacement: function(error, element) {
            element.addClass("is-invalid");
            var feedbackContainer = element.next('.invalid-feedback');
            if (!feedbackContainer.length) {
                feedbackContainer = $('<div class="invalid-feedback"></div>');
                element.after(feedbackContainer);
            } else {
                feedbackContainer.empty(); // پاک کردن محتوای قبلی
            }
            feedbackContainer.text(error.text()); // اضافه کردن متن جدید
        },
        errorClass: "is-invalid",
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        errorClass: 'your-custom-error-class',
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "این فیلد اجباری است",
        remote: "لطفا این بخش را تصحیح کنید.",
        email: "لطفا ایمیل صحیح وارد کنید.",
        url: "آدرس اشتباه است.",
        date: "تاریخ اشتباه است.",
        dateISO: "تاریخ اشتباه است (ISO).",
        number: "شماره صحیح وارد کنید.",
        digits: "فقط عدد وارد کنید.",
        creditcard: "لطفا شماره کارت صحیح وارد کنید.",
        equalTo: "لطفا همان مقدار را تکرار کنید.",
        accept: "لطفا فقط موارد مجاز را در نظر بگیرید.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });

});
