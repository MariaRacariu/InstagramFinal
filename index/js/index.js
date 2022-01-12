//Stops the form from submitting each time
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

//hide Comments

//get all delete buttons in html           loops thru all buttons found
document.querySelectorAll('.deleteButton').forEach(function (button) {
    //looks for click on each button runs when clicked
    button.addEventListener('click', function () {
        //get data-comment-id to reference parent div's id
        var commentId = button.getAttribute('data-comment-id');
        //hide parent div, comment is now hidden
        document.getElementById(commentId).classList.add("hidden");
    });
});