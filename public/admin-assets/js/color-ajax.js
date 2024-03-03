$(function(){
    // آرایه برای نگهداری گزینه‌های انتخاب شده
    var selectedOptions = {};
    // تابع برای به‌روزرسانی گزینه‌های انتخاب شده
    function updateSelectedOptions() {
        $('#sizeList .colorselect').each(function() {
            var selectId = $(this).attr('name');
            selectedOptions[selectId] = $(this).find('option:selected').attr('value');
        });
    }
    // اجرای تابع هنگام تغییر گزینه‌ها
    $('#sizeList').on('change', '.colorselect', function() {
        updateSelectedOptions();
    });
    // تنظیمات AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ارسال درخواست AJAX
    $('form.color-ajax').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $("form").trigger("reset");
                toastr.success(response.message)
                // به‌روزرسانی HTML
                $('table tbody').html(response.table);
                // به‌روزرسانی گزینه‌های هر Select
                $('#sizeList .colorselect').each(function() {
                    var selectId = $(this).attr('name');
                    var selectedOption = selectedOptions[selectId];
                    $(this).empty();
                    $.each(response.select, function(key, value) {
                        $(this).append('<option value="' + value.id + '">' + value.name + '</option>');
                    }.bind(this));
                    $(this).val(selectedOption);
                });
                // به‌روزرسانی انتخاب‌های کلی
                updateSelectedOptions();
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
    $(".card").on('click', "a.edit", function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            success: function(result){
                $("button:contains('انصراف')").show()
                $('h6.card-title').text('ویرایش')
                $('input[name="title"]').val(result.data.title)
                $('input[name="code"]').val(result.data.code)
                $('span.input-group-text i').css('background-color',result.data.code)
                $('button[type="submit"]').text('به روز رسانی')
                $('input[name="_method"]').val('PATCH')
                $('form.color-ajax').attr('action',result.route)
            }
        })
    })
    $("form").on('click',"button:contains('انصراف')", function(){
        $("form").trigger("reset");
        $('h6.card-title').text('افزودن')
        $('input[name="title"]').val('')
        $('input[name="code"]').val('')
        $('input[class="color"]').val('#ff0000')
        $('.input-group-text i').css('background-color', '#ff0000')
        $('button[type="submit"]').text('ثبت')
        $('input[name="_method"]').val('POST')

        $('form.ajax').attr('action',$('span[data-type="add-route"]').text())

        $(this).hide()
    })
    $('.card').on('click','.color-delete-warning', function (e) {
        e.preventDefault();
        var urlAddress = $(this).attr('href')
        swal({
            title: "هشدار!",
            text: "با حذف این گزینه، مشخصات مرتبط با این رنگ و محصول حذف خواهد شد.!",
            icon: "warning",
            buttons: {
                confirm : 'باشه',
                cancel : 'انصراف'
            },
            dangerMode: true
        })
        .then(function(willDelete) {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: urlAddress,
                    method: 'DELETE',
                    success:function(response){
                        $('table tbody').html(response.table);
                    }
                })
            }
            else {
                // swal("فایل خیالی شما در امان است!", {
                //     icon: "error",
                //     button: "باشه"
                // });
            }
        });
    });

})
