<?php if(isset($error)): ?>
    <p class="alert alert-danger"><?php echo $error ?></p>
<?php endif ?>
<?php if(isset($message)): ?>
    <p class="alert alert-success"><?php echo $message ?></p>
<?php endif ?>
<div class="row container">
	<div class="container col-md-8">
		<table class="table table-bordered table-condensed">
			<thead>
				<th>Spam Word</th>
				<th>Delete</th>
			</thead>
			<tbody>
				<?php foreach($spams as $id => $spam): ?>
				    <tr>
						<td><?php echo $spam ?></td>
						<td><a href="/comment/deletespam/<?php echo $id ?>"><i class="fa fa-trash"></i> Delete</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<form method="post" action="/comment/createspam" class="col-md-6">
    <div class="form-group">
        <label for="word">Enter spam word</label>
        <input class="form-control" type="text" id="word" name="word" placeholder="Enter spam word" /><br>
        <button type="submit" name="create_spam_submitted" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>