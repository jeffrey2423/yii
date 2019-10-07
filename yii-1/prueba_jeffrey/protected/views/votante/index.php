<?php
/* @var $this VotanteController */

$this->breadcrumbs = array(
  'Votante',
);

?>

  <div class="row">
    <div class="col-sm">
      <div class="card-deck">
        <?php foreach ($votantes as $data) : ?>
          <div class="card mt-5">
            <img class="card-img-top" src="https://p7.hiclipart.com/preview/550/997/169/user-icon-foreigners-avatar.jpg" alt="Card image cap" style="max-width: 18rem; max-height: 18rem">
            <div class="card-body">
              <h5 class="card-title"><?= $data["nombre"] ?> <?= $data["apellido"] ?></h5>
              <p class="card-text"><?= $data["tipo"] ?></p>
            </div>
            <div class="card-footer">
            <?php echo CHtml::link('Votar', array('votar', 'id'=>$data['id_candidato']),array("confirm"=>"¿Desea efectuar el voto? Solo podra votar una vez",'class'=> 'btn btn-success'));?>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
