<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Добавление пункта назначения</h2>
		</div>

		<form method="POST" action="/admin/insert.php">
			<input type="hidden" value="destinations" name="table">
			<div class="row">
				<div class="col-12 mb-3">
					<label for="destination" class="form-label">пункт назначения</label>
					<input class="form-control" type="text" autocomplete="off" name="destination" id="destination" required>
				</div>

				<div class="col-12">
					<input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Добавить">
				</div>
			</div>
		</form>
	</div>
</div>