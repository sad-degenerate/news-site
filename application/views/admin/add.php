<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="topic">
                            </div>
                            <div class="form-group">
                                <label>Дата</label>
                                <input class="form-control" type="date" name="date">
                            </div>
                            <div class="form-group">
                                <label>Аннотация</label>
                                <input class="form-control" type="text" name="annotation">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea name="text" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input class="form-control" type="text" name="link">
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <input class="form-control" type="text" name="category">
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>