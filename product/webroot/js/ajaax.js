$(document).on("click", ".btn-delete-student", function(){
    // alert('dgkhdfhg');
    
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");
    
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        
        // alert(postdata);
        $.ajax({
            url: "/users/deletestatus/"+postdata,
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
                
               $('#data'+postdata).hide();
               swal("Data Deleted Succesfully!", "You clicked the button!", "success");
            }
        });
    }
})

});

//====================== getting data in modal through ajax =================

$(document).on("click", ".editUser", function () {
    var user_id = $(this).data("id");
    console.log(user_id);
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            // console.log(user["user_profile"]["first_name"]);

            // hidden input for image and id
            $("#imagedd").val(user["user_profile"]["profile_image"]);
            $("#iddd").val(user["id"]);
            // hidden input for image and id

            var image = user["user_profile"]["profile_image"];
            document.querySelector("#showimg").setAttribute("src", "/upload/" + image);
            $("#firstname").val(
                user["user_profile"]["first_name"]
            );
            $("#lastname").val(user["user_profile"]["last_name"]);
            $("#contact").val(user["user_profile"]["contact"]);
            $("#address").val(user["user_profile"]["address"]);
            $("#email").val(user["email"]);
        },
    });
});



 //====================== update data in modal through ajax =================
 $(document).ready(function(){
 $("#useredit").validate({
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
    },
    messages: {
        first_name: {
            required: " Please enter your car company name",
        },
        last_name: {
            required: "Please enter your car description",
        },
    },
    submitHandler: function (form) {
        // alert("dddd");
        var formData = new FormData(form);
        var modal = 
        // alert("ddddddg");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            url: "/users/editProfile",
            type: "JSON",
            method: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                // console.log(response);
                // alert(response);
                var data = JSON.parse(response);
                if (data["status"] == 1) {
                    
                    swal("Good job!", "User details Has been updated!", "success");
                } else {
                    alert(data["message"]);
                }
            },
        });
        return false;
    },
});
});

 //====================== update data in modal through ajax =================
//  $("#useredit").validate({
//     rules: {
//         first_name: {
//             required: true,
//         },
//         last_name: {
//             required: true,
//         },
//     },
//     messages: {
//         first_name: {
//             required: " Please enter your car company name",
//         },
//         last_name: {
//             required: "Please enter your car description",
//         },
//     },
    
    // $(document).on("click", "#useredit", function () {
       
    //     var formData = new FormData(form);
    //     console.log(formData);
    //     $.ajax({
    //         // headers: {
    //         //     "X-CSRF-TOKEN": csrfToken,
    //         // },
    //         url: "/users/editProfile/",
    //         type: "JSON",
    //         method: "POST",
    //         cache: false,
    //         processData: false,
    //         contentType: false,
    //         data: formData,
    //         success: function(response) {
    //             // console.log(response);
    //             // alert(response);
    //             var data = JSON.parse(response);
    //             console.log(data);
    //             if (data["status"] == 0) {
    //                 alert(data["message"]);
    //             } else {
    //                 $("#ajaxeditUser").modal("hide");
    //                 // $("#ajaxeditUser").modal("hide");
    //                 swal("Good job!", "The car has been saved!", "success");
    //             }
    //         },
    //     });
    // });
    // submitHandler: function (form) {
    //     // alert("dddd");
    //     return false;
    // },
// });





// swal({
//     title: "Are you sure?",
//     text: "Once deleted, you will not be able to recover this imaginary file!",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//       swal("Poof! Your imaginary file has been deleted!", {
//         icon: "success",
//       });
//     } else {
//       swal("Your imaginary file is safe!");
//     }
//   });