    <script src="<?=base_url('/')?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/css/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url('assets/admin/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url('/')?>assets/admin/js/app.js"></script>
    <script src="<?=base_url('assets/admin/js/toastr.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/prismjs/prism.js"></script>

    <!-- rater-js plugin -->
    <script src="<?=base_url('/')?>assets/admin/libs/rater-js/index.js"></script>
    <!-- rating init -->
    <script src="<?=base_url('/')?>assets/admin/js/pages/rating.init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
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
             CKEDITOR.replace('fees_description');
             CKEDITOR.replace('eligibility');
             CKEDITOR.replace('course_eligibility');
             CKEDITOR.replace('expected_salary');
             CKEDITOR.replace('course_opportunity');
             CKEDITOR.replace('course_fees');
            CKEDITOR.replace('fees_description');
            let id = $(this).attr('id');
             CKEDITOR.replace(id);
        });
        $('.datatables').DataTable({
            pagingType: 'full_numbers',
            lengthChange : true,
            searching: true,
            ordering: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    </script>
 <script>
     $(document).ready(function() {
         $('.js-example-basic-multiple').select2();
     });
     $('.keywords').tagify();
     $('.tags').tagify();
 </script>
    <?php $this->load->view('common/alert'); ?>
</body>

</html>