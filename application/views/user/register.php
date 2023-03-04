
<?php echo form_open('user/register'); ?>
	<div class="row">
		<div class="col-md-4 mx-auto">
		    <?php echo validation_errors(); ?>
			<h2 class="text-center"><?= $title; ?></h2>
			<div class="form-group">
				<label class="form-label mt-4" for="name">Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>
			<div class="form-group">
				<label class="form-label mt-4">Zipcode</label>
				<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
			</div>
			<div class="form-group">
				<label class="form-label mt-4">Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label class="form-label mt-4">Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label class="form-label mt-4">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label class="form-label mt-4">Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
			<div class="d-grid mt-4">
			<button type="submit" class="btn btn-lg btn-primary">Submit</button>

			</div>
		</div>
	</div>
<?php echo form_close(); ?>