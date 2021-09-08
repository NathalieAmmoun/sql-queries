$(document).ready(function(){
    ajaxJS($('#submitButton').click());});
    function ajaxJS(e) {
      if (e) {
        return false;
      }
      $.ajax({
        url: "./php/products.json",
        method: "GET",
        success: function(data) {
          data=JSON.stringify(data);
          data = JSON.parse(data);
          let html_to_append = "";
          for (var i=0; i<data.length; i++) {
            console.log(data[i]); 
            html_to_append =
            `<div class="row">
            <div class="col-lg-4 col-md-6" >
            <div class="product__item" >
            <div class="product__item__pic set-bg" data-setbg= './uploads/${data[i].image}'>
            <ul class="product__hover">
                <li><img src="./uploads/${data[i].image}" class="image-popup"><span class="arrow_expand"></span></li>
                      <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                          <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                            </div>
                      <div class="product__item__text">${data[i].name}</div>
                  <h6><a href="#">${data[i].name}</a></h6>
                  </div>
                        </div>
                          </div>
                    </div>
                </div>
      </div>`;
      console.log(html_to_append);
          $("#products").append(html_to_append);}}
      });
    }