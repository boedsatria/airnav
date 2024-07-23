<script>
    // var table = $('.t-panjang').DataTable({
    //     // scrollY: '300px',
    //     paging: false,
    // });

    // $('a.toggle-vis').on('click', function(e) {
    //     e.preventDefault();

    //     // Get the column API object
    //     var column = table.column($(this).attr('data-column'));

    //     // Toggle the visibility
    //     column.visible(!column.visible());
    // });


    $('.fields_data').on('keypress', function(e) {
        var val = $(this).val();
        var id = $(this).data('id');
        var field = $(this).data('field');


        if (e.which == 13) {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>import/import_edit_action",
                data: {
                    'id': id,
                    'field': field,
                    'val': val,
                }

            });
        }



    });
</script>