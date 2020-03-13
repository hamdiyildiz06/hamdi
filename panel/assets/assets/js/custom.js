$(document).ready(function(){

    $(".sortable").sortable();

    $(".remove-btn").click(function () {
        $data_url = $(this).data("url");

        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Silinsin !',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.value) {
                window.location.href = $data_url;
            }
        })
    });

    $(".isActive").change(function () {
        var $data  = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url,{data : $data},function (response){});

        }
       return false;
    })

    $(".sortable").on("sortupdate", function (event, ui) {

        $data = $(this).sortable("serialize");
        $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function (response) {})
        
    })

});