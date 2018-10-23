<?php btn_add_action(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des utilisateurs </h3>
            </div>
            <div class="panel-body">


                <div class="table-responsive">
                    <div class="col-sm-12">


                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Identifiant</th>
                        <th>Profil</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $value) { ?>
                        <tr>
                            <td><?php echo $value->nom; ?></td>
                            <td><?php echo $value->prenom; ?></td>
                            <td><?php echo $value->sexe; ?></td>
                            <td><?php echo $value->telephone; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->login; ?></td>
                            <td><?php echo $value->libelle_profil; ?></td>
                            <td><?php
                                     if($value->statut == 'attente')
                                        echo '<span class="label label-warning">En attente</span>';
                                     else if($value->statut == 'actif')
                                        echo '<span class="label label-success">Actif</span>';
                                     else if($value->statut == 'inactif')
                                        echo '<span class="label label-danger">Inactif</span>';
                                ?></td>
                            <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                                <?php btn_edit_action($value->id_user); ?> &nbsp;
                                <?php btn_delete_action($value->id_user); ?>&nbsp;
                                <?php btn_show_action($value->id_user); ?>
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

                            <input type="hidden" id="id_user" name="id_user"/>


                            <div class="form-group">
                                <label class="control-label col-md-3">Nom<span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input name="nom" id="nom"
                                           class="form-control" type="text" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3">Prénom<span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input name="prenom" id="prenom"
                                           class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Sexe<span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <select name="sexe" id="sexe"
                                            class="form-control" required>
                                        <option value=""></option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Adresse</label>
                                <div class="col-md-9">
                                <textarea name="adresse" id="adresse" style="height: 140px"
                                          class="form-control"></textarea>
                                </div>
                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="control-label col-md-4">Téléphone<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="telephone" id="telephone"
                                           class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Email<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="email" id="email"
                                           class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Identifiant<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="login" id="login"
                                           class="form-control" type="text" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4">Mot de passe<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="password" id="password"
                                           class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Profil<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="id_profil" id="id_profil"
                                            class="form-control" required>
                                        <?php echo $data_profil_select; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Statut<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="statut" id="statut"
                                            class="form-control" required>
                                        <option value="attente">En attente</option>
                                        <option value="actif">Actif</option>
                                        <option value="inactif">Inactif</option>
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
            url_submit: "<?php echo site_url('C_user/save')?>",

            title_modal_add: 'Ajouter utilisateur',
            focus_add: 'nom',

            title_modal_edit: 'Modifier utilisateur',
            focus_edit: 'nom',

            title_modal_show: 'Utilisateur',

            url_edit: "<?php echo site_url('C_user/get_record')?>",
            url_delete: "<?php echo site_url('C_user/delete')?>"
        });

    });

</script>