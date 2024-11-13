$(document).ready(function() {
    // Toggle sign-in and sign-up forms
    $(".btn").click(function() {
        $(".form-signin").toggleClass("form-signin-left");
        $(".form-signup").toggleClass("form-signup-left");
        $(".frame").toggleClass("frame-long");
        $(".signup-inactive").toggleClass("signup-active");
        $(".forgot").toggleClass("forgot-left");   
        $(this).removeClass("idle").addClass("active");
    });

    // Sign up button click event
    $(".btn-signup").click(function() {
        // Optional: Alert for testing
        // alert("Sign Up button clicked!");

        // Add classes for animations
        $(".nav").toggleClass("nav-up");
        $(".form-signup").addClass("form-signup-left"); // Show the sign-up form
        $(".form-signin").removeClass("form-signin-left"); // Hide the sign-in form
        $(".success").toggleClass("success-left"); 
        $(".frame").toggleClass("frame-short");
    });

    // Sign in button click event
    $(".btn-signin").click(function() {
        // Animation classes for sign-in
        $(".btn-animate").toggleClass("btn-animate-grow");
        $(".welcome").toggleClass("welcome-left");
        $(".cover-photo").toggleClass("cover-photo-down");
        $(".frame").toggleClass("frame-short");
        $(".profile-photo").toggleClass("profile-photo-down");
        $(".btn-goback").toggleClass("btn-goback-up");
        $(".forgot").toggleClass("forgot-fade");
    });
});
