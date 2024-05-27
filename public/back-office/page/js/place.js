$(function () {
    let id = "";
    const table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/place',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'latitude', name: 'latitude' },
            { data: 'longitude', name: 'longitude' },
            { data: 'description_place', name: 'description_place' },
            { data: 'type_status', name: 'type_status' },
            { data: 'action', name: 'action' },
        ]
    });

    $('body').on('click', '.delete', function () {
        const id = $(this).data('id');
        swalConfirm("hapus", function () {
            $.ajax({
                url: `/place/delete/${id}`,
                type: 'GET',
                success: function (res) {
                    if (res.code == 200) {
                        swal("Berhasil", "Data berhasil dihapus!");
                        table.draw();
                    } else {
                        swal("Oops", res.message, "error");
                    }
                }
            })
        });
    });

    $('body').on('click', '.edit', function () {
        id = $(this).data('id');
        const name = $(this).data('name');
        const latitude = $(this).data('latitude');
        const longitude = $(this).data('longitude');
        const description = $(this).data('description');
        const status = $(this).data('status');

        $('.name').val(name);
        $('.latitude').val(latitude);
        $('.longitude').val(longitude);
        $('.description').html(description);
        $('.status').val(status);

        $('.title-modal').html('Edit Tempat');
        $('.action').html('Update');
        $('.action').attr('data-type', 'update');

        CKEDITOR.instances.ckeditor.setData(description);

        $('.bootstrap-wysihtml5-insert-link-modal').remove();
        $('.bootstrap-wysihtml5-insert-image-modal').remove();

        $('.modal').show();
    });

    $('body').on('click', '.add', function () {
        $('.title-modal').html('Tambah Tempat');
        $('.action').html('Tambah');
        $('.action').attr('data-type', 'store');

        $('.name').val('');
        $('.latitude').val('');
        $('.longitude').val('');
        $('.description').val('');
        $('.status').val('');

        $('.bootstrap-wysihtml5-insert-link-modal').remove();
        $('.bootstrap-wysihtml5-insert-image-modal').remove();

        $('.modal').show();
    });

    $('body').on('click', '.action', function () {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    
        const formData = $('#form-place').serialize();

        if ($(this).data('type') == "update") {
            action(`/place/update/${id}`, formData);
        }else{
            action(`/place/store`, formData);
        }
    });

    function action(url, data)
    {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (res) {
                if (res.code == 200) {
                    toast("Berhasil");
                    table.draw();
                    $('.modal').hide();
                } else {
                    swal("Oops", res.message, "error");
                }
            },
            error: function(xhr, status, error) {
                swal("Error", "Error occurred while updating data: " + error, "error");
            }
        });
    }
});