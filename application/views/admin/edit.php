<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="topic" value="<?php echo htmlspecialchars($data['topic'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Дата</label>
                                <input class="form-control" type="date" name="date" value="<?php echo htmlspecialchars($data['date'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Аннотация</label>
                                <input class="form-control" type="text" name="annotation" value="<?php echo htmlspecialchars($data['annotation'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea name="text" rows="5" class="form-control"><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input class="form-control" type="text" name="link" value="<?php echo htmlspecialchars($data['link'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <input type="text" class="form-control" name="category" value="<?php echo htmlspecialchars($category, ENT_QUOTES); ?>">
                            </div>
                            <div>
                                <label>Изображение</label>
                                <input type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>