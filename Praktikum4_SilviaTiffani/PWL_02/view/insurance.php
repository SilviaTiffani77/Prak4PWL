<?php
//Block below for delete
$deleteCommand= filter_input(INPUT_GET, 'delcom');

if(isset($deleteCommand) && $deleteCommand == 1){
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}


//for insert
$submit = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submit)) {
    $id = filter_input(INPUT_POST, 'txtId');
    $name = filter_input(INPUT_POST, 'txtName');
    addInsurance($id, $name);
}



?>

<form method="post">
    <fieldset>
        <legend>New Insurance</legend>
        <label for="txtNameIdx" class="form-label"></label>

        <b><font face="Comic Sans Ms">ID</font></b><br>
        <input type="text" id="txtNameIdx" name="txtId" placeholder="ID" autofocus required class="form-input" size="80"><br><br>
        <b><font face="Comic Sans Ms">Class Name</font></b><br>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Class Name" autofocus required class="form-input" size="80"><br><br>
        <br>

        <input type="submit" name="btnSubmit" value="Add Insurance" class="button-primary">
    </fieldset>
</form>
<br><br>
<table bgcolor="#e0ffff" border="1px" bordercolor="#6495ED">
    <thead>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $insurances = getAllInsurance();
        foreach ($insurances as $insurance) {
            echo '<tr>';
            echo '<td>' . $insurance['id'] . '</td>';
            echo '<td>' . $insurance['name_class'] . '</td>';
            echo '<td><button onclick="deleteInsurance('. $insurance['id'].');">Delete</button>
        <button onclick="updateInsurance('. $insurance['id'].');">Update</button></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>