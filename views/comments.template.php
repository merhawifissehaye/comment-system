<html>

	<head>
		<title>Commenting System</title>
		<link rel="stylesheet" type="text/css" href="">
	</head>

<body>

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
	        <div class="clearfix comment-item active">
	          <div class="header">
	            <input type="checkbox" id="new-flash" class="pull-left" />
	            <h1><label for="new-flash">NEWSFLASH: Alien Life Found</label></h1>
	          </div>
	          <div class="comment-content">
	            <div class="avatar pull-left">
	              <img src="https://image.flaticon.com/icons/svg/138/138662.svg" width="60" alt="" />
	            </div>
	            <div class="text-content pull-left">
	              <div class="title">
	                <h3>Earthlings</h3> . <span>3 days ago</span>
	              </div>
	              <p>Make us proud</p>
	              <div class="buttons">
	                <a href="#"><i class="fa fa-check"></i> Approve</a>
	                <a href="#"><i class="fa fa-ban"></i> Spam</a>
	                <a href="#"><i class="fa fa-trash"></i> Delete</a>
	              </div>
	            </div>
	          </div>
	        </div>
	        
	        <div class="clearfix comment-item">
	          <div class="header">
	            <input type="checkbox" id="new-flash" class="pull-left" />
	            <h1><label for="new-flash">NEWSFLASH: Alien Life Found</label></h1>
	          </div>
	          <div class="comment-content">
	            <div class="avatar pull-left">
	              <img src="https://image.flaticon.com/icons/svg/138/138662.svg" width="60" alt="" />
	            </div>
	            <div class="text-content pull-left">
	              <div class="title">
	                <h3>Earthlings</h3> . <span>3 days ago</span>
	              </div>
	              <p>Make us proud</p>
	              <div class="buttons">
	                <a href="#"><i class="fa fa-check"></i> Approve</a>
	                <a href="#"><i class="fa fa-ban"></i> Spam</a>
	                <a href="#"><i class="fa fa-trash"></i> Delete</a>
	              </div>
	            </div>
	          </div>
	        </div>
	        
	      </div>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="pending">
	      Pending Screen
	    </div>
	    <div role="tabpanel" class="tab-pane" id="span">
	      Spam Screen
	    </div>
	  </div>

	</div>
</body>
</html>