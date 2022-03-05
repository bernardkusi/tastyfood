
var nav = document.getElementsByClassName("nav")[0];
var nav2 = document.getElementsByClassName("nav")[1];
var home = document.getElementById("home");
var link = document.getElementsByClassName("link");
var page = document.getElementsByClassName("page");
var navbar = document.getElementsByClassName("navi")[0];
var navbar2 = document.getElementsByClassName("navi")[1];
var account = document.getElementsByClassName("account")[0];
var signinbox = document.getElementsByClassName("signinform")[0];
var signupbox = document.getElementsByClassName("signupform")[0];
var change = document.getElementsByClassName("change");
var closeit = document.getElementsByClassName("close");
var cover = document.getElementsByClassName("cover")[0];
var signupbtn = document.getElementById("signup");
var state = 0;
var errormessage = document.getElementsByClassName("errormessage")[0];
var errormessage2 = document.getElementsByClassName("errormessage")[1];
var show = document.getElementsByClassName("show")[0];
var hide = document.getElementsByClassName("logout")[0];




// forsignupp
var fname = document.getElementsByName("fname")[0];
var sname = document.getElementsByName("sname")[0];
var email = document.getElementsByName("email")[0];
var password = document.getElementsByName("password")[0];
var cpassword = document.getElementsByName("cpassword")[0];
var fnamevalid = false;
var snamevalid = false;
var emailvalid = false;
var passwordvalid = false;
var cpasswordvalid = false;
var signupvalid = false;

// forsignin
var email2 = document.getElementsByName("email2")[0];
var password2 = document.getElementsByName("password2")[0];
var signinbtn = document.getElementById("signin");
var signinvalid = false;
var email2valid = false;
var password2valid = false;


// forsendmessage
var names = document.getElementsByName("name")[0];
var email1 = document.getElementsByName("email1")[0];
var message = document.getElementsByName("message")[0];
var sendmessage = document.getElementById("sendmessage");
var sendmessagevalid = false;
var namevalid = false;
var email1valid = false;
var messagevalid = false;


// forreview
var message2 = document.getElementsByName("message2")[0];
var rating = document.getElementsByName("rating");
var sendreview = document.getElementById("sendreview");
var sendreviewvalid = false;
var ratingvalid = false;
var message2valid = false;


function seterror(field, text) {
    field.nextElementSibling.style.visibility = "visible";
    field.nextElementSibling.innerHTML = text;


}

function setsuccess(field) {
    field.nextElementSibling.style.visibility = "hidden";
    field.nextElementSibling.innerHTML = "";


}


// REVIEWVALIDATE
if(sendreview){
    sendreview.addEventListener("click", function (){

        var message2value = message2.value.trim();
        for (var r = 0; r < rating.length; r++) {
            if (rating[r].checked) {
                var ratingvalue = rating[r].value;
            } 
        }
    
    
    
        if (message2value.length == 0) {
            seterror(message2, "Please type your message");
            message2valid = false;
        }
        else {
            setsuccess(message2);
            message2valid = true;
        }
    
        if (ratingvalue){

            alert(ratingvalue);
            ratingvalid = true;
        }else{
            ratingvalue=5;
            ratingvalid = true;
            alert(ratingvalue);
        }
    
    
    
    
    
        if (ratingvalid == true && message2valid == true) {
            sendreviewvalid = true;
    
    
            var xmlr = new XMLHttpRequest();
            xmlr.onload = function () {
                var response = this.responseText;
                if (response.rated == true) {
                    alert("Rating Submitted");
                } else if (response.loggedin == false) {
                    window.location.href = "index.php?errormessage=Please log in to rate us";
                }
    
            }
            xmlr.open("POST", "rating.php");
            xmlr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlr.send(`rating=${ratingvalue}&message=${message2value}`);
    
        } else {
            alert("failed 4");
        }
    
    });
    
}



// MESSAGEVALIDATE
if (sendmessage) {
    sendmessage.addEventListener("click", function () {

        var email1value = email1.value.trim();
        var messagevalue = message.value.trim();
        var namevalue = names.value.trim();

        if (email1value.length == 0) {
            seterror(email1, "Please enter your email");
            email1valid = false;
        } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email1value)) {
            seterror(email1, "Email is invalid");
            email2valid = false;
        } else {
            setsuccess(email1);
            email1valid = true;
        }

        if (namevalue.length == 0) {
            seterror(names, "Please enter your name");
            namevalid = false;
        } else if (namevalue.length < 4) {
            seterror(names, "Name must be longer than 4 characters");
            namevalid = false;

        } else if (!/^[a-zA-Z\-\'\ ]+$/.test(namevalue)) {
            seterror(names, "Name is invalid");
            namevalid = false;
        } else {
            setsuccess(names);
            namevalid = true;
        }

        if (messagevalue.length == 0) {
            seterror(message, "Please type your message");
            messagevalid = false;
        }
        else {
            setsuccess(message);
            messagevalid = true;
        }




        if (email1valid == true && namevalid == true && messagevalid == true) {
            messagevalid = true;


            var xmlr = new XMLHttpRequest();
            xmlr.onload = function () {
                var response = this.responseText;
                response = JSON.parse(response);
                if (response.messagesent == true) {
                    alert("message sent");
                    names.value = "";
                    message.value = "";
                    email1.value = "";
                } else {
                    alert("message not sent");

                }

            }
            xmlr.open("POST", "sendmessage.php");
            xmlr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlr.send(`email=${email1value}&name=${namevalue}&message=${messagevalue}`);

        } else {
            alert("failed 2");
        }

    });
}




// SIGNUP_VALIDATE
if (signupbtn) {
    signupbtn.addEventListener("click", function () {
        var fnamevalue = fname.value.trim();
        var snamevalue = sname.value.trim();
        var emailvalue = email.value.trim();
        var passwordvalue = password.value.trim();
        var cpasswordvalue = cpassword.value.trim();


        if (fnamevalue.length == 0) {
            seterror(fname, "Please enter your first name");
            fnamevalid = false;
        } else if (fnamevalue.length < 4) {
            seterror(fname, "Name must be longer than 4 characters");
            fnamevalid = false;

        } else if (!/^[a-zA-Z\-\'\ ]+$/.test(fnamevalue)) {
            seterror(fname, "Name is invalid");
            fnamevalid = false;
        } else {
            setsuccess(fname);
            fnamevalid = true;
        }

        if (snamevalue.length == 0) {
            seterror(sname, "Please enter your surname");
            snamevalid = false;
        } else if (snamevalue.length < 4) {
            seterror(sname, "Name must be longer than 4 characters");
            snamevalid = false;

        } else if (!/^[a-zA-Z\-\'\ ]+$/.test(snamevalue)) {
            seterror(sname, "Name is invalid");
            snamevalid = false;
        } else {
            setsuccess(sname);
            snamevalid = true;
        }

        if (emailvalue.length == 0) {
            seterror(email, "Please enter your email");
            emailvalid = false;
        } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(emailvalue)) {
            seterror(email, "Email is invalid");
            emailvalid = false;
        } else {
            setsuccess(email);
            emailvalid = true;
        }

        if (passwordvalue.length == 0) {
            seterror(password, "Please enter your password");
            passwordvalid = false;
        } else if (passwordvalue.length < 6 || passwordvalue.length > 12) {
            seterror(password, "Password must be between 6-12 characters");
            passwordvalid = false;
        } else if (!/^[a-zA-Z0-9._-]+$/.test(passwordvalue)) {
            seterror(password, "Only numbers and letters allowed");
            passwordvalid = false;
        } else {
            setsuccess(password);
            passwordvalid = true;
        }

        if (cpasswordvalue.length == 0) {
            seterror(cpassword, "Please confirm your password");
            cpasswordvalid = false;
        } else if (cpasswordvalue.length < 6 || cpasswordvalue.length > 16) {
            seterror(cpassword, "Password must be between 6-16 characters");
            cpasswordvalid = false;
        } else if (!/^[a-zA-Z0-9._-]+$/.test(cpasswordvalue)) {
            seterror(cpassword, "Only numbers and letters allowed");
            cpasswordvalid = false;
        } else if (passwordvalue !== cpasswordvalue) {
            seterror(cpassword, "Passwords do not match");
            cpasswordvalid = false;
        } else {
            setsuccess(cpassword);
            cpasswordvalid = true;
        }



        if (fnamevalid == true && snamevalid == true && emailvalid == true && passwordvalid == true && cpasswordvalid == true) {
            signupvalid = true;

            var xmlr = new XMLHttpRequest();
            xmlr.onload = function () {
                var response = this.responseText;
                var response = this.responseText;
                response = JSON.parse(response);
                console.log(response);
                if (response.signedup == true) {
                    window.location.href = "index.php";

                } else {
                    if (response.accountexists == true) {
                        errormessage.style.opacity = "1";
                        errormessage.innerHTML = "Account with email already exists";
                    }
                    if (response.formvalid == false) {
                        if (response.fnamevalid == false) {
                            seterror(fname, "Name is invalid");

                        }
                        if (response.snamevalid == false) {
                            seterror(sname, "Name is invalid");

                        }
                        if (response.emailvalid == false) {
                            seterror(email, "Email is invalid");

                        }
                        if (response.passvalid == false) {
                            seterror(password, "Password is invalid");

                        }
                    }


                }


            }
            xmlr.open("POST", "signup.php");
            xmlr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlr.send(`fname=${fnamevalue}&sname=${snamevalue}&email=${emailvalue}&password=${passwordvalue}`);

        } else {
            // alert('failed');
        }


    });
}


// SIGNIN-VALIDATION
if (signinbtn) {
    signinbtn.addEventListener("click", function () {

        var email2value = email2.value.trim();
        var password2value = password2.value.trim();

        if (email2value.length == 0) {
            seterror(email2, "Please enter your email");
            email2valid = false;
        } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email2value)) {
            seterror(email2, "Email is invalid");
            email2valid = false;
        } else {
            setsuccess(email2);
            email2valid = true;
        }

        if (password2value.length == 0) {
            seterror(password2, "Please enter your password");
            password2valid = false;
        } else if (password2value.length < 6 || password2value.length > 16) {
            seterror(password2, "Password must be between 6-16 characters");
            passwordvalid2 = false;
        } else if (!/^[a-zA-Z0-9._-]+$/.test(password2value)) {
            seterror(password2, "Only numbers and letters allowed");
            password2valid = false;
        } else {
            setsuccess(password2);
            password2valid = true;
        }

        if (email2valid == true && password2valid == true) {
            signinvalid = true;


            var xmlr = new XMLHttpRequest();
            xmlr.onload = function () {
                var response = this.responseText;
                response = JSON.parse(response);
                if (response.signedin == true) {
                    window.location.href = "index.php";
                } else {
                    if (response.accountexists == true) {
                        window.location.href = "verify.php";
                    } else {
                        showsignin();
                        errormessage2.style.opacity = "1";
                        errormessage2.innerHTML = "Email and password do not match";
                    }

                    if (response.emailvalid == false) {
                        seterror(email2, "Email is invalid");
                    }
                    if (response.passvalid == false) {
                        seterror(password2, "Password is invalid");
                    }

                }

            }
            xmlr.open("POST", "signin.php");
            xmlr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlr.send(`email=${email2value}&password=${password2value}`);

        } else {
            // alert("failed 2");
        }

    });

}

// switchbtwn-signin-and-out 
function showsignintop() {
    window.location.href = "index.php#home";
    showsignin();

}


for (var a = 0; a < closeit.length; a++) {
    closeit[a].addEventListener("click", closeall);
}


for (var a = 0; a < change.length; a++) {
    change[a].addEventListener("click", changebox);
    change[a].addEventListener("doubleclick", function () { return });
}

function closeall() {
    hidesignin();
    hidesignup();
    state = 0;
    // cover.style.display = null;
}


function changebox() {
    if (state == 1) {
        showsignup();
    } else {
        showsignin();

    }
}


function showsignin() {
    if (signupbox) {
        if (signinbox) {
            hidesignup();
            setTimeout(function () {
                signinbox.style.opacity = "1";
            }, 5);
            signinbox.style.display = "block";
            state = 1;
        }
    }
    // cover.style.display = "block";

}

function showsignup() {
    if (signinbox) {
        if (signupbox) {
            hidesignin();
            setTimeout(function () {
                signupbox.style.opacity = "1";
            }, 5);
            signupbox.style.display = "block";
            state = 2;

        }
    }
}

function hidesignup() {
    setTimeout(function () {
        signupbox.style.display = null;
    }, 400);
    signupbox.style.opacity = "0";
}

function hidesignin() {
    setTimeout(function () {
        signinbox.style.display = null;
    }, 400);
    signinbox.style.opacity = "0";
}




if (navbar) {
    if (nav) {
        navbar.addEventListener("click", function () {
            nav.classList.toggle("active");
        })

    }
}

if (navbar2) {
    if (nav2) {
        navbar2.addEventListener("click", function () {
            nav2.classList.toggle("active");
        })
    }
}







window.addEventListener("scroll", changenav);
//    window.addEventListener("scroll",scrollspy);

//    function scrollspy(){
//        page.forEach(element => {
//            var height=element.scrollHeight;
//            var top=element.offsetTop;
//            if(window.pageYOffset>top && window.pageYOffset<top+height){
//                alert("hello");
//            }

//        });


//    }

function changenav() {
    if (home) {
        if (window.pageYOffset > home.scrollHeight) {
            nav.style.background = "rgb(34,64,36)";

        } else {
            nav.style.background = null;
        }
    }
}

if (show) {
    if (hide) {
        show.addEventListener("click", function () {
            // alert('clicked');
            hide.classList.toggle("hide");

        });



    }

}
