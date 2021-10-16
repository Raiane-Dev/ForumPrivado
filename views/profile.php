<?php

?>
<section class="banner-profile">
    <div class="banner-profile">
        <h1>Seja bem vindo, Raiane!</h1>
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

<section class="profile">
    <div class="profile">
        <div class="profile-menu">
            <nav>
                <ul>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon.png" /><a href="<?php echo INCLUDE_PATH ?>profile?general"> General <i data-feather="chevron-right"></i></a></li>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon2.png" /><a href="<?php echo INCLUDE_PATH ?>profile?create"> Create Post <i data-feather="chevron-right"></i></a></li>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon3.png" /><a href="#"> Create Topic <i data-feather="chevron-right"></i></a></li>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon4.png" /><a href="<?php echo INCLUDE_PATH ?>profile?invitation"> Participating <i data-feather="chevron-right"></i></a></li>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon5.png" /><a href="<?php echo INCLUDE_PATH ?>posts"> Posts <i data-feather="chevron-right"></i></a></li>
                    <li><img src="<?php echo INCLUDE_PATH ?>images/icon6.png" /><a href="<?php echo INCLUDE_PATH ?>topics"> Logout <i data-feather="chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
        <div class="area-profile">

            <?php if(isset($_GET['general'])){ ?>
            <div class="general">
                <div><img src="<?php echo INCLUDE_PATH ?>images/<?php echo $_SESSION['img']; ?>" /></div>
                <div><h6><?php echo $_SESSION['nome'] ?></h6>
                <p><?php echo $_SESSION['email']; ?></p></div>
            </div>
            <?php } ?>

            <?php if(isset($_GET['invitation'])){ ?>
            <div class="invitation">
                <table>
                <tr>
                    <td>Forum</td>
                    <td>Topics</td>
                    <td>Replies</td>
                    <td>Last</td>
                    <td>#</td>
                </tr>
            
            <?php
                $posts = MySql::connect()->prepare("SELECT * FROM posts");
                $posts->execute();
                $posts = $posts->fetchAll();
                foreach($posts as $key => $value){
                    $arrayPeoples = explode(', ', $value['people']);
                    if(in_array($_SESSION['id_user'], $arrayPeoples)){
            ?>
                <tr><a href="<?php echo INCLUDE_PATH ?>single_post?id=<?php echo $value['id']; ?>">
                    <td><img src=""></td>
                    <td>
                        <h4><?php echo $value['title'] ?></h4>
                        <p><?php echo $value['description'] ?></p>
                    </td>
                    <td><?php ?></td>
                    <td><?php echo count($arrayPeoples); ?></td>
                    <td>
                        <form method="post">
                        <input style="background-color:#ff5858;" type="submit" name="reject" value="reject" />
                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>" />
                        </form>
                    </td>
                </a></tr>
            <?php }} ?>
                </table>
            </div>
            <?php } ?>

            <?php if(isset($_GET['create'])){ ?>
                <div class="create">
                    <form method="post" enctype="multipart/form-data">
                        <label>Title</label>
                        <input type="text" name="title" />
                        
                        <label>Description</label>
                        <input type="text" name="description" />

                        <input type="file" name="archive" />

                        <div class="participants">
                            <div class="group">
                                <div><label>Participants</label>
                                <input type="text" name="buscar" id="buscar"/></div> <div><button onclick="return keyClick();"><i data-feather="search"></i></button></div>
                            </div>
                            <div class="group-participants">
                            <ul id="resultado" class="resultado">
                                <li>
                                    <figure><img src="<?php echo INCLUDE_PATH ?>images/community.png" /></figure>
                                    <label>Public</label>
                                    <p>Toda a comunidade.</p>
                                    <span class="button"><input type="checkbox" name="people[]" value="public" /></span>
                                </li>
                            </ul>
                            </div>

                        <label>Close In</label>
                        <input type="date" name="close_in" />

                        <input type="submit" name="create" value="Create" />
                    </form>
                </div>
        <?php } ?>

        </div>
    </div>
</section>



    