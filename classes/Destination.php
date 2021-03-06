<?php

include 'Manager.php';

class Destination
{
  
  private $id,
  $location,
  $id_tour_operation;
  public $price;

  
  public function __construct()
  {
    
  }
  
  public function getId()
  {
    
  }
  
  public function getLocation()
  {
    
  }
  

  public function getId_tour_operator()
  {
      
  }
}

include '../partials/header.php';
if(isset($_SESSION['id_admin'])){
  include '../partials/nav_connect_admin.php';
}elseif(isset($_SESSION['id_to'])){
  include '../partials/nav_connect_to.php';
}
else{
  include '../partials/nav_disconnet.php';
}
$manager = new Manager();
$destination = new Destination();


?>

<div class="container">
    <h2><?=ucfirst($_GET['location'])?></h2>
    <div class="row">
    <?php $OperatorsByDestination = $manager->OperatorByDestination();
    foreach ($OperatorsByDestination as $operator) {
      if ($operator['is_premium'] == true) {?>
        <div class="col s12 m6">
            <div class="card white to_by_destination">
              <div class="card-content black-text">
                
                <span class="card-title"><a class="blue-text" href="../Tour_Operator/operator.php?id_to=<?= $operator['id_tour_operator'] ?>&amp;name=<?= $operator['name'] ?>"> <?=$operator["name"]?> </a> <span class="right"><?= $operator['price'] ?>€</span> </span>
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="<?= $operator['link'] ?>">Notre site</a>
              </div>
            </div>
          </div>
     <?php }
      elseif ($operator['is_premium'] == false){?>
        
        <div class="col s12 m6">
          <div class="card white">
            <div class="card-content black-text">
              <span class="card-title"><a class="blue-text" href="../Tour_Operator/operator.php?id_to=<?= $operator['id_tour_operator'] ?>&amp;name=<?= $operator['name']?>"><?= $operator["name"] ?></a> <span class="right"><?= $operator['price'] ?>€</span> </span>
              

              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>

            </div>
          </div>
        </div>
    <?php  }
    }?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../assets/JS/script.js"></script>