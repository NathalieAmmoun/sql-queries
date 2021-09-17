$(document).ready(function(){

    $("#checkAmount").hide();
    $("#checkName").hide();
    $("#checkDate").hide();
    var categories =[];

    //Update Table 
    $(document).on("click", ".edit", function () {
        let id =this.id.replace(/_/,'');
        
                $(document).on("click", "#edit_item", function () {
                var formData = $("#editForm").serialize();
                let url3 = "http://localhost/nathalie_ammoun_expense_tracker/php/updateTable.php?id=" + id;
              postAjax(formData,url3);
        });
});
  
  //DELETE Expense ROW
  $(document).on("click", ".delete", function () {
    let id =this.id.replace(/d_/,'');
    console.log(id);
    let row_id ="#" +id
    let url4 = "http://localhost/nathalie_ammoun_expense_tracker/php/deleteRow.php?id=" + id;
    deleteRow(url4);
    $(row_id).hide();
    });

    async function deleteRow(url){
        const response = await fetch(url);  
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        const row = await response.json();
        return row;
    }

    //Edit CATEGORY
    $(document).on("click", ".editCat", function () {
        let id =this.id.replace(/e/,'');
        let row_id ="#r" +id
        $(document).on("click", "#categ", function () {
            var name= $("#cat_edit").val();
            let catName = "name=" + name;
            let url5 = "http://localhost/nathalie_ammoun_expense_tracker/php/editCateg.php?id=" + id;
          postAjax(catName,url5);
    });
});
    
    async function fetchCategories(){
        const response = await fetch('http://localhost/nathalie_ammoun_expense_tracker/php/categoriesApi.php');
        if(!response.ok){
            const message = "An Error has occured";
            throw new Error(message);
        }
        const results2 = await response.json();
        return results2; 
    }
    //Fetch All Categories
    fetchCategories().then(results2 => {
        let option ="";
        let cat_row="";
        categories = results2;
        
        results2.forEach(cat => {
            
            cat_row+=`<tr id="r${cat.id}">
            <td>${cat.name}</td>
            <td class="text-right">
            <td class="text-right">
            <button type="button" class="btn btn-primary editCat" data-toggle="modal" data-target="#editCat" id="e${cat.id}">
            Edit
            </button></td>`;

            option += `<option value=${cat.id}>${cat.name}</option>`;
            
        });
        $("#table_cat").append(cat_row);
        $("#select").append(option);
        $("#select2").append(option);
        
    }).catch(error => {
        console.log(error.message);
    })    
    async function fetchExpenses(){
        const response = await fetch('http://localhost/nathalie_ammoun_expense_tracker/php/expensesApi.php');
        if(!response.ok){
            const message = "An Error has occured";
            throw new Error(message);
        }
        const results1 = await response.json();
        return results1; 
    }
    fetchExpenses().then(results1 => {
        let row="";
        results1.forEach(exp =>{
            let category = categories.find(cat => cat.id == exp.category_id);
            row += `<tr id="${exp.id}">
            <td>${exp.name}</td>
            <td>${exp.amount}</td>
            <td class="text-right">${exp.date}</td>
            <td class="text-right">${category.name}</td>
            <td class="text-right"><button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#editingModal" id="_${exp.id}">
            Edit
            </button></td>
            <td class="text-right"><button type="button" class="btn btn-danger delete" id="d_${exp.id}">Delete</button></td>
            </tr>`;
            
        });
         $("#table_body").append(row);
    }).catch(error => {
        console.log(error.message);
})
function getLastExpense(){
    fetchExpenses().then(results1 => {
        let row="";
        let last_id = results1[results1.length-1].id;
        let lastExp = results1.find(exp => exp.id == last_id);
        let category = categories.find(cat => cat.id == lastExp.category_id);
            row += `<tr id="${lastExp.id}">
            <td>${lastExp.name}</td>
            <td>${lastExp.amount}</td>
            <td class="text-right">${lastExp.date}</td>
            <td class="text-right">${category.name}</td>
            <td class="text-right"><button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#editingModal" id="_${lastExp.id}">
            Edit
            </button></td>
            <td class="text-right"><button type="button" id="d_${lastExp.id}" class="btn btn-danger delete">Delete</button></td>
            </tr>`;
            $("#table_body").append(row);
         
    }).catch(error => {
        console.log(error.message);
})
}
function getLastCategory(){
    fetchCategories().then(results2 => {
        let option ="";
        categories = results2;
        let last_id = results2[results2.length-1].id;
       let lastCat = results2.find(cat => cat.id == last_id);
            
        option += `<option value=${lastCat.id}>${lastCat.name}</option>`;
            
        $("#select").append(option);
        $("#select2").append(option);
        
    }).catch(error => {
        console.log(error.message);
    })    
}
//add Category to database
$("#addCat").click(function(){
    var name= $("#cat_name").val();
    let jsonData1 = "name=" + name;
    let url1 = "http://localhost/nathalie_ammoun_expense_tracker/php/addCat.php";
    postAjax(jsonData1, url1);
    getLastCategory();
});
//add Expense To Database
$("#add").click(function(){
    let amount =$("#amount").val();
    let itemName = $("#item_name").val();
    $("#checkAmount").hide();
    $("#checkName").hide();
    $("#checkDate").hide();
    if(!$.isNumeric(amount)){
    $("#checkAmount").html("Enter Numeric Value").show();
    }
    if(itemName == ""){
        $("#checkName").html("Enter name").show();
    }
    let date =$("#date").val();
    if(!Date.parse(date)){
        $("#checkDate").html("Enter Date").show();
    }
    var formData = $("#add_exp").serialize();
    let url2 = "http://localhost/nathalie_ammoun_expense_tracker/php/processor.php";
    postAjax(formData,url2);
    getLastExpense();
});
async function postAjax(data,url){
    try{
        result = await $.ajax({
            type: "POST",
            url: url,
            data: data
        })
        
    }catch(error) {
        console.log(error);
    }
}

async function fetchCatAmmounts(){
    const response = await fetch('http://localhost/nathalie_ammoun_expense_tracker/php/chart.php');
    if(!response.ok){
        const message = "An Error has occured";
        throw new Error(message);
    }
    const data = await response.json();
    return data; 
}
//DRAW CHART
fetchCatAmmounts().then(data=>{
    google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
    data = JSON.stringify(data);
    data = JSON.parse(data);
   let dataArray=[["Category", "Amount"]];
   for(let i in data){
        dataArray.push([data[i].category, data[i].amount]);}

    function drawChart() {
        var catAmm = google.visualization.arrayToDataTable(dataArray);
      
        // Optional; add a title and set the width and height of the chart
        var title = {'title':'', 'width':550, 'height':400};
      
        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById("pie-chart"));
        chart.draw(catAmm, title);
      }
})


//Fetch USER
async function fetchUser(){
    const response = await fetch('http://localhost/nathalie_ammoun_expense_tracker/php/userAPI.php');
    if(!response.ok){
        const message = "An Error has occured";
        throw new Error(message);
    }
    const results1 = await response.json();
    return results1; 
}
fetchUser().then(user => {
    console.log(user);
    $("#user").html(user.first_name);
});
});