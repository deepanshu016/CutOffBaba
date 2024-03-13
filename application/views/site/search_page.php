<?php $this->load->view('site/header'); ?>
<main class="snnxbgs">
    <section class="serchPages">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col">
                <form action="<?= base_url('search-content'); ?>" id="searchForm" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control confoForm" aria-label="" placeholder="Search your thing...." name="keyword">
                        <button type="submit"><span class="input-group-text norigt ekone"> <img src="<?=base_url('assets/site/img/serchs.png')?>" alt=""> </span></button>
                        <span class="input-group-text norigt"> <img src="<?=base_url('assets/site/img/audio.png')?>" alt=""> </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="search-data"></div>
    </div>
    </section>
</main>
<?php $this->load->view('site/footer'); ?>
<script>
    $("body").on("submit","#searchForm",function(e){
        e.preventDefault();
        var currentWrapper = $(this);
        var url = currentWrapper.attr('action');
        var method = currentWrapper.attr('method');
        const form = document.getElementById('searchForm');
        const formData = new FormData(form);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            if(d.status === 200){
                $(".search-data").html(d.html);
            }else{
                CommonLib.notification.error(d.message);
            }
        }).catch(e=>{
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>