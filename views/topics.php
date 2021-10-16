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
                    $topics = MySql::connect()->prepare("SELECT * FROM topicos");
                    $topics->execute();
                    $topics = $topics->fetchAll();
                    foreach($topics as $key => $value){
                        $post_topic = MySql::connect()->prepare("SELECT * FROM posts");
                        $post_topic->execute();
                        $post_topic = $post_topic->fetchAll();
                ?>
                <tr>
                    <td><span><i data-feather="folder"></i></span></td>
                    <td><a href="<?php echo INCLUDE_PATH ?>posts">
                        <h4><?php echo $value['nome'] ?></h4>
                        <p><?php echo $value['descricao'] ?></p>
                    </a></td>
                    <td><?php echo count($post_topic); ?></td>
                    <td>0</td>
                    <td>
                        <h6><?php echo $value['criado'] ?></h6>
                        <div><label>Jewel</label><img src="https://secure.gravatar.com/avatar/29bcdc9972fc678d8c132abc15cce0a8?s=45&d=mm&r=g" /></div>
                    </td>
                </tr>
                <?php } ?>
            </table>
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