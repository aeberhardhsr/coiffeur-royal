// Function for Modal on Create Customer Button
$(document).ready(function () {
    $('.createcustomerbtn').on('click', function() {
         
        $('#createCustomerModal').modal('show');

    });
});

// Function for Modal on Edit Customer Button
$(document).ready(function () {
    $('.editcustomerbtn').on('click', function() {
         
        $('#editCustomerModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#editCustomerModal_id').val(data[0]);
            $('#editCustomerModal_name').val(data[1]);
            $('#editCustomerModal_vorname').val(data[2]);
            $('#editCustomerModal_street').val(data[3]);
            $('#editCustomerModal_plz').val(data[4]);
            $('#editCustomerModal_wohnort').val(data[5]);
            $('#editCustomerModal_phone').val(data[6]);
            $('#editCustomerModal_mail').val(data[7]);
    });
});

// Function for Modal on Delete Customer Button
$(document).ready(function () {
    $('.deletecustomerbtn').on('click', function() {
         
        $('#deleteCustomerModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteCustomerModal_id').val(data[0]);
            $('#deleteCustomerModal_name').val(data[1]);
            $('#deleteCustomerModal_vorname').val(data[2]);
            $('#deleteCustomerModal_street').val(data[3]);
            $('#deleteCustomerModal_plz').val(data[4]);
            $('#deleteCustomerModal_wohnort').val(data[5]);
            $('#deleteCustomerModal_phone').val(data[6]);
            $('#deleteCustomerModal_mail').val(data[7]);
    });
});

// Function for Modal on Create Product Button
$(document).ready(function () {
    $('.createproductbtn').on('click', function() {
         
        $('#createProductModal').modal('show');

    });
});

// Function for Modal on Edit Product Button
$(document).ready(function () {
    $('.editproductbtn').on('click', function() {
         
        $('#editProductModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#editProductModal_id').val(data[0]);
            $('#editProductModal_name').val(data[1]);
            $('#editProductModal_amount').val(data[2]);
            $('#editProductModal_purchaseprice').val(data[3]);
            $('#editProductModal_pricefactor').val(data[4]);
    });
});

// Function for Modal on Delete Product Button
$(document).ready(function () {
    $('.deleteproductbtn').on('click', function() {
         
        $('#deleteProductModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteProductModal_id').val(data[0]);
            $('#deleteProductModal_name').val(data[1]);
            $('#deleteProductModal_amount').val(data[2]);
            $('#deleteProductModal_purchaseprice').val(data[3]);
            $('#deleteProductModal_pricefactor').val(data[4]);
    });
});

// Function for Modal on Create Service Group Button
$(document).ready(function () {
    $('.createservicegroupbtn').on('click', function() {
         
        $('#createServiceGroupModal').modal('show');

    });
});

// Function for Modal on Edit Service Group Button
$(document).ready(function () {
    $('.editservicegroupbtn').on('click', function() {
         
        $('#editServiceGroupModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#editServiceGroupModal_id').val(data[0]);
            $('#editServiceGroupModal_name').val(data[1]);
    });
});

// Function for Modal on Delete Service Group Button
$(document).ready(function () {
    $('.deleteservicegroupbtn').on('click', function() {
         
        $('#deleteServiceGroupModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteServiceGroupModal_id').val(data[0]);
            $('#deleteServiceGroupModal_name').val(data[1]);
    });
});

// Function for Modal on Create Service Button
$(document).ready(function () {
    $('.createservicebtn').on('click', function() {
         
        $('#createServiceModal').modal('show');

    });
});

// Function for Modal on Edit Service Button
$(document).ready(function () {
    $('.editservicebtn').on('click', function() {
         
        $('#editServiceModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#editServiceModal_id').val(data[0]);
            $('#editServiceModal_name').val(data[1]);
            $('#editServiceModal_DLGroup').val(data[2]);
            $('#editServiceModal_duration').val(data[3]);
            $('#editServiceModal_factor').val(data[4]);
            $('#editServiceModal_consumption').val(data[5]);
            $('#editServiceModal_price_kg_liter').val(data[6]);
    });
});

// Function for Modal on Delete Service Button
$(document).ready(function () {
    $('.deleteservicebtn').on('click', function() {
         
        $('#deleteServiceModal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteServiceModal_id').val(data[0]);
            $('#deleteServiceModal_name').val(data[1]);
    });
});

// Function for Modal on Create Visit Note Button
$(document).ready(function () {
    $('.notevisitebtn').on('click', function() {
         
        $('#createVisitNoteModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#createVisitNoteModal_id').val(data[0]);
            $('#createVisitNoteModal_name').val(data[3]);

    });
});

// Function for Modal on Delete Visit Button
$(document).ready(function () {
    $('.deletevisitbtn').on('click', function() {
         
        $('#deleteVisitNoteModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteVisitNoteModal_id').val(data[0]);
            $('#deleteVisitModal_date').val(data[1]);
            $('#deleteVisitModal_name').val(data[2]);
            $('#deleteVisitNoteModal_note').val(data[3]);

    });
});
