function changeLanguage(locale) {
    $.ajax({
        url:"/Language/change/"+locale,
        type:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:(response) => {
            location.reload(); 
        }
    })
}
function showToast(Class,Title,Subtitle,Body){
    $(document).Toasts('create', {
    class:Class , 
    title:Title ,
    subtitle:Subtitle ,
    body: Body
  })
}