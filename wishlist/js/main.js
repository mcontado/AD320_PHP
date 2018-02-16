function validateForm() {

    var name= document.forms["wishListForm"]["name"].value;
    if (name == null || name == "")
    {
        alert("Name must be filled out");
        return false;
    }

    var author = document.forms["wishListForm"]["author"].value;
    if (author == null || author == "") {
        alert("Author name must be filled out");
        return false;
    }

}