<div class="popular my-5">
                <ul>
                    <?php foreach ($posts->readPostTags() as  $post_tags) : ?>
                        <li><a href="single-news.php?tags=<?php echo $post_tags['tags'] ?>"><?php echo $post_tags['tags'] ?></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <div class="forma">
                <h4>KONTAKTIRAJ NAS</h4>
                <form action="" method="post">

                    <div class="form-group p-1">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>

                    <div class="form-group p-1">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <small class="form-text text-muted">Vaš email je siguran i neće biti dijeljen</small>
                    </div>

                    <div class="form-group p-1">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" name="poruka" rows="3"></textarea>
                    </div>


                    <button type="submit" name="message" class="btn btn-sm btn-primary m-1">Submit</button>
                </form>
            </div>