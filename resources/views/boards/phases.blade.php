<div class="board-phase-list">
	<div class="board-phase-list-content col-sm-12" id="{{$status->id}}">
		<div class="board-phase-list-header">
			<h4>
				<button type="button" class="btn btn-circle-micro btn-add-activity" data-toggle="modal" data-target="#modal-new-board" data-id="{{ $status->id }}">
					<i class="fa fa-lg fa-plus-circle"></i>
				</button>
				{{$status->name}}
			</h4>
		</div>

		<div class="board-phase-column">
			@each('boards.board',$status->tasks->all(), 'board')
		</div>

		<div class="modal fade" id="modal-new-board" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Add new board</h4>
					</div>
					<div class="modal-body">
						{!! BootForm::open(['route' => 'phases.store', 'name' => 'add-task']) !!}
							{!! BootForm::text('id') !!}
							{!! BootForm::text('name') !!}
							{!! BootForm::textarea('description') !!}
							{!! BootForm::hidden('task_status_id') !!}
						{!! BootForm::close() !!}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-md btn-primary" id="btn-add-task" data-loading-text="<i class='fa fa-spinner fa-spin fa-md'></i> Wait">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@section('page-script')
	<script>
		$(document).ready(function() {
			$('#modal-new-board').on('show.bs.modal', function(e) {
				$(this).find('input[name="task_status_id"]').val($(e.relatedTarget).data('id'));
			});

			$('#btn-add-task').click(function(){
				var form = $('form[name="add-task"]');
				var button = $(this);

				button.button('loading');

				$.ajax({
					type: 'POST',
					url: '{{ route('tasks.store') }}',
					data: {
						_token: '{{ csrf_token() }}',
						id: $('input[name="id"]').val(),
						name: $('input[name="name"]').val(),
						description: $('input[name="description"]').text(),
						task_status_id: $('input[name="task_status_id"]').val()
					},
					success: function(data) {

					},
					error: function(data) {
						var span = $('<span></span>').addClass('help-block');

						$.each(data.responseJSON, function(input, error) {
							var div = $('input[name="'+input+'"]').closest('.form-group');
							div.addClass('has-error');
							div.append(span.html(error));
						});
					},
					complete: function() {
						button.button('reset');
					},
				});
			});
		})
	</script>
@stop