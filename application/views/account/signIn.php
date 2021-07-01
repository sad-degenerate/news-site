<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Вход</div>
        <div class="card-body">
            <form action="/account/signIn" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="send">Вход</button>
                <hr>
            </form>
            <div class="form-group">
                <p>Ещё нет аккаунта? Тогда - <a href="/account/register">зарегистрируйтесь</a>.</p>
            </div>
        </div>
    </div>
</div>