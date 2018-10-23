
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des classements</h3>
            </div>
            <div class="panel-body">


                <div class="table-responsive">
                    <div class="col-sm-12">


                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 20%;white-space: nowrap">Equipe</th>
                        <th>Match joué</th>
                        <th>But Marqué</th>
                        <th>But Encaisé</th>
                        <th>Différence de But</th>
                        <th>Victoire</th>
                        <th>Nulle</th>
                        <th>Defaite</th>
                        <th>Points</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;  foreach ($all_data as $value) { ?>
                        <tr>
                            <td style="width: 20%;white-space: nowrap">
                            <?php echo $i; ?>  &nbsp;
                                <img width="40"  height="50" src="<?php echo site(); ?>images/<?php echo  $value->logo;?>" >
                                    &nbsp;
                                    <?php echo $value->libelle_equipe; ?> 
                                    
                                </td>
                            <td><?php echo $value->Match_joue; ?></td>
                            <td><?php echo $value->but_marque; ?></td>
                            <td><?php echo $value->but_encaise; ?></td>
                            <td><?php echo $value->difference_but; ?></td>
                            <td><?php echo $value->victoire; ?></td>
                            <td><?php echo $value->nulls; ?></td>
                            <td><?php echo $value->defaite; ?></td>
                            <td><?php echo $value->pts; ?></td>
                            
                        </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- End Row -->
