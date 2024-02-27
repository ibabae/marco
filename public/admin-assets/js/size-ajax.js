$(function(){
    // آرایه برای نگهداری گزینه‌های انتخاب شده
    var selectedSizeOptions = {};
    // تابع برای به‌روزرسانی گزینه‌های انتخاب شده
    function updateSelectedSizeOptions() {
        $('#sizeList .sizeselect').each(function() {
            var selectId = $(this).attr('name');
            selectedSizeOptions[selectId] = $(this).find('option:selected').attr('value');
        });
    }
    // اجرای تابع هنگام تغییر گزینه‌ها
    $('#sizeList').on('change', '.sizeselect', function() {
        updateSelectedSizeOptions();
    });
    // تنظیمات AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('form.size-ajax').on('submit', function(e) {
        var formData = new FormData(this);
        // formData.append('content', $('.ql-editor').html());
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
                $('#sizeList .sizeselect').each(function() {
                    var selectId = $(this).attr('name');
                    var selectedOption = selectedSizeOptions[selectId];
                    $(this).empty();
                    $.each(response.select, function(key, value) {
                        $(this).append('<option value="' + value.id + '">' + value.name + '</option>');
                    }.bind(this));
                    $(this).val(selectedOption);
                });
                // به‌روزرسانی انتخاب‌های کلی
                updateSelectedSizeOptions();
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
        var id = $(this).attr('data-id')

        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            success: function(result){
                $("button:contains('انصراف')").show()
                $('h6.card-title').text('ویرایش')
                $('.input-group-text i').css('background-color', result.data.code)
                $('input[name="title"]').val(result.data.title)
                $('input[name="code"]').val(result.data.code)
                $('button[type="submit"]').text('به روز رسانی')
                $('input[name="_method"]').val('PATCH')
                $('form.size-ajax').attr('action',result.route)
            }
        })
    })
    $("form").on('click',"button:contains('انصراف')", function(){
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
    $('.card').on('click','.size-delete-warning', function (e) {
        e.preventDefault();
        var urlAddress = $(this).attr('href')
        swal({
            title: "هشدار!",
            text: "با حذف این گزینه، مشخصات مرتبط با این سایز و محصول حذف خواهد شد.!",
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
                    method: 'POST',
                    data: {
                        _method: 'delete',
                    },
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
