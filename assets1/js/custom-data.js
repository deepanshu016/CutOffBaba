
function getCurrentUrl(){
    var current_url = window.location.href;
    current_url = current_url.split("/");
    var new_url = current_url[0]+'//'+current_url[2]+'/'+current_url[3];
    return new_url;
}
function showNotify(message,status,url){
    if(status == 'success'){
        toastr.success(message);
        setTimeout(function(){
            window.location = url;
        }, 2000);
    }else if(status == 'error'){
        toastr.error(message);
    }else if(status == 'errors'){
        toastr.error(message);
    }
}

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
                    $('#' + key).addClass('is-invalid');

                    $('#' + key).html(value);
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
$(document).on('keyup','input', function () { 
    $(this).parent().find('.text-danger').empty();
});

$(document).on('change','.send-to-server', function (e) { 
    var id = $(this).data('id');
    var url = $(this).attr("url");
    $.ajax({
        type: 'POST',
        url: url,
        data:$(this).serialize(),
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
$(document).on('change','.get-dynamic-html', function (e){
    var id = $(this).val();
    var url = $(this).attr("url");
    var wrapper = $(this).data("wrapper");
    $.ajax({
        type: 'POST',
        url: url,
        data:{id:id},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
               $(wrapper).html(data.html); 
            }
        }
    }); 
})
$(document).on("click",'.send-to-server-dynamic-html',function(e){
    e.preventDefault();
    var classData = $(this);
    var id = $(".category_id").val();
    var url = classData.attr("url");
    var wrapper = classData.data("wrapper");
    $.ajax({
        type: 'POST',
        url: url,
        data:{id:id},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
               $(".send-to-server-dynamic-html").removeClass('active');
               classData.addClass('active');
               $(wrapper).html(data.html); 
            }
        }
    }); 
})
$(document).on("click",".next",function(e){
    e.preventDefault();
    var tab = $(this).data("tab");
    var tabview = $(this).data("tabview");
    var currenttab = $(this).data("currenttab");
    var currenttabview = $(this).data("currenttabview");
    var url = $(this).attr("url");
    var form = $(".all-form")[0];
    var form_data = new FormData(form); 
    $.ajax({
        type: 'POST',
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
                $(currenttab).removeClass("active");
                $(currenttabview).removeClass("show active");
                $(tab).addClass("active");
                $(tabview).addClass("show active");
                if(currenttab == '.seo'){
                    $(".course-preview").html(data.html);
                }
                if(tab == '.finish'){
                    setTimeout(function(){
                        window.location = data.url;
                    }, 3000);
                }
            }
            if(data.status == 'errors'){
                toastr.error(data.message);
            }
        }
    }); 
});
$(document).on("click",".add-requirements",function(e){
    e.preventDefault();
    var requirement = $(".requirement").val();
    var html = '<li><input type="hidden" name="requirement_data[]" value="'+requirement+'"> '+requirement+'</li>';
    $(".bind-requirements").append(html);
    $(".requirement-data").val('');
});
$(document).on("click",".add-more-heading-feature",function(e){
    var mainHTML = $(".main-wrapper-for-heading-feature").html();
    $(".new-wrapper-for-heading-feature").append(mainHTML);
    $(".delete-html-btn").hide();
});
$(document).on("change",".course-provider",function(e){
    var course_provider = $(this).val();
    var inputHTML = '';
    if(course_provider == 1){
        inputHTML = '<label>Video ID</label><input type="text" class="form-control" placeholder="Video ID" name="video_id">';
    }else{
        inputHTML = '<label>Upload Video</label><input type="file" class="form-control" name="video_file">';
    }
    $(".media-inputs").html(inputHTML);
});
$(document).on("click",".previous",function(e){
    e.preventDefault();
    var previoustab = $(this).data("previoustab");
    var previoustabview = $(this).data("previoustabview");
    var currenttab = $(this).data("currenttab");
    var currenttabview = $(this).data("currenttabview");
    $(currenttab).removeClass("active");
    $(currenttabview).removeClass("show active");
    $(previoustab).addClass("active");
    $(previoustabview).addClass("show active");
});
$(document).on('click','.delete-data', function (e) {
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
});
$(document).on('change','.show-content-type-data',function(e){
    var content_type = $(this).val();
    var html = '';
    if(content_type == 'video_url'){
        html += '<label>Video URL</label><input type="text" class="form-control" placeholder="Video URL" name="video_url">';
    }else if(content_type == 'video_upload'){
        html += '<label>Video Upload</label><input type="file" class="form-control" name="video_upload">';        
    }else if(content_type == 'audio_upload'){
        html += '<label>Audio Upload</label><input type="file" class="form-control" name="audio_upload">';        
    }else if(content_type == 'audio_url'){
        html += '<label>Audio URL</label><input type="text" class="form-control" name="audio_url" placeholder="Audio URL">';        
    }else if(content_type == 'document_upload'){
        html += '<label>Document Upload</label><input type="file" class="form-control" name="document_upload">';        
    }else if(content_type == 'document_url'){
        html += '<label>Document URL</label><input type="text" class="form-control" name="document_url" placeholder="Document URL">';        
    }else if(content_type == 'image_url'){
        html += '<label>Image URL</label><input type="text" class="form-control" name="image_url" placeholder="Image URL">';        
    }else if(content_type == 'image_upload'){
        html += '<label>Image URL</label><input type="file" class="form-control" name="image_upload">';        
    }else if(content_type == 'iFrame'){
        html += '<label>Image URL</label><input type="text" class="form-control" name="iframe_url" placeholder="Link for IFrame">';        
    }
    $(".content-type-input").html(html);
});
$(document).on("click",".show-content-data",function(e){
    e.preventDefault();
    var id = $(this).data("id");
    var wrapper = $(this).data("wrapper");
    var modal = $(this).data("modal");
    var base_url = getCurrentUrl();
    $.ajax({
        type: "POST",
        url: base_url+'/show-content-data',
        data:{id:id},
        dataType: 'json',
        success: function(data){
            if(data.status == 'success'){
                $(modal).modal('show');
                $(wrapper).html(data.html);
            }
        }
    }); 
});
$(document).on("click",".search-courses",function(e){
    e.preventDefault();
    var text = $(".search_course").val();
    if(text != ''){
        text = text.replace(/\s+/g, '-').toLowerCase();
        var base_url = getCurrentUrl();
        window.location = base_url+'/course?search='+text;
    }else{
        $("#search-error").html('Please give any keyword')
    }
})
$(document).on("click",".get-review-type-wise",function(e){
    e.preventDefault();
    var type = $(this).data("type");
    var url = $(this).attr("href");
    $.ajax({
        type: "POST",
        url: url,
        data:{type:type},
        dataType: 'json',
        success: function(data){
            $(".append-dynamic-review").html(data.html);
        }
    }); 
});
