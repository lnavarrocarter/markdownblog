<section id="pages-sec" class="padding-60">
    <div class="container">
        <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>¡Éxito!</strong>
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif;?>
        <form action="<?php echo base_url();?>admin/update_entry/<?php echo $entrydata->id;?>" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><strong>Título: </strong></span>
                    <input name="title" class="form-control" type="text" value="<?php echo $entrydata->title;?>" placeholder="Escribe el título de tu entrada..." />
                </div>
                <small class="form-text text-muted">Este es el título que se mostrará en el menú y en la barra de título de la entrada.</small>
            </div>
            <br/>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><strong>Slug: </strong></span>
                    <input name="slug" class="form-control" type="text" value="<?php echo $entrydata->slug;?>" placeholder="Escribe el slug de tu entrada..." />
                </div>
                <small class="form-text text-muted">El slug es el identificador de la url de tu entrada.</small>
            </div>
            <br/>
            <textarea name="content" data-provide="markdown" rows="10"><?php echo file_get_contents('app/data/md/'.$entrydata->id.'.md');?></textarea>
            <label class="checkbox">
                <input name="is_published" <?php if ($entrydata->is_published == 'on'):?> checked <?php endif;?> type="checkbox"> ¿Publicada?
            </label>
            <small class="form-text text-muted"> Si no chequeas esta opción, la entrada no se mostrará al público, pero tú la podrás ver en la vista de administrador.</small>
            <hr/>
            <input type="submit" class="btn btn-success" value="Actualizar">
        </form>
</section>