// Document Ready Function
$(document).ready(function () {
    recipe_info_from_jsonphp_file();
    getIngredientsAjaxCall();
    //getRecipes();

    $('#stuff').on('click', 'img', function () {
        var image = $(this).attr('src');
        var recipeTitle = $(this).parent().find(".card-title").text();
        var recipeUrl = $(this).parent().find();
        // console.log(recipeTitle);
        //var modalHeader = $(this).text(recipeTitle);
        //alert(image);
        // console.log('Modal img should be:', image); // no
        $("#myModal .showImage").attr("src", image);
        $('#myModal .ingContainer').html($(this).next().find('.ingDiv').html());

        $("#myModal .modal-header").html("<h3>" + recipeTitle + "</h3>");
        // console.log($(this).next().find('.ingDiv').html()); //no


        // $('body').on('show.bs.modal', '#myModal',function () {
        //     console.log('Show modal called');
        //
        // });
    });
});
// ====================ajax call to get_ingredients.php====================
var ingredientsID=[];
var getIngredientsAjaxCall = function () {
    $.ajax({
        url: "../db_prototype/get_ingredients.php",
        dataType: "json",
        method: "post",
        success: function (response) {
            console.log("data from get_ingredients.php\n", response);

            var valueOfIngredient = $(".btn.btn-danger").click(function(){
                console.log("clicked");

                // var ingredientButtonSelected = (".btn.btn-active").val() //USE WHEN BUTTONS ARE PLACED
                var ingredientInputSelected = $("#ingredientInput").val();
                var objectData=response.data[ingredientInputSelected];
                console.log(objectData);

                // var ingredientsID=[];
                ingredientsID.push(objectData);
                console.log(ingredientsID)
;
            });
            // console.log(ingredientsID)

            $("#ingredientInput").val("")
        }
    })
};

// ====================ajax call to get_recipes.php====================
// var getRecipes = function () {
//     $.ajax({
//
//         var ingredients = {}
//
//         url: "../db_prototype/get_recipes.php",
//         dataType: "json",
//         method: "post",
//         success: function (response) {
//             console.log("data from get_get_recipes.php\n", response);
//         }
//     })
// };

// ====================ajax call to json.php====================
var ingredientsArray;
var recipe_info_from_jsonphp_file = function () {
    $.ajax({
        url: "../db_prototype/testjson.php",
        dataType: "json",
        method: "post",
        success: function (response) {

            console.log("data from json.php\n", response);
            ingredientsArray = response.ingredientData;
            //console.log(ingredientsArray);
            $("#ingredientInput").autocomplete({
                source: ingredientsArray
            });

            var authorName;
            var recipeName;
            var imgSrc;
            var url;

            var ingName;
            var amount;
            var amountType;
            var designatedIngredients;

            for (var i = 0; i < response.recipeData.length; i++) {

                authorName = response.recipeData[i].author;
                recipeName = response.recipeData[i].name;
                imgSrc = response.recipeData[i].img;
                url = response.recipeData[i].url;

                var theDiv = $("<div>", {
                    class: "col-md-3 col-sm-6"
                });
                var outterDiv = $("<div>", {
                    class: "card"
                });
                var img = $("<img>", {
                    src: imgSrc,
                    class: "showImage img-responsive",
                    width: "100%",
                    height: "286px",
                    'data-toggle': "modal",
                    'data-target': "#myModal"
                });
                var innerDiv = $("<div>", {
                    class: "card-block",
                    height: "180px"         //set the height of card-block cards in following rows will line up correctly
                });
                var h3 = $("<h3>", {
                    class: "card-title",
                    text: recipeName
                });

                var recipeUrl = $("<p>", {
                   html: '<a href="' + url + '">' + url + '</a>'
                });


                theDiv.append(outterDiv);
                outterDiv.append(img, innerDiv);
                innerDiv.append(h3); //butt

                var ingDiv = $('<div>', {
                    class: 'ingDiv',
                    style: 'height: 0; overflow: hidden'
                });

                $("#stuff").append(theDiv);

                for (var j = 0; j < response.recipeData[i].ingredients.length; j++) {

                    ingName = response.recipeData[i].ingredients[j].name;
                    amount = response.recipeData[i].ingredients[j].amount;
                    amountType = response.recipeData[i].ingredients[j].amountType;
                    designatedIngredients = Math.round(amount) + " " + amountType + " " + ingName;

                    var p = $("<p>", {
                        class: "card-text",
                        html: '<li>' + designatedIngredients
                    });
                    ingDiv.append(p)
                }

                innerDiv.append(ingDiv.append(recipeUrl));
            }
        }
    })
};
$(function () {
    // Toggle Nav on Click
    $('.toggle-nav').click(function () {
        // Calling a function in case you want to expand upon this.
        toggleNav();
    });
});

function toggleNav() {
    if ($('#site-wrapper').hasClass('show-nav')) {
        // Do things on Nav Close
        $('#site-wrapper').removeClass('show-nav');
    } else {
        // Do things on Nav Open
        $('#site-wrapper').addClass('show-nav');
    }
}

// ====================THE NONSENSE STUFF====================
//
// var fakeAvailableIngArray = [
//     "Monosodium Glutamate (MSG)",
//     "Aspartame",
//     "High Fructose Corn Syrup (HFCS)",
//     "Agave Nectar",
//     "Artificial Food Coloring",
//     "BHA and BHT",
//     "Sodium Nitrite and Sodium Nitrate",
//     "Potassium Bromate",
//     "Recombinant Bovine Growth Hormone (rBGH)",
//     "Refined Vegetable Oil",
// ];
//
// var auto = function (){
//     $( "#poison" ).autocomplete({
//         source: fakeAvailableIngArray
//     });
// };

ingredientsID;

$('.ing').click(function () {
    var val = $(this).attr("value");
    fridge.push(val);
    console.log("Ingredients Added to Fridge", fridge);
    view();

});

// var getValue = function () {
//     $('input').each(function () {
//         var theValue = $(this).val();
//         fridge.push(theValue);
//         //console.log(fridge);
//         view()
//     });
//
//     $('#poison').focus(function () {
//         $(this).val('');
//     });
// };
//
// var removeIng = function () {
//     var text = $(this).text();
//     text = text.substring(0, text.length - 2);
//     console.log("text is:" + text);
//     fridge.splice(fridge.indexOf(text), 1);
//     $(this).closest("button").remove();
//
//     console.log("Current Items in Fridge", fridge)
//
// };
//
// var addClickHandlerToRemovableIngredient = function (element) {
//
//     element.on('click', removeIng);
// };
//
// var view = function () {
//     var death = $("<button>").text(fridge[fridge.length - 1] + " x").addClass("addedIng");
//     addClickHandlerToRemovableIngredient(death);
//     $(".addedIngredients").append(death);
// };