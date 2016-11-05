<div class="container">
    <h1><?php echo (isset($data->id) ? 'Editar' : 'Novo') . ' ' . 'post' ?> </h1>
    <form role="form" method="post" enctype="multipart/form-data" action="./<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/salvar/<?php echo isset($data->id) ? $data->id : NULL ?>">
        <div class="form-group">
            <label for="date">Data: </label>
            <input class="date form-control" type="text" name="date" id="date" value="<?php echo isset($data->date) ? $data->date : null; ?>" required="" />
            <input class="hour form-control" type="text" name="hour" id="hour" value="<?php echo isset($data->hour) ? $data->hour : null; ?>" required="" />
        </div>
        <div class="form-group">
            <label for="title">Título: </label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo isset($data->title) ? $data->title : NULL ?>" required="" placeholder="Insira aqui o título para o post" />
        </div>
        <div class="form-group">
            <label for="text">Texto: </label>
            <textarea class="form-control" rows="5" id="text" name="text" required placeholder="Insira aqui um texto para o post"><?php echo isset($data->text) ? $data->text : NULL ?></textarea>
        </div>
        <div class="form-group">
            <label for="img">Imagem: </label>
            <input type="file" name="img" id="img" class="form-control" />
        </div>
        <?php if(isset($data->img)) : ?>
            <div class="form-group">
                <label for="img">
                    <img src="<?php echo $data->img; ?>" class="img-thumbnail" alt="" />
                </label>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
</div>
