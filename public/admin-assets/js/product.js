$(function () {
    var counter = 0;
    $("#sizeList").on('click', '.add-size', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            success: function (response) {
                counter++;
                var $row = $("<div class='row mb-2 size-row px-2 sizeRow'>");
                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1 colors'>").append(
                        $('<div class="row">').append(
                            $('<div class="col-10">').append(
                                $('<select>').attr({
                                    name: "stock[" + counter + "][color]",
                                    class: 'form-control colorselect'
                                })
                                    .append(
                                        $('<option>')
                                            .html('انتخاب رنگ')
                                            .attr({ value: '0', disabled: 'disabled', selected: 'selected' })
                                    )
                            )
                        ).append(
                            $('<div class="col-2 my-auto">').append(
                                $('<a class="text-info add-new-color small" data-bs-toggle="modal" data-bs-target="#newColorModal" href="javascript:void(0)" title="افزودن رنگ جدید"><i class="fa fa-plus me-2">')
                            )
                        )
                    )
                )
                // Use $.each after appending the select element
                var $colorSelect = $row.find('.colorselect');
                $.each(response.colors, function (key, colorItem) {
                    $colorSelect.append(
                        $('<option>').html(colorItem.name).attr({ value: colorItem.id })
                    );
                });

                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1 sizes'>").append(
                        $('<div class="row">').append(
                            $('<div class="col-10">').append(
                                $('<select>').attr({
                                    name: "stock[" + counter + "][size]",
                                    class: 'form-control sizeselect'
                                })
                                    .append(
                                        $('<option>')
                                            .html('انتخاب سایز')
                                            .attr({ value: '0', disabled: 'disabled', selected: 'selected' })
                                    )
                            )
                        ).append(
                            $('<div class="col-2 my-auto">').append(
                                $('<a class="text-info add-new-size small" data-bs-toggle="modal" data-bs-target="#newSizeModal" href="javascript:void(0)" title="افزودن رنگ جدید"><i class="fa fa-plus me-2">')
                            )
                        )
                    )
                );
                var $sizeSelect = $row.find('.sizeselect');
                $.each(response.sizes, function (key, sizeItem) {
                    $sizeSelect.append(
                        $('<option>').html(sizeItem.name).attr({ value: sizeItem.id })
                    );
                });

                $row.append(
                    $("<div class='col-8 col-lg-3 mb-1'>").append(
                        $('<div class="num-block skin-2 border rounded-3 py-1">').append(
                            $('<div class="row num-in px-1">')
                                .append(
                                    $('<div class="col-3 px-1 my-auto">').append(
                                        $('<center>').append($('<span class="plus">'))
                                    )
                                )
                                .append(
                                    $('<div class="col-6 px-0">').append(
                                        $('<input>').attr({ type: "text", name: "stock[" + counter + "][count]", class: "in-num rounded", value: "0", readonly: true })
                                    )
                                )
                                .append(
                                    $('<div class="col-3 px-1 my-auto">').append(
                                        $('<center>').append($('<span class="minus dis">'))
                                    )
                                )
                        )
                    )
                )
                $row.append(
                    $("<div class='col-4 col-lg-1 pt-2 mb-1'>").append(
                        $('<a class="text-danger text-center delete" href="javascript:void(0)">').append(
                            $('<i class="fa fa-minus-circle">')
                        )
                    )
                )
                $row.appendTo($("#size-group"));
            }
        })
    });

    $("#sizeList").on('click', '.delete', function () {
        $(this).parent().parent().remove();
    })
    $('span[data-role="remove"]').html('x')
    $('#MainCategory').on('change', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("category.get")}}',
            type: "GET",
            data: {
                type: 2,
                id: $(this).val(),
            },
            success: function (data) {
                $('#SubCategory').html(data)
            },
            error: function (data) {
                console.log(data)
            },
        });
    })
})
$(function () {
    $('#sizeList').on('click', '.num-in span', function () {
        var $input = $(this).parents('.num-block').find('input.in-num');
        if ($(this).hasClass('minus')) {
            var count = parseFloat($input.val()) - 1;
            count = count < 0 ? 0 : count;

            if (count < 2) {
                $(this).addClass('dis');
            } else {
                $(this).removeClass('dis');
            }
            $input.val(count);
        } else {
            var count = parseFloat($input.val()) + 1
            $input.val(count);
            if (count > 1) {
                $(this).parents('.num-block').find(('.minus')).removeClass('dis');
            }
        }

        $input.change();
        return false;
    });
    $('.add-sub').on('click', function (e) {
        e.preventDefault();
        $('.NewSubBox').slideDown();
    })
    $('.add-main').on('click', function (e) {
        e.preventDefault();
        $('.NewMainBox').slideDown();
    })

    $('#addSub').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('category.store')}}",
            type: 'POST',
            data: {
                parent: $('#MainCategory').val(),
                name: $('#newsub').val(),
                descriptions: null,
                type: 1
            },
            success: function (data) {
                $('#SubCategory').html(data)
                $('.NewSubBox').slideUp()
                toastr.success("دسته افزوده شد");
            },
            error: function (data) {
                console.log(data)
            },
        })
    })
    $('#addMain').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('category.store')}}",
            type: 'POST',
            data: {
                parent: 0,
                name: $('#newmain').val(),
                descriptions: null,
                type: 2
            },
            success: function (data) {
                $('#MainCategory').html(data)
                $('.NewMainBox').slideUp()
                toastr.success("دسته افزوده شد");
            },
            error: function (data) {
                console.log(data)
            },
        })
    })

})
$('.amount').on('keyup', function () {
    var val = $(this).val();
    val = val.replace(/[^0-9\.]/g, '');
    if (val != "") {
        valArr = val.split('.');
        valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
        val = valArr.join('.');
    }
    $(this).val(val);
})
$('#newProduct').on('submit', function (e) {
    e.preventDefault();
});
$(document).ready(function () {
    $("#input-24").fileinput({
        initialPreviewAsData: true,
        overwriteInitial: false,
        maxFileSize: 100,
        showRemove: true,
        removeClass: "btn btn-danger",
        removeLabel: "حذف همه",
        removeIcon: "<i class=\"bi-trash\"></i> ",

    });
});
var jsonData = JSON.stringify(data);
const categoriesList = document.getElementById('categories');
buildTree(data, categoriesList);

function buildTree(data, parentElement) {
    data.forEach(item => {
        const listItem = document.createElement('li');
        listItem.setAttribute('class', 'custom-control custom-checkbox');
        const label = document.createElement('label');
        const checkbox = document.createElement('input');
        checkbox.setAttribute('type', 'checkbox');
        checkbox.setAttribute('class', 'custom-control-input');
        if (item.parent !== undefined) {
            checkbox.setAttribute('id', `subcategory` + item.parent.id + `_${item.id}`);
            checkbox.setAttribute('name', `category[` + item.parent.id + `][` + item.id + `]`);
            label.setAttribute('for', `subcategory` + item.parent.id + `_${item.id}`);
            label.setAttribute('class', `custom-control-label`);
        } else {
            checkbox.setAttribute('id', `category${item.id}`);
            checkbox.setAttribute('name', `category`);
            label.setAttribute('for', `category${item.id}`);
            label.setAttribute('class', `custom-control-label`);
        }
        label.textContent = item.title;

        listItem.appendChild(checkbox);
        listItem.appendChild(label);

        if (item.children.length > 0) {
            const nestedList = document.createElement('ul');
            listItem.appendChild(nestedList);
            buildTree(item.children, nestedList);
        }

        parentElement.appendChild(listItem);
    });
}

$('#tree').on("change", 'input[type="checkbox"]', function () {
    // ! Not Working yet
    console.log('test')
    var isChecked = $(this).prop('checked');
    var siblings = $(this).parent().parent().children();

    siblings.each(function () {
        if ($(this).get(0) !== $(this).parent().get(0)) {
            $(this).find('input[type="checkbox"]').prop('checked', false);
        }
    });

    // Handle child checkboxes
    var childCheckboxes = $(this).parent().find('ul').find('input[type="checkbox"]');
    childCheckboxes.prop('checked', isChecked);
});
// var form = $("#product");
// jQuery.validator.setDefaults({
//     errorPlacement: function(error, element) {
//         element.addClass("is-invalid");
//         var feedbackContainer = element.next('.invalid-feedback');
//         if (!feedbackContainer.length) {
//             feedbackContainer = $('<div class="invalid-feedback"></div>');
//             element.after(feedbackContainer);
//         } else {
//             feedbackContainer.empty(); // پاک کردن محتوای قبلی
//         }
//         feedbackContainer.text(error.text()); // اضافه کردن متن جدید
//     },
//     errorClass: "is-invalid",

// });
// form.children("div").steps({
//     labels: {
//         current: "قدم فعلی:",
//         pagination: "صفحه بندی",
//         finish: "پایان",
//         next: "بعدی",
//         previous: "قبلی",
//         loading: "بارگذاری ..."
//     },
//     headerTag: "h3",
//     bodyTag: "section",
//     errorClass: 'your-custom-error-class',
//     transitionEffect: "slideLeft",
//     onStepChanging: function (event, currentIndex, newIndex){
//         form.validate().settings.ignore = ":disabled,:hidden";
//         return form.valid();
//     },
//     onFinishing: function (event, currentIndex){
//         form.validate().settings.ignore = ":disabled";
//         return form.valid();
//     },
//     onFinished: function (event, currentIndex){
//         console.log('onFinished')
//         let productForm = $("#product");
//     }
// });
// var current = 0;
// var tabs = $(".tab");
// var tabs_pill = $(".tab-pills");

// loadFormData(current);

// function loadFormData(n) {
//     $(tabs_pill[n]).addClass("active");
//     $(tabs[n]).removeClass("d-none");
//     $(".back_button").attr("disabled", n == 0 ? true : false);
//     if(n == tabs.length - 1){
//         $(".next_button").text("ثبت").removeAttr("onclick")
//     } else {
//         $(".next_button")
//             .text("بعدی")
//             .attr("onclick", "next()");
//     }
//         // ? $(".next_button").text("ثبت").attr("type",'submit').removeAttr("onclick")
//         // : $(".next_button")
//         //     .attr("type", "button")
//         //     .text("بعدی")
//         //     .attr("onclick", "next()");
// }

// function next() {
//     $(tabs[current]).addClass("d-none");
//     $(tabs_pill[current]).removeClass("active");
//     current++;

//     loadFormData(current);
// }

// function back() {
//     $(tabs[current]).addClass("d-none");
//     $(tabs_pill[current]).removeClass("active");

//     current--;
//     loadFormData(current);
// }

$(document).ready(function() {
    $('.btnNext').click(function() {
        $('.nav-pills li .active').parent().next('li').find('button').trigger('click');
    });

    $('.btnPrevious').click(function() {
        $('.nav-pills li .active').parent().prev('li').find('button').trigger('click');
    });
});
$(".product-image").fileinput({
    showUpload: false,
    dropZoneEnabled: false,
    inputGroupClass: "input-group-md bg-white",
    allowedFileExtensions: ["jpg", "png", "gif"],
    rtl: true,
    browseLabel: '&hellip; جستجو',
    cancelLabel: 'انصراف',
    msgPlaceholder: 'انتخاب تصویر ...',
    msgUploadThreshold: 'پردازش &hellip;',
    removeLabel: 'حذف',
    removeTitle: 'حذف فایل انتخاب شده',
});
$(".product-gallery").fileinput({
    inputGroupClass: "bg-white",
    dropZoneClass: "bg-white",
    allowedFileExtensions: ["jpg", "png", "gif"],
    rtl: true,
    browseLabel: '&hellip; جستجو',
    cancelLabel: 'انصراف',
    msgPlaceholder: 'انتخاب تصاویر ...',
    msgProcessing: 'در حال پردازش &hellip;',
    dropZoneTitle: 'فایل ها را بکشید و اینجا رها کنید &hellip;',
    dropZoneClickTitle: '<br>(یا روی دکمه جستجو بزنید)',
    removeLabel: 'حذف',
    removeTitle: 'حذف فایل های انتخاب شده',
});


$('#product').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend:function(test){
            console.log('beforeSend')
        },
        success:function(response){
            console.log(response)
        },
        error:function(xhr,status,error){
            console.log(xhr.status)
            $('.loading-overlay').removeClass('d-flex').addClass('d-none')
            $('.overlay').fadeOut();
            // console.log(xhr)
            if(xhr.status == 422){
                let errors = Object.entries(xhr.responseJSON.errors)
                for (var i = 0; i < errors.length; i++) {
                    toastr.warning(errors[i][1]);
                    if(errors[i][0] == 'excerpt'){
                        $("textarea[name="+errors[i][0]+"]").addClass('border-warning')
                    }else if(errors[i][0] == 'content'){
                        $("#quilleditor").addClass('border-warning')
                    } else {
                        if($('input')){
                            $("input[name="+errors[i][0]+"]").addClass('border-warning')
                        }
                    }
                }
            } else {
                toastr.error(xhr.responseJSON.message);
            }
        }
    })

});
