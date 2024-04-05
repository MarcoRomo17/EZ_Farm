function MEB(bt) {
switch (bt) {
    case 'registro':
        let DR = document.getElementById("agragar");
        if (DR.style.visibility== "hidden") {
            DR.style.visibility == "visible";
        } else {
            DR.style.visibility == "hidden";
        }
        break;

    case 'actualizar':
        let DA = document.getElementById("actualiza");
        if (DA.style.visibility == "hidden") {
            DA.style.visibility == "visible";
        } else {
            DA.style.visibility == "hidden";
        }
        break;

    case 'borrar':
        let DB = document.getElementById("borra");
        if (DB.style.visibility == "hidden") {
            DB.style.visibility == "visible";
        } else {
            DB.style.visibility == "hidden";
        }
        break;
    default:
        break;
}
}