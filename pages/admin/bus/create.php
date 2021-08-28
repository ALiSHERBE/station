<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Добавление</h2>
		</div>

		<form method="POST" action="/admin/insert.php">
			<input type="hidden" value="buses" name="table">
			<div class="row">
				<div class="col-12 mb-3">
					<label for="brand" class="form-label">Марка автобуса</label>
					<input class="form-control" type="text"  name="brand" id="brand" required>
				</div>


                <div class="col-12 mb-3">
                    <label for="number" class="form-label">Номер автобуса</label>
                    <input class="form-control" type="text"  name="number" id="number" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="driver" class="form-label">Водитель автобуса</label>
                    <input class="form-control" type="text"  name="driver" id="driver" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="number_seats" class="form-label">Число мест</label>
                    <input class="form-control" type="text"  name="number_seats" id="number_seats" required>
                </div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Добавить">
				</div>
			</div>
		</form>
	</div>
</div>