<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Новостной портал "All News"</h1>
                    <span class="subheading">На этом сайте вы можете ознакомиться с последними новинками новостей</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <?php if (empty($categories)): ?>
            <p>Список категорий пуст</p>
        <?php else: ?>
            <div class="post-preview">
                <p>Категории: </p>
                <p><a href="/">Все категории</a></p>
                <?php foreach ($categories as $category): ?>
                    <p><a href="/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></p>
                <?php endforeach; ?>
            </div>
            <hr>
        <?php endif; ?>
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($list)): ?>
                <p>Список новостей пуст</p>
            <?php else: ?>
                <?php foreach ($list as $val): ?>
                    <div class="post-preview">
                            <a href="/post/<?php echo $val['id']; ?>">
                                <h2 class="post-title"><?php echo htmlspecialchars($val['topic'], ENT_QUOTES); ?></h2>
                                <img width="100%" src="public/materials/<?php echo $val['id']; ?>.jpg" alt="image">
                                <hr>
                                <h5 class="post-subtitle"><?php echo htmlspecialchars($val['annotation'], ENT_QUOTES); ?></h5>
                                <p class="post-meta">Дата: <?php echo $val['date']; ?></p>
                            </a>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="clearfix">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>