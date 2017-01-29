<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
	<li role="presentation"><a href="#blogs" aria-controls="all" role="tab" data-toggle="tab">Blogs</a></li>
	<li role="presentation"><a href="#comments" aria-controls="all" role="tab" data-toggle="tab">All Comments</a></li>
	<li role="presentation" class="active"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
	<li role="presentation"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Pending</a></li>
	<li role="presentation"><a href="#span" aria-controls="settings" role="tab" data-toggle="tab">Spam</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	<div role="tabpanel" class="tab-pane" id="blogs">
	  Blogs Screen
	</div>
	<div role="tabpanel" class="tab-pane" id="comments">
		<?php include 'comments.tmp.php' ?>
	</div>
	<div role="tabpanel" class="tab-pane active" id="approved">
	  <?php include 'approved.tmp.php' ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="pending">
	  Pending Screen
	</div>
	<div role="tabpanel" class="tab-pane" id="span">
	  Spam Screen
	</div>
  </div>

	<?php include('comment/new-comment-form.tmp.php'); ?>

</div>