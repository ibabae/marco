$(function(){
    $('form.ajax').on('submit', function(e) {
        var formData = new FormData(this);
        // formData.append('content', $('.ql-editor').html());
        // console.log($(this).attr('action'))
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $('.loading-overlay').removeClass('d-none').addClass('d-flex')
                $('.overlay').fadeIn();
                $("input").removeClass('border-danger')
                $("textarea").removeClass('border-danger')
                $('#progressBar').data('aria-valuenow',0)
                $('#progressBar').width(0+'%')
                $('#progressBar').text(0+'%')
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $(".alert")
                            .addClass("alert-info")
                            .removeClass("alert-success, alert-danger")
                            .html("در حال بارگذاری: " + percentComplete.toFixed(2) + "%");
                        $('#progressBar').data('aria-valuenow',percentComplete.toFixed(2))
                        $('#progressBar').width(percentComplete.toFixed(2)+'%')
                        $('#progressBar').text(percentComplete.toFixed(2)+'%')
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                $('.loading-overlay').removeClass('d-flex').addClass('d-none')
                $('.overlay').fadeOut();
                $('#addMedia').modal('hide')
                // console.log(response)
                toastr.success(response.message)
                $('#contentBox').slideUp()
                $('#success').slideDown().html(response.data)
                setTimeout(() => {
                    location.reload()
                }, 1500);
            },
            error: function(xhr, status, error) {
                $('.loading-overlay').removeClass('d-flex').addClass('d-none')
                $('.overlay').fadeOut();
                // console.log(xhr)
                if(error == "Bad Request"){
                    let messages = Object.entries(xhr.responseJSON.message)
                    for (var i = 0; i < messages.length; i++) {
                        toastr.warning(messages[i][1]);
                        // console.log(messages[i][0])
                        if(messages[i][0] == 'excerpt'){
                            $("textarea[name="+messages[i][0]+"]").addClass('border-danger')
                        }else if(messages[i][0] == 'content'){
                            $("#quilleditor").addClass('border-danger')
                        } else {
                            if($('input')){
                                $("input[name="+messages[i][0]+"]").addClass('border-danger')
                            }
                        }
                    }
                } else {
                    toastr.error(xhr.responseJSON.message);
                }
            }
        });
    });
    $('form.media').on('submit', function(e) {
        var formData = new FormData(this);
        // formData.append('content', $('.ql-editor').html());
        // console.log($(this).attr('action'))
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $('#progressBar').data('aria-valuenow',0)
                $('#progressBar').width(0+'%')
                $('#progressBar').text(0+'%')
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $(".alert")
                            .addClass("alert-info")
                            .removeClass("alert-success, alert-danger")
                            .html("در حال بارگذاری: " + percentComplete.toFixed(2) + "%");
                        $('#progressBar').data('aria-valuenow',percentComplete.toFixed(2))
                        $('#progressBar').width(percentComplete.toFixed(2)+'%')
                        $('#progressBar').text(percentComplete.toFixed(2)+'%')
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                $('#addMedia').modal('hide')
                // console.log(response)
                setTimeout(() => {
                    location.reload();
                }, 1500);
                toastr.success(response.message)
            },
            error: function(xhr, status, error) {
                // console.log(xhr)
                if(error == "Bad Request"){
                    let messages = Object.entries(xhr.responseJSON.message)
                    for (var i = 0; i < messages.length; i++) {
                        toastr.warning(messages[i][1]);
                        // console.log(messages[i][0])
                        if(messages[i][0] == 'excerpt'){
                            $("textarea[name="+messages[i][0]+"]").addClass('border-danger')
                        }else if(messages[i][0] == 'content'){
                            $("#quilleditor").addClass('border-danger')
                        } else {
                            if($('input')){
                                $("input[name="+messages[i][0]+"]").addClass('border-danger')
                            }
                        }
                    }
                } else {
                    toastr.error(xhr.responseJSON.message);
                }
            }
        });
    });
    $('#free').on('change',function(){
        if($(this).is(':checked')){
            $('.amount-box').slideUp()
            $('#price').attr('required', false)
        } else {
            $('.amount-box').slideDown()
            $('#price').attr('required', true)
        }
    })
    // const nextBtn = $('.next-btn');
    // const prevBtn = $('.prev-btn');

    // function validateStep() {
    //     const currentStep = $('.content.active');
    //     let isValid = true;
    //     var count = 0;
    //     currentStep.find(':input').each(function () {
    //         count++
    //         if (!$(this).val()) {
    //             isValid = false;
    //         }
    //     });
    //     return isValid;
    // }

    // nextBtn.click(function () {
    //     if (validateStep()) {
    //         // برو به مرحله بعد
    //         console.log('GO')
    //     } else {
    //         console.log('Error')
    //         // نمایش خطا
    //     }
    // });

    // prevBtn.click(function () {
    //     if (validateStep()) {
    //         // برگشت به مرحله قبل
    //     } else {
    //         // نمایش خطا
    //     }
    // });
})
