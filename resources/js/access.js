// $(document).ready(function(){
//     $("#submitUser").click(function(){
//         alert('click on submit');
//         var name = $("#name").val();
//         var email = $("#email").val();
//         var pin = $("#email").val();

//         $.ajax({
//             type:"POST",
//             url: "{{ route('store') }}",
//             data:{
//                 name:name,
//                 email:email,
//                 pin:pin,
//                 _token: '{{csrf_token()}}'
//             }
//         }).done(function(data){
//             console.log(data)
//         })
//     })
// })