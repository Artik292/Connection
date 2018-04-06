<?php
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Работает');
$app->initLayout('Centered');

$db = new \atk4\data\Persistence_SQL('mysql:host=eu-mm-auto-dub-01-b.cleardb.net;dbname=heroku_d6f5fd68101f5d4;charset=utf8', 'b3484af324fedb','73d52b5043cbe42');

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
