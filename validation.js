console.log("this code doesnt qork for no fucking reason")

function validateForm() {

    var name = document.forms["contactform"]["name"].value;
    var email = document.forms["contactform"]["email"].value;
    var message = document.forms["contactform"]["message"].value;
    var phone = document.forms["contactform"]["phone"].value;
    var subject = document.forms["contactform"]["subject"].value;
    var category = document.forms["contactform"]["category"].value;
    var company = document.forms["contactform"]["company"].value;
    var department = document.forms["contactform"]["department"].value;
    var country = document.forms["contactform"]["country"].value;
    var city = document.forms["contactform"]["city"].value;

    var phonePattern = /^\d+$/;
  
    if (name == "") {
      document.getElementById("name_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      name.focus();
      return false;
    }
    if (email == "") {
      document.getElementById("email_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      email.focus();
      return false;
    } else if (!email.includes("@") || !email.includes(".")) {
        alert("Please enter a valid email address.");
        email.focus();
        return false;
      }
    if (message == "") {
      document.getElementById("message_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      message.focus();
      return false;
    }
    if (phone == "") {
      document.getElementById("phone_required").innerHTML = "<span style='font-color: red;'> Must be a valid phone number (123-456-7890) </span>";
      phone.focus();
      return false;
    }
    if (subject == "") {
      document.getElementById("subject_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      subject.focus();
      return false;
    }
    if (category == "") {
      document.getElementById("category_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      category.focus();
      return false;
    }
    if (company == "") {
      document.getElementById("company_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      company.focus();
      return false;
    }
    if (department == "") {
      document.getElementById("department_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      department.focus();
      return false;
    }
    if (country == "") {
      document.getElementById("country_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      country.focus();
      return false;
    }
    if (city == "") {
      document.getElementById("city_required").innerHTML = "<span style='font-color: red;'> This field is required </span>";
      city.focus();
      return false;
    }
  }

