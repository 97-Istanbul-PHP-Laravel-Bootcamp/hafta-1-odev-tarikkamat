  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Do it today, or regret it tomorrow.
    </div>
    <!-- Default to the left -->
    <strong>&copy; 2021 <a href="../pages/home.php">E-Commerce</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../theme_folder/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../theme_folder/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../theme_folder/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../theme_folder/dist/js/demo.js"></script>

<script src="../theme_folder/ckeditor/ckeditor.js"></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
</body>
</html>