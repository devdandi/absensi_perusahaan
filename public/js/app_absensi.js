$(document).ready( () => {
    
    $.ajax({
        url:  "/admin/get-count-employee",
        type: "GET",
        success: (data) => {
            $('#getCountEmployee').text(data + " Orang")
        },
        beforeSend: () => {
            $('#getCountEmployee').text('Mengambil data')
        }
    })

    // $('#nik').on('change', () => {

    //     $.ajax({
    //         url: '/admin/karyawan/checkNIK',
    //         type: "GET",
    //         data: {
    //             nik: $('#nik').val()
    //         },
    //         success: (data) =>
    //         {
    //             console.log(data)
    //             $('#nik_message').text("NIK Telah Terdaftar")
    //         },
    //         beforeSend: () => {
    //           $('#nik_message').text('Memeriksa nik')  
    //         }
    //     })
    // })

})
function checkNIK(el)
{
    $.ajax({
        url: `/admin/karyawan/checknik/${el.value}`,
        type: "GET",
        success: (data) =>
        {
            if(data == true)
            {
                $('#nik_message').text("NIK Telah Terdaftar")
            }
        }
    })
}