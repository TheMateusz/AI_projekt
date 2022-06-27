<?php  if (count($mfl) > 0) : ?>
    <div class="error alert alert-danger" role="alert">
		<?php foreach ($mfl as $mflt) : ?>
			<p class="errorwiad">● <?php echo $mflt ?></p>
		<?php endforeach ?>
    </div>
<?php  endif ?>
