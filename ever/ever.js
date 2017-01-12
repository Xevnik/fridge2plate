// ====================Document Ready====================
$(document).ready(function () {
    recipe_info_from_jsonphp_file();
    getIngredientsAjaxCall();
    buttonValToArray();
    titleImgToModal();
});

// ====================ajax call to get_ingredients.php====================
var ingredientsID = [];
function getIngredientsAjaxCall() {
    $.ajax({

        url: "./db_prototype/get_ingredients.php",
        dataType: "json",
        method: "post",
        success: function (response) {
            console.log("data from get_ingredients.php\n", response);

            // -----------Auto Complete-----------
            var updatedIngredientsArray = [];
            var newIngredients = (response.data);
            for (var key in newIngredients) {
                if (newIngredients.hasOwnProperty(key)) {
                    updatedIngredientsArray.push(key);
                }
            }
            $("#ingredientInput").autocomplete({
                source: updatedIngredientsArray
            });

            //-----Input Field Ingredient Invert to ID Numbers-----

            //-----On Go Button-----
            $(".btn.btn-danger").click(function () {
                var ingredientInputSelected = $("#ingredientInput").val();
                var objectData = response.data[ingredientInputSelected];
                ingredientCheck(objectData);
                console.log("Ingredients Added to Fridge From Input", ingredientsID);
                $("#ingredientInput").val("");
            });
            //-----On KeyPress Enter-----
            $('#ingredientInput').bind('keypress', function (enter) {
                if (enter.keyCode == 13) {
                    var ingredientInputSelected = $("#ingredientInput").val();
                    var objectData = response.data[ingredientInputSelected];
                    ingredientCheck(objectData);
                    console.log("Ingredients Added to Fridge From Input", ingredientsID);
                    $("#ingredientInput").val("");
                }

            });
        }
    })
}
// ====================ajax call to get_recipes.php====================
function getRecipe() {
    console.log("Recipe Received");
    $.ajax({
        url: "./db_prototype/get_recipes.php",
        dataType: "json",
        method: "post",
        data: {
            ingredients: ingredientsID
        },
        success: function (response) {

            console.log("data from get_get_recipes.php\n", response);
            clear();
            var authorName;
            var recipeName;
            var imgSrc;
            var url;

            var ingName;
            var amount;
            var amountType;
            var designatedIngredients;

            for (var i = 0; i < response.data.length; i++) {

                authorName = response.data[i].author;
                recipeName = response.data[i].name;
                imgSrc = response.data[i].img;
                url = response.data[i].url;

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

                for (var j = 0; j < response.data[i].ingredient.length; j++) {

                    ingName = response.data[i].ingredient[j].name;
                    amount = response.data[i].ingredient[j].amount;
                    amountType = response.data[i].ingredient[j].amountType;
                    designatedIngredients = Math.round(amount) + " " + amountType + " " + ingName;

                    var p = $("<p>", {
                        class: "card-text",
                        html: '<li>' + designatedIngredients
                    });
                    ingDiv.append(p)
                }
                innerDiv.append(ingDiv.append(recipeUrl));
            }
        },
        error: function () {
            console.log("BROKEN")
        }
    });
}
// ====================ajax call to json.php====================
var recipe_info_from_jsonphp_file = function () {
    $.ajax({
        url: "./db_prototype/testjson.php",
        dataType: "json",
        method: "post",
        success: function (response) {
            console.log("data from json.php\n", response);

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
                    class: " thumbnail showImage img-responsive",
                    width: "100%",
                    height: "286px",
                    'data-toggle': "modal",
                    'data-target': "#myModal"
                });
                var innerDiv = $("<div>", {
                    class: "card-block",
                    height: "90px"         //set the height of card-block so cards in following rows will line up correctly
                });
                var h3 = $("<h3>", {
                    class: "card-title",
                    text: recipeName
                });

                console.log('IMG ELE:', img);


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
                theDiv.append(outterDiv);
                outterDiv.append(img, innerDiv);
                innerDiv.append(h3);

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


// ====================NAVIGATE====================

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
// ====================Button Value Pushed to Array====================
var buttonValToArray = function () {
    $(".btn.btn-info.topIng").click(function () {

        var val = $(this).attr("value");
        var txt = $(this).text();
        txtArr.push(txt);
        ingredientsID.push(val);
        console.log("Ingredients Added to Fridge", ingredientsID);
        view();

        var buttonValue = $(this).val();
        // buttonsToView()
        // ingredientsID.push(buttonValue);
        getRecipe();
    });
};
// ====================Title and Image Inside Modal====================
var titleImgToModal = function () {
    $('#stuff').on('click', 'img', function () {
        var image = $(this).attr('src');
        var recipeTitle = $(this).parent().find(".card-title").text();

        $("#myModal .showImage").attr("src", image);
        $('#myModal .ingContainer').html($(this).next().find('.ingDiv').html());
        $("#myModal .modal-header").html("<h3>" + recipeTitle + "</h3>");
    });
};
// =======CHECK IF ELEMENT IN INPUT FIELD MATCHES WITH ingredientID ARRAY=======
var ingredientCheck = function (ingredient) {
    if (ingredient === undefined) {
        alert("INGREDIENT NOT FOUND")
    }
    else {
        ingredientsID.push(ingredient);
        getRecipe();

    }
};
// ====================Clears Row After Calling Function getRecipe()====================
var clear = function () {
    $("#stuff").empty()
};
// ====================Pushes Buttons to Container====================
var buttonsToView = function(){

};

ingredientsID;
var txtArr = [];


var getValue = function() {
    $('#ingredientInput').each(function() {
        var theValue = $(this).val();
        txtArr.push(theValue);
        //console.log(fridge);
        // view()
    });

    $('#ingredientInput').focus(function() {
        $(this).val('');
    });
};

var removeIng = function() {
    var text = $(this).text();
    text = text.substring(0, text.length - 2);
    console.log("text is:" + text);
    console.log(ingredientsID);
    var indexS = txtArr.indexOf(text);
    console.log(indexS);
    txtArr.splice(indexS, 1);
    console.log(txtArr);
    console.log(indexS);
    ingredientsID.splice(indexS, 1);



    $(this).closest("button").remove();

    console.log("Current Items in Fridge", ingredientsID)

};

var addClickHandlerToRemovableIngredient = function(element) {

    element.on('click', removeIng);
};

var view = function() {
    // var death = $("<button>").text(txtArr[txtArr.length - 1] + " x").addClass("addedIng");

    var betterNameThanDeath = $("<button>", {
        text: txtArr[txtArr.length - 1] + " x",
        class: "btn btn-info addedIng"
    });

    addClickHandlerToRemovableIngredient(betterNameThanDeath);
    // console.log(death)
    $(".container-fluid.fridge").append(betterNameThanDeath)
};
// ====================ON KEYPRESS ENTER INPUT FIELD====================
// $('#searchbox input').bind('keypress', function(e) {
//     if(e.keyCode==13){
//         // Enter pressed... do anything here...
//     }
// });
//or
// var code = e.keyCode || e.which;
// if(code == 13) { //Enter keycode
//     //Do something
// }
//or

// var handle = function (enter) {
//     if (enter.keyCode === 13) {
//         enter.preventDefault(); // Ensure it is only this code that rusn
//
//         console.log("Enter was pressed was presses");
//     }
// }


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


// $('.btn.btn-info.topIng').click(function () {
//     console.log("clicked22")
//     // var val = $(this).attr("value");
//     // fridge.push(val);
//     // console.log("Ingredients Added to Fridge", fridge);
//     // view();
//
// });

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

