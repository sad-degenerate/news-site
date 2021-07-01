<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/editCategory/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Название категории</label>
                                <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Описание категории</label>
                                <input class="form-control" type="text" name="description" value="<?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>