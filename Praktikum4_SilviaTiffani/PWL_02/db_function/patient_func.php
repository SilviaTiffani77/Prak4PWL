<?php

function getAllPatient() {
    $link= createMySQLConnection();
    $query = 'SELECT * FROM patient p JOIN insurance i ON i.id = p.insurance_id;';
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addPatient($medis, $citizenid, $name, $address, $birthplace, $birthdate, $insuranceid) {
    $link= createMySQLConnection();
    $link->beginTransaction();
    $query = 'INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, insurance_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medis, PDO::PARAM_STR);
    $statement->bindParam(2, $citizenid, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birthplace, PDO::PARAM_STR);
    $statement->bindParam(6, $birthdate, PDO::PARAM_STR);
    $statement->bindParam(7, $insuranceid, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function deletePatient($medrecnum) {
    $link= createMySQLConnection();
    $link->beginTransaction();
    $query = 'DELETE FROM patient WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medrecnum, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function updatePatient($medrecnum, $citid, $name, $address, $birthp, $birdate, $insuranceid) {
    $link= createMySQLConnection();
    $link->beginTransaction();
    $query = 'UPDATE patient SET citizen_id_number = ?, name = ?, address = ?, birth_place = ?, birth_date = ?, insurance_id = ? WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $citid, PDO::PARAM_STR);
    $statement->bindParam(2, $name, PDO::PARAM_STR);
    $statement->bindParam(3, $address, PDO::PARAM_STR);
    $statement->bindParam(4, $birthp, PDO::PARAM_STR);
    $statement->bindParam(5, $birdate, PDO::PARAM_STR);
    $statement->bindParam(6, $insuranceid, PDO::PARAM_INT);
    $statement->bindParam(7, $medrecnum, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function getPatient($medrecnum) {
    $link= createMySQLConnection();
    $query = 'SELECT * FROM patient WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medrecnum, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}

?>