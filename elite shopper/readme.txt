A - Sellers:
    - Ability to Sign up and login 
        --> Signing up and logging in will redirect to "addToStore.php"
        --> link ("Sell online") in navbar will only be visible to the seller
        --> Shop's name will display on top of page
        --> upload item to database through form
        --> during registration alerts will display (JAVASCRIPT AND JQUERY FAILED TO FUNCTION MOST OF THE TIME);
        --> jQuery code is also implemented for validation but was not used (js/retailerjQ.js)
    - Ability to Add New Products
        --> used PHP to display content. jQuery Ajax failed to load content. CHECk(js/displayProducts.js)
        --> was able to parse products database content into JSON file to retrieve through AJAX;
        --> Products will display on homepage and shop page and "store"( addToStore.php) page

B- Buyers:
     - Ability to Sign up and login 
        --> Signing up and logging in will redirect to homepage
        --> User's name will display on top of page
        --> during registration alerts will display (JAVASCRIPT AND JQUERY FAILED TO FUNCTION MOST OF THE TIME);
        --> jQuery code is also implemented for validation but was not used (js/userjQ.js)
    - Ability to Browse Products  
        --> User will be able to navigate through all pages and products
    - Ability to Buy Products:
        --> user will be able to add to cart by pressing on the bag icon on product


****PROBLEM WITH JQUERY AND JAVASCRIPT****
THE WEBSITE WAS USING A VERY OLD VERSION OF JQUERY
I UPDATED IT BUT STILL IT FAILED TO FUNCTION AS NEEDED

THERE WAS AN ISSUE WITH DISPLAYING JAVASCRIPT OR JQUERY CCONTENT INTO HTML

BUT THE FUNCTIONS WORkED CORRECTLY IN CONSOLE