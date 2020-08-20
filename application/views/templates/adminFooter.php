
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between mt-3">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y'); ?> </span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/js/vendor.bundle.base.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/off-canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/misc.js'); ?>"></script>
    <script src="<?= base_url('assets/js/rcrop.min.js') ?>"></script>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script>
      $(document).ready(function () {
        $('#example1').DataTable();

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
        }, 7000);

        $('.carousel').carousel();
        // $('#gambarCreate').rcrop({
        //   full : false,
        //   minSize : [288,172.8],
        //   maxSize : [288,172.8],
        //   preserveAspectRatio : false,
        //   inputs : true,
        //   inputsPrefix : '',
        //   grid : false,
        //   preview : {
        //     display : true,
        //     size : [288, 288],
        //     wrapper : ''
        //   }
        // });
        

        CKEDITOR.replace('ckeditor', {
          
          height : '200px'
        });
      });          
    </script>
  </body>
</html>