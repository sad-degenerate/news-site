<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Новостной портал "All News"</h1>
                    <span class="subheading">На этом сайте вы можете ознакомиться с последними новинками новостей</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h1><?php echo htmlspecialchars($data['topic'], ENT_QUOTES); ?></h1>
            <span class="subheading">Категория: <?php echo htmlspecialchars($category['name'], ENT_QUOTES); ?></span>
            <br><br>
            <h5><?php echo htmlspecialchars($data['annotation'], ENT_QUOTES); ?></h5>
            <hr>
            <img width="100%" src="../public/materials/<?php echo $data['id']; ?>.jpg" alt="image">
            <hr>
            <p><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></p>
            <hr>
            <a href="<?php echo htmlspecialchars($data['link'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($data['link'], ENT_QUOTES); ?></a>
            <hr>
            <br>
            <?php if (isset($_SESSION['id'])): ?>
            <form action="/post/<?php echo $this->route['id']; ?>" method="post">
                <div class="form-group">
                    <label>Оставьте свой отзыв: </label>
                    <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="send">Отправить</button>
            </form>
            <?php else: ?>
                <h2>Войдите, чтобы оставлять комментарии</h2>
            <?php endif; ?>
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <hr>
                    <h5><?php echo $comment['login']; ?>:</h5>
                    <p><?php echo $comment['comment']; ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>Оставьте комментарий первым!</h3>
            <?php endif; ?>
        </div>
    </div>
</div>