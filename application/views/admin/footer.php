<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                 ©  <script>document.write(new Date().getFullYear())</script>       CUTOFF BABA.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Teach Mee Edtech Ventures Pvt. Ltd.
                </div>
            </div>
        </div>
    </div>
</footer>
        </div>
        <!-- end main content-->

    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <script>
         $("textarea").each(function () {
            // let id = $(this).attr('id');
           // CKEDITOR.replace(id, options);
            CKEDITOR.replace('fees_description');
        // CKEDITOR.replace('about_us_editor')
        // CKEDITOR.replace('fees_description');
        // CKEDITOR.replace('return_refund_editor');
        // CKEDITOR.replace('privacy_policy_editor');
        });
        
        $('#customerTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });

    </script>
    <?php $this->load->view('common/alert'); ?>
</body>

</html>