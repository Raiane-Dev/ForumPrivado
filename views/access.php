<style>
    footer{
        display:none;
    }
    header{
        display:none;
    }
</style>
<section class="access">
    <div class="access">
        <div class="img-access">
            <div class="layout-img">
                <h2>We are design changers do what matters.</h2>
                <img src="<?php echo INCLUDE_PATH ?>images/monster.png" />
            </div>
        </div>

        <?php
            if(isset($_GET['login'])){
        ?>
        <div class="login">
            <h2>Seja bem vindo de volta!</h2>
            <p>Não tem uma conta ainda? <a href="<?php echo INCLUDE_PATH?>access?cadastrar">Assine aqui</a></p>
            <form method="post">
                <label>Email</label>
                <input type="text" name="email" placeholder="example@gmail.com" />

                <label>Password</label>
                <input type="text" name="senha" placeholder="******" />

                <input type="submit" name="logar" value="Enter" />

                <div>
                <input type="checkbox" name="lembrar" />
                <label>Lembrar de Mim</label>
                </div>
            </form>
        </div>
        <?php } ?>

        <?php
            if(isset($_GET['cadastrar'])){
        ?>
        <div class="cadastro">
            <h2>Crie sua Conta</h2>
            <p>Você já possui uma conta? <a href="<?php echo INCLUDE_PATH?>access?login"> Entre agora </a></p>
            <form method="post" enctype="multipart/form-data">
                <label>Name User</label>
                <input type="text" name="nome" placeholder="Digite seu nome de Usuário aqui" />

                <label>Email</label>
                <input type="text" name="email" placeholder="example@gmail.com" />

                <input type="file" name="img" />

                <label>Password</label>
                <input type="text" name="senha" placeholder="******" />

                <input type="submit" name="cadastrar" value="Register" />
            </form>
        </div>
        <?php } ?>
    </div>
</section>
