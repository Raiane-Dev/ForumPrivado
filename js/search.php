<?php
    include('../MySql.php');

    if(isset($_POST['nome'])){
        $busca = $_POST['nome'];
        $query = \MySql::connect()->prepare("SELECT * FROM usuarios WHERE nome LIKE '%".$busca."%'");
        $query->execute();
        $query = $query->fetchAll();
        if(count($query) == 0){ ?>
            <div>Esse Usuário não existe</div>
        <?php }
        foreach($query as $value){
            $data = '<li>
                <figure><img src="images/'.$value["img"].'" /></figure>
                <label>'.$value["nome"].'</label>
                <p>'.$value["email"].'</p>
                <span class="button"><input type="checkbox" name="people[]" id="check" value="'.$value["id"].'" /></span></li>';
        }
        echo @$data;
    }
?>
