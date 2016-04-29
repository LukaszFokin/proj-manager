<div class="board-phase-list">
	<div class="board-phase-list-content col-sm-12" id="{{ $taskStatus->id }}">
		<div class="board-phase-list-header">
			<h4>
				<button type="button" class="btn btn-circle-micro btn-add-activity" data-toggle="modal" data-target="#modal-new-board" data-id="{{ $taskStatus->id }}">
					<i class="fa fa-lg fa-plus-circle"></i>
				</button>
				{{ $taskStatus->name }}
			</h4>
		</div>

		<div class="board-phase-column" id="board-phase-column-{{ $taskStatus->id }}">
			@each('boards.board', $taskStatus->tasks->all(), 'task')
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