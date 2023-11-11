var base_url = window.location.href;
var full_url = base_url.split('/');
base_url = full_url[0]+'//'+full_url[2]+'/'+full_url[3]+'/'
function showNotify(message,status,url){
    if(status == 'success'){
        toastr.success(message);
        if(url != ''){
            setTimeout(function(){
                window.location = url;
            }, 2000); 
        }
    }else if(status == 'error'){
        toastr.error(message);
    }else if(status == 'errors'){
        toastr.error(message);
    }
}
$('form > input').keyup(function() {
        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('#update').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        } else {
            $('#update').removeAttr('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        }
});
$(document).on("submit",'.all-form',function(e){
	e.preventDefault();
	var method = $(this).attr('method');
	var url = $(this).attr("action");
    var form = $(this)[0];
    var form_data = new FormData(form);    
	$.ajax({
        type: method,
        url: url,
        data:form_data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data){
            if(data.status == 'error'){
                $.each(data.errors, function(key, value) {
                    $('#'+key).addClass('is-invalid');
                    console.log(value)
                    $('#'+key).html(value);
                });  
            }
            if(data.status == 'success'){
                showNotify(data.message,data.status,data.url);
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,data.url);
            }
        }
    }); 
})
$(document).on("submit",'.all-form-front',function(e){
    e.preventDefault();
    var method = $(this).attr('method');
    var url = $(this).attr("action");
    var form = $(this)[0];
    var form_data = new FormData(form);    
    $.ajax({
        type: method,
        url: url,
        data:form_data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data){
            if(data.status == 'error'){
                $.each(data.errors, function(key, value) {
                    $('.' + key).addClass('is-invalid');
                    $('.' + key).html(value);
                });  
            }
            if(data.status == 'success'){
                location.reload();
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,data.url);
            }
        }
    }); 
})
$(document).on("submit",'.submit-with-populate',function(e){
    e.preventDefault();
    var method = $(this).attr('method');
    var url = $(this).attr("action");
    var wrapper = $(this).data("wrapper");
    var modal = $(this).data("modal");
    var form = $(this)[0];
    var form_data = new FormData(form);    
    $.ajax({
        type: method,
        url: url,
        data:form_data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data){
            if(data.status == 'error'){
                $.each(data.errors, function(key, value) {
                    $('#' + key).addClass('is-invalid');

                    $('#' + key).html(value);
                });  
            }
            if(data.status == 'success'){
                showNotify(data.message,data.status,data.url);
                $(".close-modal").click();
                $(wrapper).html(data.html);
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,data.url);
            }
        }
    }); 
})
$(document).on('keyup','input', function () { 
    $(this).parent().find('.text-danger').empty();
});
$(document).on('click','.delete-data', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = $(this).attr('url');
    Swal.fire({
        title: "Are you sure ?",
        text: "You want to delete some data",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
                type: "POST",
                url: url,
                data:{id:id},
                dataType: 'json',
                success: function(data){
                    if(data.status == 'success'){
                        showNotify(data.message,data.status,data.url);
                    }
                    if(data.status == 'errors'){
                        showNotify(data.message,data.status,data.url);
                    }
                }
        }); 
      } else if (result.isDenied) {
       showNotify('Action Cancelled','error','');
      }
    }); 
});
$(document).on('change','.send-to-server', function (e) { 
    var id = $(this).data('id');
    var status = $(this).send-to-server('status');
    var url = $(this).attr("url");
    $.ajax({
        type: 'POST',
        url: url,
        data:{id:id,status:status},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
                showNotify(data.message,data.status,data.url);
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,data.url);
            }
        }
    }); 
});
// $(document).ready(function(){
//     $('.all-form').keydown(function(event){
//         if(event.keyCode == 13) {
//             event.preventDefault();
//             return false;
//         }
//     });
// });
$(document).on('change','.dynamic-data', function (e) {
    var id = $(this).val();
    var segment = $(this).data('segment');
    var wrapper = $(this).data("wrapper");
    $.ajax({
        type: 'POST',
        url: `${base_url}${segment}`,
        data:{id:id},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
                $(wrapper).html(data.html);
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,'');
            }
        }
    });
});

$(document).on('click','.send-to-server-new', function (e) { 
    var id = $(this).data('id');
    var status = $(this).data('status');
    var url = $(this).data("url");
    var wrapper = $(this).data("wrapper");
    var modal = $(this).data("modal");
    console.log(modal)
    console.log(wrapper)
    $.ajax({
        type: 'POST',
        url: url,
        data:{id:id},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
                $(modal).modal('show');
                $(wrapper).html(data.html);
            }
            if(data.status == 'errors'){
                showNotify(data.message,data.status,data.url);
            }
        }
    }); 
});
$(document).on("change",'.review-video-type',function(e){
    var review_type = $(this).val();
    var html = '';
    if(review_type == 'video'){
        html += '<div class="col-lg-12"><div class="form-group"><label for="basiInput" class="form-label">Youtube Video ID</label>'
        +'<input type="text" placeholder="Youtube Video ID" name="video_id" class="form-control"></div></div>';
    }
    $(".video-review-html").html(html);
})


$(document).on('click','.delete-product-images', function (e) {
   e.preventDefault();
    var id = $(this).data('id');
    var url = $(this).attr('url');
    Swal.fire({
        title: "Are you sure ?",
        text: "You want to delete the data",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type: "POST",
            url: url,
            data:{id:id},
            dataType: 'json',
            success: function(data){
                if(data.status == 'success'){
                    showNotify(data.message,data.status,data.url);
                }
                if(data.status == 'errors'){
                    showNotify(data.message,data.status,data.url);
                }
            }
        }); 
      } else if (result.isDenied) {
       showNotify('Action Cancelled','error','');
      }
    }); 
})
$(".switch-photo-video").change(function(e){
    var type = $(this).val();
    if(type === 'photo'){
        $(".gallery-image-show").show();
        $(".gallery-video-show").hide();
    }
    if(type === 'video'){
        $(".gallery-image-show").hide();
        $(".gallery-video-show").show();
    }
});


$(document).ready(function(){
    $('.switch-file-type').change(function(){
        var selectedFileType = $(this).val();
        // Hide all file input groups
        $('.form-group.image, .form-group.video, .form-group.documents').hide();
        // Show the selected file input group
        if (selectedFileType === 'image') {
            $('.form-group.image').show();
        } else if (selectedFileType === 'video') {
            $('.form-group.video').show();
        } else if (selectedFileType === 'doc') {
            $('.form-group.documents').show();
        }
    });
});