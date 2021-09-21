$(document).ready(function() {
    $("#searchBtn").click(search);
    $("#search_table").hide();

    //AlERTS

    $('#success').hide();
    $('#blocked').hide();
    $('#removed').hide();
    $('#updated').hide();

    //FEATURES

    getUser();
    displayNotif();
    addFriend();
    acceptRequest();
    okResponse();
    declineRequest();
    displayFriends();
    blockUser();
    removeFriend();
    updateProfile();

});
var count_notif = 0;
$("#notif").html(count_notif);

async function searchAPI(keyword) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/search.php", {
        method: 'POST',
        body: new URLSearchParams({
            "keyword": keyword
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED DURING SEARCH";
        throw new Error(message);
    }

    const results = await response.json();
    return results;
}

function search() {
    let keyword = $("#search").val();


    searchAPI(keyword).then(results => {
        if (results.length > 0) {
            let row = "";
            results.forEach(result => {
                let gender = "";
                if (result.gender == 1) {
                    gender = "Female";
                } else if (result.gender == 2) {
                    gender = "Male";
                } else {
                    gender = "Other";
                }
                row += `<tr id="tr_${result.id}">
                    <td>${result.first_name} ${result.last_name}</td>
                    <td>${gender}</td>
                    <td>${result.dob}</td>
                    <td class="text-center"><button id='add_${result.id}' class="btn btn-primary add" type="button">
                        <i class="zmdi zmdi-account-add"></i>
                    </button></td>
                    <td class="text-center"><button id='block_${result.id}' class="btn btn-danger block" type="button">
                        <i class="zmdi zmdi-block"></i>
                    </button></td>
                    </tr>`
            });

            $('#s_table tbody').empty();
            $("#table_title").html("Search Results");
            $("#search_body").append(row);
        } else {
            let noResults = "0 Results";
            $("#table_title").html(noResults);
        }
        $("#search_table").show();

    }).catch(error => {
        console.log("ERROR:", error);
    });

}

function displayFriends() {
    friendsListAPI().then(friends => {
        if (friends.length > 0) {
            let row = "";
            friends.forEach(friend => {
                let gender = "";
                if (friend.gender == 1) {
                    gender = "Female";
                } else if (friend.gender == 2) {
                    gender = "Male";
                } else {
                    gender = "Other";
                }
                row += `<tr id="tr_${friend.id}">
                    <td>${friend.first_name} ${friend.last_name}</td>
                    <td>${gender}</td>
                    <td>${friend.dob}</td>
                    <td class="text-center"><button id='remove_${friend.id}' class="btn btn-warning remove" type="button">
                        Remove
                    </button></td>
                    <td class="text-center"><button id='block_${friend.id}' class="btn btn-danger block" type="button">
                        <i class="zmdi zmdi-block"></i>
                    </button></td>
                    </tr>`
            });
            $("#friends_body").append(row);
        }

    }).catch(error => {
        console.log("ERROR:", error);
    });

}

function addFriend() {
    $(document).on("click", ".add", function() {
        let id = this.id.replace(/add_/, '');
        addRequestAPI(id).then(response => {
            if (response.success == 1) {
                successAlert();
                $("#add_" + id).fadeOut();
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });

    });
}


function displayNotif() {
    addNotificationsAPI().then(addNotif => {
        let add_row = "";
        count_notif = addNotif.length;
        $("#notif").html(count_notif);
        addNotif.forEach(notif => {
            add_row += `<div class="notifi__item" id="add_notif_${notif.id}">
                                                
            <div class="bg-c2 img-cir img-40">
                <i class="zmdi zmdi-account-box"></i>
            </div>
            <div class="content">
                <p>${notif.first_name} ${notif.last_name} added you</p>
                <button id='accept_${notif.id}' class="btn btn-success accept" type="button">
                        Accept
                    </button>
                    <button id='decline_${notif.id}' class="btn btn-danger decline" type="button">
                        Decline
                    </button>
            </div>
</div>
</div>`
        })
        $("#notif_drop").append(add_row);
    }).catch(error => {
        console.log("ERROR:", error);
    });
    pendingAPI().then(pending => {
        let list = "";
        pending.forEach(invitation => {
            list += `<tr id="pen_${invitation.id}"><td>
            <strong>${invitation.first_name} ${invitation.last_name}</strong> Invitation Pending</td></tr>`
        })
        $("#sent-requests").append(list);
    }).catch(error => {
        console.log("ERROR:", error);
    });
    acceptNotificationsAPI().then(accNotif => {
        let add_row = "";
        count_notif += accNotif.length;
        acc_notif = accNotif.length;
        $("#notif").html(count_notif);

        accNotif.forEach(notif => {
            let id = "#pen_" + notif.id;
            $(id).remove();
            add_row += `<div class="notifi__item" id="acc_notif_${notif.id}">
                                                    
                <div class="bg-c2 img-cir img-40">
                    <i class="zmdi zmdi-account-box"></i>
                </div>
                <div class="content">
                    <p>${notif.first_name} ${notif.last_name} accepted your friend request</p>
                    <button id="ok_${notif.id}" class="btn btn-success okay" type="button">
                            Ok
                        </button>
                        
                </div>
    </div>
    </div>`

        })
        $("#notif_drop").append(add_row);

    }).catch(error => {
        console.log("ERROR:", error);
    });

}

async function addRequestAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/addRequest.php?id=" + id)

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE ADDING";
        throw new Error(message);
    }

    const success = await response.json();
    return success;
}

async function addNotificationsAPI() {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/addNotifications.php")

    if (!response.ok) {
        const message = "ERROR OCCURED While Displaying Add Notifications";
        throw new Error(message);
    }

    const addNotif = await response.json();
    return addNotif;
}

function successAlert() {
    $('#success').fadeIn();
    setTimeout(function() {
        $('#success').fadeOut();
    }, 2000);

}

function blockAlert() {
    $('#blocked').fadeIn();
    setTimeout(function() {
        $('#blocked').fadeOut();
    }, 2000);

}

function removedAlert() {
    $('#removed').fadeIn();
    setTimeout(function() {
        $('#removed').fadeOut();
    }, 2000);

}

function updatedAlert() {
    $('#updated').fadeIn();
    setTimeout(function() {
        $('#updated').fadeOut();
    }, 1500);

}

function acceptRequest() {
    $("#notif_drop").on("click", ".accept", function() {


        let id = this.id.replace(/accept_/, '');
        acceptRequestAPI(id).then(response => {
            if (response.success == 1) {
                setTimeout(function() {
                    $("#add_notif_" + id).fadeOut();
                    count_notif -= 1;
                    $("#notif").html(count_notif);
                }, 500);
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });


    })
}

function blockUser() {
    $("#container").on("click", ".block", function() {
        let id = this.id.replace(/block_/, '');
        blockUserAPI(id).then(response => {
            if (response.success == 1) {
                blockAlert();
                $("#tr_" + id).fadeOut();
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });

    })
}

function removeFriend() {
    $("#container").on("click", ".remove", function() {


        let id = this.id.replace(/remove_/, '');
        removeFriendAPI(id).then(response => {
            if (response.success == 1) {
                removedAlert()
                $("#tr_" + id).fadeOut();
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });



    })
}
async function acceptRequestAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/acceptRequest.php?id=" + id);
    if (!response.ok) {
        const message = "ERROR OCCURED WHILE ACCEPTING REQUEST";
        throw new Error(message);
    }

    const accept = await response.json();
    return accept;
}




async function acceptNotificationsAPI() {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/acceptNotification.php")

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE DISPLAYING ACCEPTED NOTIFICATIONS";
        throw new Error(message);
    }

    const accNotif = await response.json();
    return accNotif;
}

async function pendingAPI() {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/pending.php")

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE DISPLAYING PENDING REQUESTS";
        throw new Error(message);
    }

    const pending = await response.json();
    return pending;
}

function okResponse() {
    $("#notif_drop").on("click", ".okay", function() {
        let id = this.id.replace(/ok_/, '');

        okResponseAPI(id).then(response => {
            if (response.success == 1) {
                setTimeout(function() {
                    $("#acc_notif_" + id).fadeOut();
                    count_notif -= 1;
                    $("#notif").html(count_notif);
                }, 500);
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });



    })
}

async function okResponseAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/okResponse.php?id=" + id);
    if (!response.ok) {
        const message = "ERROR OCCURED WHILE DISMISSING NOTIFICATION";
        throw new Error(message);
    }

    const ok = await response.json();
    return ok;
}

function declineRequest() {
    $("#notif_drop").on("click", ".decline", function() {
        let id = this.id.replace(/decline_/, '');
        declineRequestAPI(id).then(response => {
            if (response.success == 1) {
                setTimeout(function() {
                    $("#add_notif_" + id).fadeOut();
                    count_notif -= 1;
                    $("#notif").html(count_notif);
                }, 500);
            }
        }).catch(error => {
            console.log("ERROR:", error);
        });
    })
}

async function declineRequestAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/declineRequest.php?id=" + id);
    if (!response.ok) {
        const message = "ERROR OCCURED WHILE DECLINING REQUEST";
        throw new Error(message);
    }

    const decline = await response.json();
    return decline;
}

async function friendsListAPI() {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/friendsList.php")

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE FETCHING FRIENDS LIST";
        throw new Error(message);
    }

    const list = await response.json();
    return list;
}

async function blockUserAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/block.php?id=" + id)

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE BLOCking USER";
        throw new Error(message);
    }

    const block = await response.json();
    return block;
}
async function removeFriendAPI(id) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/removeFriend.php?id=" + id)

    if (!response.ok) {
        const message = "ERROR OCCURED WHILE REMOVING FRIEND";
        throw new Error(message);
    }

    const removed = await response.json();
    return removed;
}

function updateProfile() {
    $("#updateBtn").click(() => {
        if (validateAge()) {
            var formData = $("#update-form").serialize();
            updated = false;
            updateProfileAPI(formData).then(response => {
                if (response.success == 1) {
                    $("#dobErr").hide();
                    updatedAlert();
                    setTimeout(function() {
                        document.location.replace("./index.php")
                    }, 2000);

                }
            }).catch(error => {
                console.log("ERROR:", error);
            });
        } else {

            if (!validateAge()) {
                $("#dobErr").html("Enter Age>18");
            }

        }
    })
}

async function updateProfileAPI(formData) {
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/updateProfile.php", {
        method: 'POST',
        body: new URLSearchParams(formData)
    });
    if (!response.ok) {
        const message = "ERROR OCCURED WHILE UPDATING PROFILE";
        throw new Error(message);
    }

    const results = await response.json();
    return results;
}

async function fetchUser() {
    const response = await fetch('http://localhost/nathalie_ammoun_fb/php/userAPI.php');
    if (!response.ok) {
        const message = "An Error has occured while fetching username";
        throw new Error(message);
    }
    const results1 = await response.json();
    return results1;
}

function getUser() {
    fetchUser().then(user => {
        $("#user").html(`${user[0].first_name} ${user[0].last_name}`)
    }).catch(error => {
        console.log("ERROR:", error);
    });
}


function validateAge() {
    var date = new Date($("#dob").val());
    var diff_ms = Date.now() - date.getTime();
    var age_dt = new Date(diff_ms);
    if (Math.abs(age_dt.getUTCFullYear() - 1970) >= 18) {
        return true;
    }
    return false
}