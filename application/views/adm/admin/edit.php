<div class="container">
    <h1><?php echo (isset($data->id) ? 'Editar' : 'Nova') . ' ' . 'questão' ?> </h1>
    <form role="form" method="post" enctype="multipart/form-data" action="./<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/salvar/<?php echo isset($data->id) ? $data->id : NULL ?>">
        <div class="form-group">
            <label for="name">Name: </label>
            <input class="form-control" type="text" name="name" id="name" value="<?php echo isset($data->name) ? $data->name : NULL ?>"/>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo isset($data->email) ? $data->email : NULL ?>"/>
        </div>
        <div class="form-group">
            <label for="password">Senha: </label>
            <input class="form-control" type="password" name="password" id="password" value="" placeholder="Deixe em branco para manter a senha antiga"/>
        </div>
        <div class="form-group">
            <label>Permissões</label>
            <div class="checkbox">
                <?php foreach ($permission as $row) :?>
                <label>
                    <input type="checkbox" name="permission[<?php echo $row->id ?>]" value="<?php echo $row->id ?>" <?php echo (isset($adminpermission) && in_array($row->id, $adminpermission)) ? 'checked' : '' ?>>
                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    <?php echo $row->name ?>
                </label>
                <?php endforeach;?>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
</div>
