<?php if (Yii::app()->user->hasFlash('contact')) : ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else : ?>

    <?php
        if (isset($usuario)) {
            if ($_GET['view'] == false) { ?>
            <h1>Mofificar usuarios</h1>
        <?php } else { ?>
            <h1>Ver usuario</h1>
        <?php    }
            } else { ?>
        <h1>Crear usuarios</h1>
    <?php    }
        ?>


    <div class="form">

        <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'create-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>


        <div class="row">
            <?php
                echo $form->label($model, 'username');
                if (isset($usuario)) {
                    if ($_GET['view'] == false) {
                        echo $form->textField(
                            $model,
                            'username',
                            array("class" => "form-control", "value" => $usuario["username"])
                        );
                    } else {
                        echo $form->textField(
                            $model,
                            'username',
                            array("class" => "form-control", "value" => $usuario["username"], 'readonly' => true)
                        );
                    }
                } else {
                    echo $form->textField($model, 'username');
                }


                echo $form->error($model, 'username');
                ?>
        </div>

        <div class="row">
            <?php
                echo $form->label($model, 'email');
                if (isset($usuario)) {
                    if ($_GET['view'] == false) {
                        echo $form->textField(
                            $model,
                            'email',
                            array("class" => "form-control", "value" => $usuario["email"])
                        );
                    } else {
                        echo $form->textField(
                            $model,
                            'email',
                            array("class" => "form-control", "value" => $usuario["email"], 'readonly' => true)
                        );
                    }
                } else {
                    echo $form->textField($model, 'email');
                }
                echo $form->error($model, 'email');
                ?>
        </div>

        <div class="row">
            <?php


                if (isset($usuario)) {
                    if ($_GET['view'] == false) {
                        echo $form->label($model, 'password');
                        echo $form->passwordField(
                            $model,
                            'password',
                            array("class" => "form-control", "value" => $usuario["password"])
                        );
                    } else { }
                } else {
                    echo $form->label($model, 'password');
                    echo $form->passwordField($model, 'password');
                }
                echo $form->error($model, 'password');
                ?>
        </div>



        <?php
            if (isset($usuario)) {
                if ($_GET['view']  == false) {
                    echo CHtml::submitButton("Modificar", array("class" => "btn btn-success"));
                } else { }
            } else {
                echo CHtml::submitButton("crear", array("class" => "btn btn-success"));
            }

            $this->endWidget(); ?>

    </div><!-- form -->
<?php endif; ?>