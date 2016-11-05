<div class="container">
    <table class="dataTable">
        <thead>
        <tr>
            <th>Nome</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $row) :?>
            <tr>
                <td><?php echo $row->name; ?></td>
                <td class="action">
                    <a href="./adm/<?php echo $this->uri->segment(2); ?>/editar/<?php echo $row->id; ?>">
                        <i class="fa fa-pencil" title="Editar"></i>
                    </a>
                    <a  href="./adm/<?php echo $this->uri->segment(2); ?>/excluir/<?php echo $row->id; ?>">
                        <i class="fa fa-trash-o fa-lg" title="Excluir"></i>
                    </a>
                </td>
            </tr>
        <?php endForeach;?>
        </tbody>
    </table>
</div>