
//user name validation starts
function username_validation(){
    'use strict';
    var username_name = document.getElementById("name");
    var username_value = document.getElementById("username").value;
    var username_length = username_value.length;
    var letters = /^[0-9a-zA-Z]+$/;
    if(username_length < 4 || !username_value.match(letters))
    {
        document.getElementById('name_err').innerHTML = 'Username must be 4 chracters long and alphanuric chracters only.';
        username_name.focus();
        document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
        document.getElementById('name_err').innerHTML = 'Valid username';
        document.getElementById('name_err').style.color = "#00AF33";
    }
}
//user name validation ends


