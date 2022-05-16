function openMenu(n) {
    let url = "restaurant/menu/" + n;
    location.href = url;
}

function reservationDelete(restaurant_id) { //delete
    let url = "reservation-deleted/" + restaurant_id;
    location.href = url;
}
function cancel(restaurant_id) { //change state of req- PUT
    let url = "restaurant-reservation-canceled/" + restaurant_id;
    location.href = url;
}

function accept(restaurant_id) { //PUT
    let url = "reservation-accepted/" + restaurant_id;
    location.href = url;
}
    
