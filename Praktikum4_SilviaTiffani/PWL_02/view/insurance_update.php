<?php
//Block below for fetch data
$id = filter_input(INPUT_GET, 'id');
if(isset($id)){
    $insurance = getInsurance($id);
}


//Block below for insert
$submitted = filter_input(INPUT_POST,'btnUpdate');
if(isset($submitted)){
    $name_class = filter_input(INPUT_POST,'patient');
    updateInsurance($id, $name_class);
    header("location:index.php?menu=i");
}
?>

<form  method="post">
    <fieldset>
        <legend>Update Insurance</legend>
        <input type="text" name="patient"autofocus required placeholder="Ketik" value="<?php echo $insurance['name_class']; ?>">
        <input type="submit"name="btnUpdate" value="Update Insurance">
    </fieldset>
</form>

