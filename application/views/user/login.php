<?php echo form_open('user/login'); ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
        <fieldset>
            <h2 class="text-center mb-4"><?= $title; ?></h2>
            <div class="form-floating mb-3">
                <input type="text" name="username" id="floatingInput" class="form-control" placeholder="Enter Username" required autofocus>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" id="floatingPassword" class="form-control" placeholder="Enter Password" required autofocus>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid mt-4">
               <button type="submit" class="btn btn-lg btn-primary">Login</button>

            </div>
                
        </fieldset>
    </div>

  </div>
        
	
<?php echo form_close(); ?>