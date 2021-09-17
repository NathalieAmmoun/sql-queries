$(document).ready(function(){
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
        console.log(results1);
    }).catch(error => {
        console.log(error.message);
})
async function fetchCategories(){
    const response = await fetch('http://localhost/nathalie_ammoun_expense_tracker/php/categoriesApi.php');
    if(!response.ok){
        const message = "An Error has occured";
        throw new Error(message);
    }
    const results2 = await response.json();
    return results2; 
}
fetchCategories().then(results2 => {
    console.log(results2);
}).catch(error => {
    console.log(error.message);
})

//add Category to database
$("#addCat").click(function(){
    var name= $("#cat_name").val();
    console.log(name);
    jsonData1 = "name=" + name;
    url1 = "http://locolhost/nathalie_ammoun_expense_tracker/php/addCat.php";
    postAjax(name, url1);
});
$("add").click(function(){
    var formData = $("#add_exp").serialize();
    url2 = "http://locolhost/nathalie_ammoun_expense_tracker/php/processor.php";
    postAjax(formData,url2);
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
});