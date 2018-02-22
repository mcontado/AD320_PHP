function validateForm() {

    var movieTitle = document.forms["wishListForm"]["movieTitle"].value;
    if (movieTitle == null || movieTitle == "")
    {
        alert("Movie Title must be filled out");
        return false;
    }

}