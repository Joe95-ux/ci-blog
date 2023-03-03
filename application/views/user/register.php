
<?php echo form_open('user/register'); ?>
	<div class="row">
		<div class="wrapper-enclosure-login">
		    <?php echo validation_errors(); ?>
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label class="form-label mt-4" >Name</label>
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
			<button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>