<!-- ==================================== SIDE NAV ================================= -->
<div class="side-nav" id="side-nav">

    <div class="inside">
        <ul class="categories-side">

            <?php foreach ($category->getCategories() as  $cat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="category.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['ime']; ?></a>
                </li>
                
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- ==================================== SIDE NAV ================================= -->