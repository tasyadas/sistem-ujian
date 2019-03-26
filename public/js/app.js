//.on( events [, selector ] [, data ], handler )
$('body').on('click', '.modal-show', function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var me = $(this),
        url = me.attr('href'), //.attr mendapatkan nilai dari atribut pada html
        title = me.attr('title'); //.attr mendapatkan nilai dari atribut pada html

    $('#modal-title').text(title); //.text mendapatkan konten text dari html
    $('#modal-btn-save').removeClass('hide')
    .text(me.hasClass('edit') ? 'Update' : 'Create');
    $('#btn-save-import').addClass('hide').text('Import');

    $.ajax({ //	Performs an async AJAX request
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response); //.html mendapatkan nilai elemen pada html
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var form = $('#modal-body form'),
        url = form.attr('action'), //.attr mendapatkan nilai dari atribut pada html
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT'; //.val mendapatkan nilai value dari html

    //untuk menghilangkan pesan error saat data sudah diperbaiki
    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({ //Performs an async AJAX request
        url : url,
        method: method,
        data : form.serialize(), //.serialize creates a URL encoded text string by serializing form values
        success: function (response) {
            form.trigger('reset'); //.trigger Triggers all events bound to the selected elements
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Success!',
                text : 'Data has been saved!'
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var me = $(this),
        url = me.attr('href'), //.attr mendapatkan nilai dari atribut pada html
        title = me.attr('title'), //.attr mendapatkan nilai dari atribut pada html
        csrf_token = $('meta[name="csrf-token"]').attr('content'); //.attr mendapatkan nilai dari atribut pada html

    swal({
        title: 'Are you sure want to delete ' + title + ' ?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'GET',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data has been deleted!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});

$('body').on('click', '.btn-show', function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var me = $(this),
        url = me.attr('href'), //.attr mendapatkan nilai dari atribut pada html
        title = me.attr('title'); //.attr mendapatkan nilai dari atribut pada html

    $('#modal-title').text(title); //.text mendapatkan konten text dari html
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response); //.html mendapatkan nilai elemen pada html
        }
    });

    $('#modal').modal('show');
});

$('body').on('click', '.btn-show-import', function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var me = $(this),
        url = me.attr('href'), //.attr mendapatkan nilai dari atribut pada html
        title = me.attr('title'); //.attr mendapatkan nilai dari atribut pada html

    $('#modal-title').text(title); //.text mendapatkan konten text dari html
    $('#modal-btn-save').addClass('hide');
    $('#btn-save-import').removeClass('hide').text('Import');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response); //.html mendapatkan nilai elemen pada html
        }
    });

    $('#modal').modal('show');
});


$('#btn-save-import').click(function (event) {
    event.preventDefault(); //Mencegah reload ke halaman yang berbeda(Sifat bawaan HTML)

    var form = $('#modal-body form'),
        url = form.attr('action'), //.attr mendapatkan nilai dari atribut pada html
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'POST'; //.val mendapatkan nilai value dari html        
        files = $("#files").prop('files')[0],
        formData = new FormData();

    for (var i = 0; i < files.length; i++) {
        formData.append("files", files[i]);
    }

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({ //Performs an async AJAX request
        url : url,
        method: method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data : form.formData, //.serialize creates a URL encoded text string by serializing form values
        processData: false,
        contentType: false,
        success: function (response) {
            form.trigger('reset'); //.trigger Triggers all events bound to the selected elements
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Success!',
                text : 'Data has been saved!'
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});

// Ajax File upload with jQuery and XHR2
// Sean Clark http://square-bracket.com
// xhr2 file upload
// $.fn.upload = function(remote, data, successFn, progressFn) {
//     // if we dont have post data, move it along
//     if (typeof data != "object") {
//         progressFn = successFn;
//         successFn = data;
//     }

//     var formData = new FormData();

//     var numFiles = 0;
//     this.each(function() {
//         var i, length = this.files.length;
//         numFiles += length;
//         for (i = 0; i < length; i++) {
//             formData.append(this.name, this.files[i]);
//         }
//     });

//     // if we have post data too
//     if (typeof data == "object") {
//         for (var i in data) {
//             formData.append(i, data[i]);
//         }
//     }

//     var def = new $.Deferred();
//     if (numFiles > 0) {
//         // do the ajax request
//         $.ajax({
//             url: remote,
//             type: "POST",
//             xhr: function() {
//                 myXhr = $.ajaxSettings.xhr();
//                 if(myXhr.upload && progressFn){
//                     myXhr.upload.addEventListener("progress", function(prog) {
//                         var value = ~~((prog.loaded / prog.total) * 100);

//                         // if we passed a progress function
//                         if (typeof progressFn === "function") {
//                             progressFn(prog, value);

//                         // if we passed a progress element
//                         } else if (progressFn) {
//                             $(progressFn).val(value);
//                         }
//                     }, false);
//                 }
//                 return myXhr;
//             },
//             data: formData,
//             dataType: "json",
//             cache: false,
//             contentType: false,
//             processData: false,
//             complete: function(res) {
//                 var json;
//                 try {
//                     json = JSON.parse(res.responseText);
//                 } catch(e) {
//                     json = res.responseText;
//                 }
//                 if (typeof successFn === "function") successFn(json);
//                 def.resolve(json);
//             }
//         });
//     } else {
//         def.reject();
//     }

//     return def.promise();
// };