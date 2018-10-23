<?php btn_add_action(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des stades </h3>
            </div>
            <div class="panel-body">


                <div class="table-responsive">
                    <div class="col-sm-12">

                <table id="datatable-stade" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Libellé</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_data as $value){ ?>
                            <tr>
                                <td><?php echo $value->libelle_stade; ?></td>
                                <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                                    <?php btn_edit_action($value->id_stade); ?> &nbsp;
                                    <?php btn_delete_action($value->id_stade); ?>&nbsp;
                                    <?php btn_show_action($value->id_stade); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                    </div>
                </div>



            </div>
        </div>
    </div>

</div> <!-- End Row -->


<!-- sample modal content -->
<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_formLabel"
     aria-hidden="true">
    <form action="#" id="form" class="form-horizontal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal_formLabel">Title</h4>
                </div>
                <div class="modal-body">

                    <div class="form-body">
                        <input type="hidden" id="id_stade" name="id_stade"/>
                        <div class="form-group">
                            <label class="control-label col-md-3">Libellé</label>
                            <div class="col-md-9">
                                <input name="libelle_stade" id="libelle_stade"
                                       class="form-control" type="text" required>
                            </div>
                        </div> 
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->


<script type="text/javascript">
 
	$(document).ready(function (){
		
		$('#datatable-stade').managing_ajax({
			id_modal_form: 'modal_form',

			id_form: 'form',
			url_submit: "<?php echo site_url('C_stade/save')?>",
			
			title_modal_add: 'Ajouter stade',
			focus_add: 'libelle_stade',

			title_modal_edit: 'Modifier stade',
			focus_edit: 'libelle_stade',

            title_modal_show: 'stade',

			url_edit: "<?php echo site_url('C_stade/get_record')?>",
			url_delete: "<?php echo site_url('C_stade/delete')?>"
		});

	});
  
</script>