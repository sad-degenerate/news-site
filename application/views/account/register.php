<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Регистрация</div>
        <div class="card-body">
            <form action="/account/register" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Почта</label>
                    <input class="form-control" type="text" name="mail">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="send">Регистрация</button>
                <hr>
                <div class="form-group">
                    <p>Уже есть аккаунт? Тогда - <a href="/account/signIn">войдите</a>.</p>
                </div>
            </form>
        </div>
    </div>
</div>