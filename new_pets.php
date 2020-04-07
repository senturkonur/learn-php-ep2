
<?php require 'lib/functions.php'; ?>
<?php require 'layout/header.php'; ?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    } else {
        $name = '';
    }
    if(isset($_POST['breed'])){
        $breed = $_POST['breed'];
    } else {
        $breed = '';
    }
    if(isset($_POST['weight'])){
        $weight = $_POST['weight'];
    } else {
        $weight = '';
    }
    if(isset($_POST['bio'])){
        $bio = $_POST['bio'];
    } else {
        $bio = '';
    }
    $pets = get_pets();
    $newPet = array(
            'name'=> $name,
            'breed' => $breed,
            'weight' => $weight,
            'bio' => $bio

    );
    $pets[] = $newPet;

    $json = json_encode($pets,JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json',$json);
}
?>

<div class="container">
    <div class="row">
        <h1>Add Your Pets</h1>
        <form action="/new_pets.php" method="POST">
            <div class="form-group">
                <label for="pet-name" class="control-label">Pet Name</label>
                <input type="text" name="name" id="pet-name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pet-name" class="control-label">Breed</label>
                <input type="text" name="breed" id="breed" class="form-control">
            </div>
            <div class="form-group">
                <label for="pet-name" class="control-label">Weight</label>
                <input type="number" name="weight" id="weight" class="form-control">
            </div>
            <div class="form-group">
                <label for="pet-name" class="control-label">Pet Bio</label>
                <input type="text" name="bio" id="bio" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-heart"></span>
                Add
            </button>
        </form>
    </div>
</div>
<?php require 'layout/footer.php'; ?>