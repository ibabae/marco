$(function(){
    $('form.ajax').on('submit', function(e) {
        var formData = new FormData(this);
        // formData.append('content', $('.ql-editor').html());
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                toastr.success(response.message)
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
    $("a:contains('ویرایش')").on('click', function(e){
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
                $('form.ajax').attr('action',result.route)
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

})