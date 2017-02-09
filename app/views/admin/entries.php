<section id="entries-sec" class="padding-60">
    <div class="container">
    <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>¡Éxito!</strong> <?php echo $this->session->flashdata('success');?>
	</div>
	<?php endif;?>
        <div class="text-center">
            <a class="btn btn-primary" href="<?php echo base_url();?>admin/create_entry"> Nueva Entrada </a>
            <hr>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Título </th>
                    <th> Publicada </th>
                    <th> Acción </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach ($entriesdata as $entry):?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <a href="<?php echo base_url();?>home/entry/<?php echo $entry->slug;?>"><?php echo $entry->title;?></a>
                    </td>
                    <td>
                        <?php echo date('d/m/Y', $entry->date);?>
                    </td>
                    <td><a href="<?php echo base_url();?>admin/delete_entry/<?php echo $entry->id;?>" class="btn btn-danger btn-xs">Eliminar</a> <a href="<?php echo base_url();?>admin/edit_entry/<?php echo $entry->id;?>" class="btn btn-default btn-xs"> Editar</a></td>
					</tr>
                <?php $i++;?>
				<?php endforeach;?>
			</tbody>
        </table>        
    </div>
</section>