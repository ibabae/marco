$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('form.ajax').on('submit', function(e) {
        var formData = new FormData(this);
        console.log(formData);
        // formData.append('content', $('.ql-editor').html());
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                console.log(formData)
            },
            success: function(response) {
                toastr.success(response.message)
                $("form").trigger("reset");
                $('table tbody').html(response.table);
                $('.categoryselect').empty();
                $.each(response.select, function(key, value) {
                    $('.categoryselect').append('<option value="' + (value.id == 0 ? '' : value.id) + '">' + value.title + '</option>');
                }.bind('.categoryselect'));
                $("button:contains('انصراف')").hide()
                $('h6.card-title').text('ثبت')
                $('input[name="_method"]').val('POST')
                $('form.ajax').attr('action',$('span[data-type="add-route"]').text())
                $('button[type="submit"]').text('ثبت')
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
    $('table').on('click','a.edit', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id')

        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            success: function(result){
                $('.categoryselect').empty();
                $.each(result.select, function(key, row) {
                    console.log(row)
                    $('.categoryselect').append(
                        $('<option>')
                        .html(row.title)
                        .attr({
                            value: (row.id == 0 ? '' : row.id) ,
                            selected: (row.selected == true) ? 'selected' : false
                        })
                    )
                });
                $("button:contains('انصراف')").show()
                $('h6.card-title').text('ویرایش')
                $('input[name="title"]').val(result.data.title)
                // $('select[name="parentId"]').val(result.data.Parent.id).change()
                $('textarea[name="description"]').val(result.data.description)
                $('button[type="submit"]').text('به روز رسانی')
                $('input[name="_method"]').val('PATCH')
                $('form.ajax').attr('action',result.route)
            }
        })
    })
    $("form").on('click',"button:contains('انصراف')", function(){
        $.ajax({
            url: $(this).attr('data-href'),
            method: 'GET',
            success: function(result){
                $('.categoryselect').empty();
                $.each(result.select, function(key, value) {
                    $('.categoryselect').append('<option value="' + value.id + '">' + value.title + '</option>');
                });
            }
        });
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

    $('.card').on('click','.category-delete-warning', function (e) {
        e.preventDefault()
        var urlAddress = $(this).attr('href')
        swal({
            title: "هشدار!",
            text: "با حذف این دسته، زیر دسته های آن به همراه تمامی محصولات مرتبط حذف خواهد شد.!",
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
                        toastr.success(response.message)
                        $('table tbody').html(response.table);
                        $('.categoryselect').each(function() {
                            $(this).empty();
                            $.each(response.select, function(key, value) {
                                $(this).append('<option value="' + value.id + '">' + value.title + '</option>');
                            }.bind(this));
                        });
                    }
                })
            } else {
                // swal("فایل خیالی شما در امان است!", {
                //     icon: "error",
                //     button: "باشه"
                // });
            }
        });
    });

})
