<div class="px-4 py-5 my-5 text-center">
	<h1 class="display-5 fw-bold"><?php echo $title?></h1>
	<div class="col-lg-6 mx-auto">
		<p class="lead mb-4"><?php echo $description?></p>
		<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
			<?php if ($link):?>
				<a href="<?php echo $link?>" class="btn btn-primary btn-lg px-4 gap-3"><?php echo $link_text?></a>
			<?php else:?>
				<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary btn-lg px-4 gap-3">Вернуться</a>
			<?php endif?>
		</div>
	</div>
</div>