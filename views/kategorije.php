<div class="swiper-categories">

    <div class="categories gray">
        <ul class="nav justify-content-center" style="overflow-x:auto;">
            <?php foreach ($category->getCategories() as  $cat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="category.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['ime']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>