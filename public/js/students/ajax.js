$(document).on('click', '.add-modal', function() {// Add Modal
    $('.modal-title').text('Add Student');
    $('#addModal').modal('show');
});

$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Edit Student');
    $('#id_edit').val($(this).data('id'));

    $('#firstname_edit').val($(this).data('firstname'));
    $('#lastname_edit').val($(this).data('lastname'));
    $('#id_number_edit').val($(this).data('id_number'));
    $('#sanc_number_edit').val($(this).data('sanc_number'));
    $('#physical_address_edit').val($(this).data('physical_address'));
    $('#postal_address_edit').val($(this).data('postal_address'));
    $('#place_of_employment_edit').val($(this).data('place_of_employment'));
    $('#date_of_registration_edit').val($(this).data('date_of_registration'));
    $('#programme_registered_edit').val($(this).data('programme_registered'));
    $('#allocation_edit').val($(this).data('allocation'));


    id = $('#id_edit').val();
    $('#editModal').modal('show');
});

// Add Button Clicck
$('.modal-footer').on('click', '.add', function() {
    $.ajax({
        type: 'POST',
        url: 'student-management',
        data: {
            '_token': $('input[name=_token]').val(),
            'firstname': $('input[name=firstname]').val(),
            'lastname': $('input[name=lastname]').val(),
            'id_number': $('input[name=id_number]').val(),
            'sanc_number': $('input[name=sanc_number]').val(),
            'physical_address': $('textarea[name=physical_address]').val(),
            'postal_address': $('textarea[name=postal_address]').val(),
            'place_of_employment': $('input[name=place_of_employment]').val(),
            'date_of_registration': $('input[name=date_of_registration]').val(),
            'programme_registered': $('input[name=programme_registered]').val(),
            'allocation': $('input[name=allocation]').val()
        },
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $('.errorfirstname').addClass('hidden');
            $('.errorlastname').addClass('hidden');
            $('.errorid_number').addClass('hidden');
            $('.errorsanc_number').addClass('hidden');
            $('.errorphysical_address').addClass('hidden');
            $('.errorpostal_address').addClass('hidden');
            $('.errorplace_of_employment').addClass('hidden');
            $('.errordate_of_registration').addClass('hidden');
            $('.errorprogramme_registered').addClass('hidden');
            $('.errorallocation').addClass('hidden');

            if ((data.errors)) {

                console.log(data.errors);
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.firstname) {
                    $('.errorfirstname').removeClass('hidden');
                    $('.errorfirstname').text(data.errors.firstname);
                }
                if (data.errors.lastname) {
                    $('.errorlastname').removeClass('hidden');
                    $('.errorlastname').text(data.errors.lastname);
                }
                if (data.errors.id_number) {
                    $('.errorid_number').removeClass('hidden');
                    $('.errorid_number').text(data.errors.id_number);
                }
                if (data.errors.sanc_number) {
                    $('.errorsanc_number').removeClass('hidden');
                    $('.errorsanc_number').text(data.errors.sanc_number);
                }
                if (data.errors.physical_address) {
                    $('.errorphysical_address').removeClass('hidden');
                    $('.errorphysical_address').text(data.errors.physical_address);
                }
                if (data.errors.postal_address) {
                    $('.errorpostal_address').removeClass('hidden');
                    $('.errorpostal_address').text(data.errors.postal_address);
                }
                if (data.errors.place_of_employment) {
                    $('.errorplace_of_employment').removeClass('hidden');
                    $('.errorplace_of_employment').text(data.errors.place_of_employment);
                }
                if (data.errors.date_of_registration) {
                    $('.errordate_of_registration').removeClass('hidden');
                    $('.errordate_of_registration').text(data.errors.date_of_registration);
                }
                if (data.errors.programme_registered) {
                    $('.errorprogramme_registered').removeClass('hidden');
                    $('.errorprogramme_registered').text(data.errors.programme_registered);
                }
                if (data.errors.allocation) {
                    $('.errorallocation').removeClass('hidden');
                    $('.errorallocation').text(data.errors.allocation);
                }
            } else {
                toastr.success('Successfully added Student!','Success A lert', {timeOut: 5000});
                // Refressh table
                $('#student-list').bootstrapTable('refresh', {
                    silent: true
                });
            }
        },
    });
});

// Edit Button Click
$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PUT',
        url: 'student-management/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_edit").val(),
            'firstname': $('#firstname_edit').val(),
            'lastname': $('#lastname_edit').val(),
            'id_number': $('#id_number_edit').val(),
            'sanc_number': $('#sanc_number_edit').val(),
            'physical_address': $('#physical_address_edit').val(),
            'postal_address': $('#postal_address_edit').val(),
            'place_of_employment': $('#place_of_employment_edit').val(),
            'date_of_registration': $('#date_of_registration_edit').val(),
            'programme_registered': $('#programme_registered_edit').val(),
            'allocation': $('#allocation_edit').val()
            
        },
        success: function(data) {
            $('.erroreditfirstname').addClass('hidden');
            $('.erroreditlastname').addClass('hidden');
            $('.erroreditid_number').addClass('hidden');
            $('.erroreditsanc_number').addClass('hidden');
            $('.erroreditphysical_address').addClass('hidden');
            $('.erroreditpostal_address').addClass('hidden');
            $('.erroreditplace_of_employment').addClass('hidden');
            $('.erroreditdate_of_registration').addClass('hidden');
            $('.erroreditprogramme_registered').addClass('hidden');
            $('.erroreditallocation').addClass('hidden');

            if ((data.errors)) {

                console.log(data.errors);
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.firstname) {
                    $('.erroreditfirstname').removeClass('hidden');
                    $('.erroreditfirstname').text(data.errors.firstname);
                }
                if (data.errors.lastname) {
                    $('.erroreditlastname').removeClass('hidden');
                    $('.erroreditlastname').text(data.errors.lastname);
                }
                if (data.errors.id_number) {
                    $('.erroreditid_number').removeClass('hidden');
                    $('.erroreditid_number').text(data.errors.id_number);
                }
                if (data.errors.sanc_number) {
                    $('.erroreditsanc_number').removeClass('hidden');
                    $('.erroreditsanc_number').text(data.errors.sanc_number);
                }
                if (data.errors.physical_address) {
                    $('.erroreditphysical_address').removeClass('hidden');
                    $('.erroreditphysical_address').text(data.errors.physical_address);
                }
                if (data.errors.postal_address) {
                    $('.erroreditpostal_address').removeClass('hidden');
                    $('.erroreditpostal_address').text(data.errors.postal_address);
                }
                if (data.errors.place_of_employment) {
                    $('.erroreditplace_of_employment').removeClass('hidden');
                    $('.erroreditplace_of_employment').text(data.errors.place_of_employment);
                }
                if (data.errors.date_of_registration) {
                    $('.erroreditdate_of_registration').removeClass('hidden');
                    $('.erroreditdate_of_registration').text(data.errors.date_of_registration);
                }
                if (data.errors.programme_registered) {
                    $('.erroreditprogramme_registered').removeClass('hidden');
                    $('.erroreditprogramme_registered').text(data.errors.programme_registered);
                }
                if (data.errors.allocation) {
                    $('.erroreditallocation').removeClass('hidden');
                    $('.erroreditallocation').text(data.errors.allocation);
                }
            } else {
                toastr.success('Successfully updated a Student!','Success A lert', {timeOut: 5000});
                // Refressh table
                $('#student-list').bootstrapTable('refresh', {
                    silent: true
                });
            }
        }
    });
});
// delete a post
$(document).on('click', '.delete-modal', function() {
    $('.modal-title').text('Delete Student');
    $('#id_delete').val($(this).data('id'));
    $('#firstname_delete').val($(this).data('firstname'));
    $('#lastname_delete').val($(this).data('lastname'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});

$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'DELETE',
        url: 'student-management/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Successfully deleted a Student!', 'Success Alert', {timeOut: 5000});
            $('#student-list').bootstrapTable('refresh', {
                    silent: true
            });
        }
    });
});

$(document).on('click', '.search-button', function(e) {
    e.preventDefault();

    console.log('searching....');

    $.ajax({
        type: 'POST',
        url: 'student-management/search',
        data: {
            '_token': $('input[name=_token]').val(),
            'sancnumber': $('input[name=sancnumber]').val(),
            'idnumber': $('input[name=idnumber]').val()
        },
        success: function(responce) {
            // toastr.success('Successfully deleted a Student!', 'Success Alert', {timeOut: 5000});
            console.log(responce);
            $('#student-list').bootstrapTable('destroy');

            $('#student-list').bootstrapTable({
                data: responce.data,
                url: '',
                sortable: true,
                sortOrder: 'asc',
                sortName: 'store0'
            });
        }
    });
});