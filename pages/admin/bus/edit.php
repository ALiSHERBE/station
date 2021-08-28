<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Редактирование</h2>
		</div>

		<form method="POST" action="/admin/update.php">
			<input type="hidden" value="buses" name="table">
			<input type="hidden" value="<?php echo $bus['id_bus'] ?>" name="id_item">
			<input type="hidden" value="id_bus" name="id_table">

			<div class="row">
                <div class="col-12 mb-3">
                    <label for="brand" class="form-label">Марка автобуса</label>
                    <input class="form-control" type="text"  name="brand" id="brand" required value="<?php echo $bus['brand'] ?>">
                </div>

                <div class="col-12 mb-3">
                    <label for="number" class="form-label">Номер автобуса</label>
                    <input class="form-control" type="text"  name="number" id="number" required value="<?php echo $bus['number'] ?>">
                </div>

                <div class="col-12 mb-3">
                    <label for="driver" class="form-label">Водитель автобуса</label>
                    <input class="form-control" type="text"  name="driver" id="driver" required value="<?php echo $bus['driver'] ?>">
                </div>

                <div class="col-12 mb-3">
                    <label for="number_seats" class="form-label">Число мест</label>
                    <input class="form-control" type="text"  name="number_seats" id="number_seats" required value="<?php echo $bus['number_seats'] ?>">
                </div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Обновить">
				</div>
			</div>
		</form>
	</div>
</div>