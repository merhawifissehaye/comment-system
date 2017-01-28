<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
	<li role="presentation"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
	<li role="presentation" class="active"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
	<li role="presentation"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Pending</a></li>
	<li role="presentation"><a href="#span" aria-controls="settings" role="tab" data-toggle="tab">Spam</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	<div role="tabpanel" class="tab-pane" id="all">
	  Home Screen
	</div>
	<div role="tabpanel" class="tab-pane active" id="approved">
	  <div>
		<div class="clearfix" id="approved-manager-controls">
		  <input type="checkbox" name="approve-all" class="pull-left" />
		  <div class="btn-group pull-left" role="group" aria-label="...">
			<button type="button" class="btn btn-default">Approve</button>
			<button type="button" class="btn btn-default">Spam</button>
			<button type="button" class="btn btn-default">Delete</button>
		  </div>
		  <form action="" class="form-inline pull-left">
			<div class="form-group">
			  <input type="text" placeholder="Search" class="form-control" />
			</div>
		  </form>
		</div>

		<?php foreach($comments as $comment): ?>
			<?php include 'comment-item.tmp.php'; ?>
		<?php endforeach; ?>
	  </div>
	</div>
	<div role="tabpanel" class="tab-pane" id="pending">
	  Pending Screen
	</div>
	<div role="tabpanel" class="tab-pane" id="span">
	  Spam Screen
	</div>
  </div>

	<?php include('new-comment-form.tmp.php'); ?>

</div>