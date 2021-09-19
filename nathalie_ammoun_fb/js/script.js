$(document).ready(function(){
    $("#searchBtn").click(search);
    $("#search_table").hide();
    addFriend();
    $('#success').hide();
    displayNotif();
    acceptRequest();
    okResponse();
    declineRequest();
    
})
var count_notif=0;
$("#notif").html(count_notif);
async function searchAPI(keyword){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/search.php",{
    method: 'POST',
    body: new URLSearchParams({
            "keyword": keyword})
        });
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const results = await response.json();
    return results;
} 
function search(){
    $('#s_table tbody').empty();
    let keyword = $("#search").val();
    searchAPI(keyword).then(results => {
        if(results.length>0){
        let row = "";
        results.forEach(result => {
            let gender="";
            if(result.gender == 1){
                gender = "Female";
            }else if(result.gender == 2){
                gender = "Male";
            }else{
                gender = "Other";
            }
            row +=`<tr id="tr_${result.id}">
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
        $("#table_title").html("Search Results");
        $("#search_body").append(row);}else{
            let noResults="0 Results";
            $("#table_title").html(noResults);
        }
        $("#search_table").show();

    })
    
}

function addFriend(){
    $(document).on("click", ".add", function () {
        let id =this.id.replace(/add_/,'');
        addRequestAPI(id);
        successAlert();
        $("#add_"+id).fadeOut();
    });
        }


function displayNotif(){
    addNotificationsAPI().then(addNotif=>{
        let add_row="";
        count_notif=addNotif.length;
        console.log(count_notif);
        $("#notif").html(count_notif);
        addNotif.forEach(notif =>{
            add_row+=`<div class="notifi__item" id="add_notif_${notif.id}">
                                                
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
    }
        )
        acceptNotificationsAPI().then(accNotif=>{
            let add_row="";
            count_notif+=accNotif.length;
            acc_notif=accNotif.length;
            $("#notif").html(count_notif);

            accNotif.forEach(notif =>{
                add_row+=`<div class="notifi__item" id="acc_notif_${notif.id}">
                                                    
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
        }
            )
}

async function addRequestAPI(id){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/addRequest.php?id=" + id)
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const success = await response.json();
    return success;
}

async function addNotificationsAPI(){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/addNotifications.php")
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const addNotif = await response.json();
    return addNotif;
}

function successAlert(){
    $('#success').fadeIn();
    console.log("request sent");
    setTimeout(function(){
        $('#success').fadeOut();
    }, 2000);
    
}
function acceptRequest(){
    $("#notif_drop").on("click", ".accept", function(){
       
        
        let id =this.id.replace(/accept_/,'');
        acceptRequestAPI(id);
        setTimeout(function(){
            $("#add_notif_"+id).fadeOut();
            count_notif-=1;
            $("#notif").html(count_notif);
        }, 500);
        
    })
}
async function acceptRequestAPI(id){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/acceptRequest.php?id="+id);
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const accept = await response.json();
    return accept;
}


async function acceptNotificationsAPI(){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/acceptNotification.php")
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const accNotif = await response.json();
    return accNotif;
}

function okResponse(){
    $("#notif_drop").on("click", ".okay", function(){
        let id = this.id.replace(/ok_/,'');

        okResponseAPI(id);
        setTimeout(function(){
            $("#acc_notif_"+id).fadeOut();
            count_notif-=1;
            $("#notif").html(count_notif);
        }, 500);
        
        
    })
}

async function okResponseAPI(id){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/okResponse.php?id="+id);
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const ok = await response.json();
    return ok;
}

function declineRequest(){
    $("#notif_drop").on("click", ".decline", function(){
        let id =this.id.replace(/decline_/,'');
        declineRequestAPI(id);
        setTimeout(function(){
            $("#add_notif_"+id).fadeOut();
            count_notif-=1;
            $("#notif").html(count_notif);
        }, 500);
        
    })
}

async function declineRequestAPI(id){
    const response = await fetch("http://localhost/nathalie_ammoun_fb/php/declineRequest.php?id="+id);
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const decline = await response.json();
    return decline;
}
