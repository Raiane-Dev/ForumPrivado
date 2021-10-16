<section class="banner-posts">
    <div class="banner">
       <div class="form-banner">
            <i data-feather="search"></i><input type="search" placeholder="Search...">
            <label><strong>Popular Topics</strong></label>
            <label>Popular Topics</label>
            <label>Popular Topics</label>
        </div>
    </div>

    <div class="range-banner">
        <div class="range-info">
            <a class="breadcumb" href="">Home ></a>
            <a class="breadcumb" href="">Forum</a>
        </div>
        <div class="range-info">
            <p><i data-feather="clock"></i>  Updated on August 18, 2021</p>
        </div>
    </div>
</section>

<section class="posts">
    <div class="posts">
        <div class="posts-list">
            <table>
                <tr>
                    <td>Forum</td>
                    <td>Topics</td>
                    <td>Replies</td>
                    <td>Last</td>
                    <td>Author</td>
                </tr>
            
            <?php
                $posts = MySql::connect()->prepare("SELECT * FROM posts");
                $posts->execute();
                $posts = $posts->fetchAll();
                foreach($posts as $key => $value){
                    $user = MySql::connect()->prepare("SELECT * FROM usuarios");
                    $user->execute();
                    $user = $user->fetch();
                    $comments_total = MySql::connect()->prepare("SELECT * FROM comentarios");
                    $comments_total->execute();
                    $comments_total = $comments_total->fetchAll();
            ?>
                <tr>
                    <td><img src="<?php echo INCLUDE_PATH ?>images/<?php echo $user['img']; ?>" /></td>
                    <td><a href="<?php echo INCLUDE_PATH ?>single_post?id=<?php echo $value['id']; ?>">
                        <h4><?php echo $value['title'] ?></h4>
                        <p><?php echo $value['description'] ?></p>
                    </a></td>
                    <td><?php echo count($comments_total); ?></td>
                    <td><?php echo count(explode(', ', $value['people'])); ?></td>
                    <td>
                        <?php
                            if($value['close_in'] > date('Y-m-d')){
                                echo '<h5 class="aberto">Aberto <i class="aberto" data-feather="clock"></i></h5>';
                            }else if($value['close_in'] < date('Y-m-d')){
                                echo '<h5 class="fechado">Fechado <i class="fechado" data-feather="clock"></i></h5>';
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </table>
            <div class="total">
                <p>Viewing 2 topics - 1 through 2 (of <?php echo count($posts); ?> total)</p>
            </div>
        </div>
        <div class="posts-news">
            <h2>Recent Topics</h2>
            <ul>
                <li><i data-feather="message-circle"></i> Some Questions about the theme</li>
                <li><i data-feather="message-circle"></i> Some Questions about the theme</li>
            </ul>

            <div class="divisao"></div>

            <h2>Recent Topics</h2>
            <ul>
                <li><i data-feather="message-circle"></i> Some Questions about the theme</li>
            </ul>
        </div>
    </div>
</section>