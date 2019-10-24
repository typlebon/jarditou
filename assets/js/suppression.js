$(document).ready(function () {

    $("#suppression").click(function () {
        if (!confirm("Voulez-vous supprimer ce produit ?")) {
            return false;
        }
    });
});