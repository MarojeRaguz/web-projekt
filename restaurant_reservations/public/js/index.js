function openMenu(n) {
    let url = "restaurant/menu/" + n;
    location.href = url;
}

function reservationDelete(reservation_id) { //delete
    let url = "reservation-deleted/" + reservation_id;
    location.href = url;
}
function cancel(reservation_id) { //change state of req- PUT
    let url = "restaurant-reservation-canceled/" + reservation_id;
    location.href = url;
}

function accept(reservation_id) { //PUT
    let url = "reservation-accepted/" + reservation_id;
    location.href = url;
}

function acceptEmail(reservation_id) {
    let url = "reservation-accepted/" + reservation_id;
    location.href = url;
}
    
