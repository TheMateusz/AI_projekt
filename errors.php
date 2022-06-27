<?php  if (count($errors) > 0) : ?>
    <div class="error alert alert-danger" role="alert">
		<?php foreach ($errors as $error) : ?>
			<p class="errorwiad">● <?php echo $error ?></p>
		<?php endforeach ?>
    </div>
<?php  endif ?>
