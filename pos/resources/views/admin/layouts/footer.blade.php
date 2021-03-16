  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset('admintemplate/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('admintemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admintemplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('admintemplate/js/ruang-admin.min.js')}}"></script>
  <script src="{{ asset('admintemplate/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('admintemplate/js/demo/chart-area-demo.js')}}"></script> 
   <script src="{{ asset('admintemplate/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('admintemplate/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> 
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</body>
<script>
function confirmation(){
    return confirm("Are you sure you want to delete?");
}
$(document).ready(function() {
  $('#textdesc').summernote();
  $('#addinfo').summernote();
});

                  </script>
</html>