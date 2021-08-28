<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Редактирование пункта назначения</h2>
		</div>

		<form method="POST" action="/admin/update.php">
			<input type="hidden" value="destinations" name="table">
			<input type="hidden" value="<?php echo $destination['id_destination'] ?>" name="id_item">
			<input type="hidden" value="id_destination" name="id_table">

			<div class="row">
				<div class="col-12 mb-3">
					<label for="destination" class="form-label">пункт назначения</label>
					<input class="form-control" type="text" autocomplete="off" name="destination" id="destination" required value="<?php echo $destination['destination'] ?>">
				</div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Обновить">
				</div>
			</div>
		</form>
	</div>
</div>