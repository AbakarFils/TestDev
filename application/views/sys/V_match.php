<?php btn_add_action(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des matchs </h3>
            </div>
            <div class="panel-body">


                <div class="table-responsive">
                    <div class="col-sm-12">


                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Stade</th>
                        <th>Equipe receptrice</th>
                        <th>scores</th>
                        <th>Equipe deplaçante</th>
                        <th>phase </th>
                        <th>statut</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>
                        <tr>
                            <td><?php echo $value->code; ?></td>
                            <td><?php echo $value->libelle_stade; ?></td>
                            <td>
                            <img width="40"  height="50" src="<?php echo site(); ?>images/<?php echo  $value->logo_a;?>" >&nbsp;
                                <?php echo $value->equipe_a_libelle; ?>
                            </td>
                            <td>
                                <?php echo $value->score_a; ?> -
                                <?php echo $value->score_b; ?>
                                    
                             </td>
                            <td>
                            <img width="40"  height="50" src="<?php echo site(); ?>images/<?php echo  $value->logo_b;?>" >&nbsp;
                                <?php echo $value->equipe_b_libelle; ?>
                            </td>
                           
                            <td>
                                <?php 
                                if ($value->phase==1)
                                   echo '<span class="label label-warning">Aller</span>';
                                else
                                    echo '<span class="label label-success">Retour</span>';
                                 ?>
                                    
                             </td>
                            
                            <td><?php
                                    if ($value->statut == 'attente')
                                        echo '<span class="label label-warning">En cours</span>';
                                     else if($value->statut == 'inactif')
                                        echo '<span class="label label-danger">Terminer</span>';
                                ?></td>
                            <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                                <?php 
                                 if ($value->statut == 'attente')
                                    btn_edit_action($value->id_matchs);
                                else
                                echo '';
                                     ?> &nbsp;
                                   
                                <?php btn_delete_action($value->id_matchs); ?>&nbsp;
                                <?php btn_show_action($value->id_matchs); ?>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal_formLabel">Title</h4>
                </div>
                <div class="modal-body">


                    <div class="form-body row">


                        <div class="col-sm-6">

                            <input type="hidden" id="id_matchs" name="id_matchs"/>
                            
                            <input type="hidden" value="inactif" id="statut" name="statut"/>
                            <div class="form-group">
                                <label class="control-label col-md-3">code</label>
                                <div class="col-md-9">
                                    <input name="code" id="code"
                                           class="form-control" type="text" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3">Equipe A</label>
                                <div class="col-md-9">
                                   <select name="id_equipe_a" id="id_equipe_a"
                                            class="form-control" required>
                                            <option value=""></option>
                                        <?php foreach ($data_equipe_select as $value):?>
                                            <option class="equipe_a" id="a_<?= $value->id_equipe ?>" value="<?= $value->id_equipe ?>" >
                                                <?= $value->libelle_equipe ?> 
                                            </option>
                                        <?php endforeach?>
                                    </select> 
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"><span class="text-danger"></span></label>
                                <div class="col-md-9">
                                 <input name="score_a" id="score_a"
                                    placeholder="score" 
                                    type="number" min="0" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Stade</label>
                                <div class="col-md-9">
                                   <select name="id_stade" id="id_stade"
                                            class="form-control" required>
                                        <?php echo $data_stade_select; ?>
                                    </select> 
                                </div>
                                
                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="control-label col-md-3">Journée</span></label>
                                <div class="col-md-9">
                                    <input name="id_journe" id="id_journe"
                                        class="form-control" type="number" min="0"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Equipe B</label>
                                <div class="col-md-9">
                                   <select name="id_equipe_b" id="id_equipe_b"
                                            class="form-control" required>
                                            <option  value=""></option>
                                        <?php foreach ($data_equipe_select as  $value):?>
                                            <option class="equipe_b"
                                           id="b_<?= $value->id_equipe ?>"
                                            value="<?= $value->id_equipe ?>" 
                                            >
                                            <?= $value->libelle_equipe ?> 
                                            </option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"><span class="text-danger">VS</span></label>
                                <div class="col-md-9">
                                    <input name="score_b" id="score_b"
                                        placeholder="score"   class="form-control"
                                     type="number" min="0" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">phase</label>
                                <div class="col-md-9">
                                        <select name="phase" id="phase"
                                           class="form-control" required>             
                                            <option value="1">Aller</option>
                                            <option value="2">Retour</option>
                                        </select>
                                </div>
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

    $(document).ready(function () {

        $('#datatable-buttons').managing_ajax({
            id_modal_form: 'modal_form',

            id_form: 'form',
            url_submit: "<?php echo site_url('C_match/save')?>",

            title_modal_add: 'Ajouter match',
            focus_add: 'code',

            title_modal_edit: 'Modifier match',
            focus_edit: 'code',

            title_modal_show: 'Utilisateur',

            url_edit: "<?php echo site_url('C_match/get_record')?>",
            url_delete: "<?php echo site_url('C_match/delete')?>"
        });

    $("#id_equipe_a").on('change', function(){
        var e = document.getElementById("id_equipe_a");  
        var lid = e.options[e.selectedIndex].value;
        $(".equipe_b").show();
        $("#b_"+lid).hide();
    });

    $("#id_equipe_b").on('change', function(){
        var e = document.getElementById("id_equipe_b");  
        var lid = e.options[e.selectedIndex].value;
        $(".equipe_a").show();
        $("#a_"+lid).hide();
    });

    });

</script>