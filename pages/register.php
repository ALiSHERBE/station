<div class="row">
    <div class="col-md-12">
        <div class="py-4 text-center">
            <h2>Регистрация</h2>
            <p class="lead">Зарегистрируйтесь один раз, чтобы не вводить свои данные каждый раз!</p>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input class="form-control" type="text" autocomplete="off" name="login" id="login" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="pass" class="form-label">Пароль</label>
                    <input class="form-control" type="password" autocomplete="off" name="password" id="pass" required>
                </div>

                <div class="col-4 mb-3">
                    <label for="last_name" class="form-label">Фамилия</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" required>
                </div>

                <div class="col-4 mb-3">
                    <label for="first_name" class="form-label">Имя</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" required>
                </div>

                <div class="col-4 mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                    <input class="form-control" type="text" name="patronymic" id="patronymic" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="gender" class="form-label">Пол</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="1">Мужской</option>
                        <option value="2">Женский</option>
                    </select>
                </div>

                <div class="col-4 mb-3">
                    <label for="date_birth" class="form-label">Дата рождения</label>
                    <input class="form-control" type="text" name="date_birth" id="date_birth" required>
                </div>

                <div class="col-4 mb-3">
                    <label for="serie_passport" class="form-label">Номер документа</label>
                    <input class="form-control" type="text" name="serie_passport" id="serie_passport" required>
                </div>

                <div class="col-4 mb-3">
                    <label for="phone_number" class="form-label">Номер телефона</label>
                    <input class="form-control" type="text" name="phone_number" id="phone_number" required>
                </div>

                <div class="col-12">
                    <input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value="Зарегистрироваться">
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        $("#date_birth").inputmask("9999-99-99",{ "placeholder": "yyyy-mm-dd" });
        $("#serie_passport").inputmask("999999999");
        $("#phone_number").inputmask("99999999999");
    });
</script>