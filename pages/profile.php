<div class="row">
	<div class="col-md-12">
		<div class="py-4 text-center">
			<h2>Мой профиль</h2>
		</div>
		<div>
			<form method="POST">
				<div class="row">
					<div class="col-12 mb-3">
						<label for="login" class="form-label">Логин</label>
						<input class="form-control" type="text" autocomplete="off" name="login" id="login" disabled value="<?php echo $userdata['user_login'] ?>">
					</div>

					<div class="col-4 mb-3">
						<label for="last_name" class="form-label">Фамилия</label>
						<input class="form-control" type="text" name="last_name" id="last_name" disabled value="<?php echo $userdata['last_name'] ?>">
					</div>

					<div class="col-4 mb-3">
						<label for="first_name" class="form-label">Имя</label>
						<input class="form-control" type="text" name="first_name" id="first_name" disabled value="<?php echo $userdata['first_name'] ?>">
					</div>

					<div class="col-4 mb-3">
						<label for="patronymic" class="form-label">Отчество</label>
						<input class="form-control" type="text" name="patronymic" id="patronymic" disabled value="<?php echo $userdata['patronymic'] ?>">
					</div>

					<div class="col-12 mb-3">
						<label for="gender" class="form-label">Пол</label>
						<select name="gender" class="form-control" id="gender" disabled>
							<option value="1"
								<?php if ($userdata['gender'] == 1):?>
                                    selected
								<?php endif?>>Мужской</option>
							<option value="2"
								<?php if ($userdata['gender'] == 2):?>
                                    selected
								<?php endif?>>Женский</option>
						</select>
					</div>

					<div class="col-4 mb-3">
						<label for="date_birth" class="form-label">Дата рождения</label>
						<input class="form-control" type="text" name="date_birth" id="date_birth" disabled value="<?php echo $userdata['date_birth'] ?>">
					</div>

					<div class="col-4 mb-3">
						<label for="serie_passport" class="form-label">Номер документа</label>
						<input class="form-control" type="text" name="serie_passport" id="serie_passport" disabled value="<?php echo $userdata['serie_passport'] ?>">
					</div>

					<div class="col-4 mb-3">
						<label for="phone_number" class="form-label">Номер телефона</label>
						<input class="form-control" type="text" name="phone_number" id="phone_number" disabled value="<?php echo $userdata['phone_number'] ?>">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>