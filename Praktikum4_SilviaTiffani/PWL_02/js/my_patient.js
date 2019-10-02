function deletePatient(medRecNum) {
    let confirmation = window.confirm("Are you sure to remove this item?")
    if (confirmation) {
        window.location = "index.php?menu=p&delcom=1&medrecnum=" + medRecNum;
    }
}

function updatePatient(medRecNum) {
    window.location = "index.php?menu=up&medrecnum=" + medRecNum;
}

function deleteUser(id) {
    let confirmation = window.confirm("Are you sure to remove this user?")
    if (confirmation) {
        window.location = "index.php?menu=u&delcom=1&id=" + id;
    }
}

function updateUser(id) {
    window.location = "index.php?menu=u_up&id=" + id;
}