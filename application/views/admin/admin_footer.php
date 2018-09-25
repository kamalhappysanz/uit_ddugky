
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                      <a href="https://happysanztech.com" target="_blank">  Happy Sanz Tech </a> &copy; <?php echo date('Y'); ?>
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <script>
        $('#example').DataTable();
        function logout(){
  swal({
      title: 'Are you sure?',
      text: "You Want to logout !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm!'
  }).then(function(){
    window.location.href='<?php echo base_url(); ?>adminlogin/logout';
  }).catch(function(reason){

  });
}
$("input").on("keypress", function(e) {
        if (e.which === 32 && !this.value.length)
            e.preventDefault();
    });
        </script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/admin/js/vendor.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
       <script src="<?php echo base_url(); ?>assets/admin/js/pages/dashboard.init.js"></script>

    </body>
</html>
