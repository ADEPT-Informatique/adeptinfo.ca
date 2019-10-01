
$('tr.clickable').click(function () {
    id = $(this).attr('id');
    window.location.replace('HoodieDetails.php?id='+id);
});

$('button.delete').click(function(){
    confirmation = confirm("Êtes-vous sur de vouloir supprimer cette réservation ?");
    if (confirmation){
        id = $(this).attr('id');
        window.location.replace('../controller/HoodieDeleteReservation.php?resId='+id)
    }
});

