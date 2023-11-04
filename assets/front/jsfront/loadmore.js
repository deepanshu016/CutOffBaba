
    var baseURL = window.location.href;
    function loadmore(){
        
        var loadUrl = baseURL + "home/loadMore";
        var totalPages=$('#totalPages').val();
        var page=$('#page').val();
        if(page==totalPages){
            $('#loadmore').hide();
            return false;
        }
        hitURL = loadUrl;
        $.ajax({
        url:hitURL,
        data:{
          limit :$('#limit').val(),
          page:page
        },
        type:'get',
        dataType:'json',
        beforeSend: function () {
            $("#loadmore").attr("disabled", "disabled");
            $("#loadmore").text("Please Wait...");
        },
        success :function(data){
            $("#loadmore").removeAttr("disabled");
            $("#loadmore").text("Load More");
            var newHtml='';
            for(var i=0;i<data.total.length;i++){
                img_url=data.total[i].img_url;
                imgtheme=data.total[i].theme;
                photographer_name=data.total[i].photographer_name;
                newHtml+='<a href=' + baseURL + 'uploads/' + img_url + ' title="'+imgtheme+'" data-name="'+photographer_name+'" class="item">';
                newHtml+='<img src=' + baseURL + 'uploads/thumb/'+img_url+' alt="'+imgtheme+'">';
                newHtml+='<h4>'+photographer_name+'</h4>';
                newHtml+='</a>';                
            }
            $('#gallerycontainer').append(newHtml);
            $('#totalPages').val(data.totalPages)
            // $('#limit').val(data.limit)
            $('#page').val(data.page)
        }
    })
}