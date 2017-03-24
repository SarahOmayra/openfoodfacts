$(document).ready(function () {
       var liste = ["pizzas","chocolats","abcdefs"];
    $('#categorie').autocomplete({
        source:liste,
        minLength : 3
    })
})

