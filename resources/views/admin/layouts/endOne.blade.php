</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>



<!-- Page level custom scripts -->


<script src="{{ asset('adminTemplate/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminTemplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('adminTemplate/js/ruang-admin.min.js') }}"></script>
<script src="{{ asset('adminTemplate/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('adminTemplate/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('summernote/summernote-lite.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('adminTemplate/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminTemplate/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote();
    $('#summernote2').summernote();
    $('#dataTable').DataTable(); // ID From dataTable
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>


@notifyJs
</body>

</html>
