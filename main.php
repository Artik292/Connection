<?php
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Работает');
$app->initLayout('Centered');

if (isset($_ENV['con'])) {
  $db = new \atk4\data\Persistence_SQL($_ENV['con']);
} else {
  $db = new \atk4\data\Persistence_SQL();
}


class Love extends \atk4\data\Model {
public $table = 'artik292';
function init() {
parent::init();
  $this->addField('what',['caption'=>'Что надо сделать']);
  $this->addField('when',['caption'=>'Когда это надо','type'=>'date']);
  $this->addField('coment',['caption'=>'Комментарий']);
}
}

$CRUD = $app->add(['CRUD']);
$CRUD->setModel(new Love($db));

$app->add(['ui'=>'divider']);
$app->add(['Button','Не взлом','teal small','icon'=>'user secret'])->link(['DB']);
