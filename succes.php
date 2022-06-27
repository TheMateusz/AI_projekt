<?php  if (count($succes) > 0) : ?>
    <div class="error alert alert-success" role="alert">
		<?php foreach ($succes as $succe) : ?>
			<p class="errorwiad">● <?php echo $succe ?></p>
		<?php endforeach ?>
    </div>
<?php  endif ?>
