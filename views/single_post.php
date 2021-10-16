<?php
    if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $post_single = MySql::connect()->prepare("SELECT * FROM posts WHERE id = $id");
    $post_single->execute();
    $post_single = $post_single->fetch();
    
    $post_user = MySql::connect()->prepare("SELECT * FROM usuarios WHERE id = $post_single[id_user] ");
    $post_user->execute();
    $post_user = $post_user->fetch();

    $post_comments = MySql::connect()->prepare("SELECT * FROM comentarios WHERE post_from = $post_single[id]");
    $post_comments->execute();
    $post_comments = $post_comments->fetch();

    }else{
        die('Esse post não existe!');
    }

    $arrayPeoples = explode(', ', $post_single['people']);
?>
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

<section class="post-single">
    <div class="post-single">
        <div class="post-text">
            <div class="info">
                <div class="info-user">
                    <div><img src="<?php echo INCLUDE_PATH ?>images/<?php echo $post_user['img'] ?>" /></div>
                    <div><h6> <?php echo $post_user['nome'] ?></h6> <label><i data-feather="coffee"></i> <?php echo $post_user['email'] ?></label> <label><i data-feather="calendar"></i> <?php echo $post_single['close_in'] ?></label> </div>
                </div>
                <div class="info-post">
                <?php
                    if(in_array($_SESSION['id_user'], $arrayPeoples) || in_array('public', $arrayPeoples)){
                ?>
                    <h2><?php echo $post_single['title']; ?></h2>
                    <p><?php echo $post_single['description'] ?></p>
                    <a target="_blank" href="<?php echo $post_single['archive']; ?>"><h6><i data-feather="file"></i> File Management<h6></a>
                </div>
            </div>


            <div class="comments">
                <?php
                    $comment = MySql::connect()->prepare("SELECT * FROM comentarios WHERE post_from = $post_single[id]");
                    $comment->execute();
                    $comment = $comment->fetchAll();
                    foreach($comment as $key => $value){
                        $user_comment = MySql::connect()->prepare("SELECT * FROM usuarios");
                        $user_comment->execute();
                        $user_comment = $user_comment->fetch();
                ?>
                <div class="user-comment">
                    <div><img src="<?php echo INCLUDE_PATH ?>images/<?php echo $user_comment['img']; ?>" /></div>
                    <div><h6> <?php echo $user_comment['nome']; ?></h6> <label><i data-feather="coffee"></i> <?php echo $value['file'] ?></label> <label><i data-feather="calendar"></i> <?php echo $value['created'] ?></label>
                         <p><?php echo $value['comment']; ?></p></div>
                </div>
                <?php } ?>

                <?php
                if(isset($_POST['comentar'])){
                    $user_from = $_SESSION['id_user'];
                    $post_from = $post_single['id'];
                    $title = $_POST['title'];
                    $comment = $_POST['comment'];
                    $files = $_FILES['files'];
                    $created = time();
               
                    move_uploaded_file($files['tmp_name'], BASE_DIR.$files['name']);

                    $new_comment = MySql::connect()->prepare("INSERT INTO comentarios VALUES (null, ?, ?, ?, ?, ?, ?)");
                    $new_comment->execute(array($user_from, $post_from, $title, $comment, $files['name'], $created));
                    header(INCLUDE_PATH);
                }
                ?>
                <?php
                    if($post_single['close_in'] > date('Y-m-d')){
                ?>
                <div class="create-comment">
                    <div class="form-comment">
                        <form method="post" enctype="multipart/form-data">
                            <input type="text" name="title" placeholder="Title">
                            <textarea name="comment" placeholder="Message..."></textarea>
                            <input name="files" type="file" value="Enviar arquivo" />
                            <input name="comentar" type="submit" value="comentar" />
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php }else{
            echo '<div class="permission">Você não tem permissão de ver este tópico!</div></div></div></div>';
        }
        ?>
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
