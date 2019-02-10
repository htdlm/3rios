<!-- Ventana Modal -->
<div class="modal fade" id="ventana">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- HEADER -->
			<div class="modal-header">
				<h2 class="modal-title">@yield('titulo')</h2>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				@yield('body')
			</div>
			<!-- FOOTER -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
