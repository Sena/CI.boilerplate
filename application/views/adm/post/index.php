<div class="container">
    <table class="dataTable">
        <thead>
        <tr>
            <th style="width: 180px">Data/Hora</th>
            <th>Título</th>
            <th class="image">Imagem</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $row) :?>
            <tr>
                <td><?php echo $row->datetime; ?></td>
                <td><span data-toggle="tooltip" title="<?php echo $row->text; ?>"><?php echo $row->title; ?></span></td>
                <td><img class="img-thumbnail" src="<?php echo $row->img; ?>" alt="<?php echo $row->text; ?>"/></td>
                <td class="action">
                    <a href="./adm/<?php echo $this->uri->segment(2); ?>/editar/<?php echo $row->id; ?>">
                        <img width="29" height="29" src= "./assets/adm/img/edit.png" title="Editar" />
                    </a>
                    <a  href="./adm/<?php echo $this->uri->segment(2); ?>/excluir/<?php echo $row->id; ?>">
                        <img width="29" height="29" src= "./assets/adm/img/delete.png" title="Excluir" />
                    </a>
                </td>
            </tr>
        <?php endForeach;?>
        </tbody>
    </table>
</div>