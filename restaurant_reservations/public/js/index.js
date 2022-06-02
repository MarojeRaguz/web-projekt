function openMenu(n) {
    let url = "restaurant/menu/" + n;
    location.href = url;
}

function reservationDelete(reservation_id) { 
    let url = "reservation-deleted/" + reservation_id;
    location.href = url;
}
function cancel(reservation_id) { 
    let url = "restaurant-reservation-canceled/" + reservation_id;
    location.href = url;
}

function accept(reservation_id) { 
    let url = "reservation-accepted/" + reservation_id;
    location.href = url;
}

    
