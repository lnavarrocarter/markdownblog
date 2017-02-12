<section id="pages-sec" class="padding-60">
    <div class="container">
        <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>¡Éxito!</strong>
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif;?>
        <form action="<?php echo base_url();?>admin/publish_entry" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><strong>Título: </strong></span>
                    <input name="title" class="form-control" type="text" placeholder="Escribe el título de tu entrada..." />
                </div>
                <small class="form-text text-muted">Este es el título que se mostrará en el menú y en la barra de título de la página.</small>
            </div>
            <br/>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><strong>Slug: </strong></span>
                    <span class="input-group-addon"><?php echo base_url();?>home/entry/</span>
                    <input name="slug" class="form-control" type="text" placeholder="Escribe el slug de tu entrada..." />
                </div>
                <small class="form-text text-muted">El slug es el identificador de la url de tu entrada.</small>
            </div>
            <br/>
            <textarea name="content" data-provide="markdown" rows="10"></textarea>
            <label class="checkbox">
                <input name="is_published" type="checkbox"> ¿Publicada?
            </label>
            <small class="form-text text-muted"> Si no chequeas esta opción, la entrada no se mostrará al público, pero tú la podrás ver en la vista de administrador.</small>
            <hr/>
            <input type="submit" id="submitBtn" class="btn btn-success" value="Guardar">
        </form>
</section>