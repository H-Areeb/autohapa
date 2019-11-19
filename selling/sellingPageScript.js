//for disabled select field until above isnt selected!
var linkOrder = [
    "cmbMake",
    "cmbModel",
    "cmbVariant",
    "cmbTrim",
    "cmbDerivative"
];
$('select.linked').not('#' + linkOrder[0]).attr('disabled', 'disabled');
$('.linked').change(function() {
    var id = $(this).attr('id');
    var index = $.inArray(id, linkOrder);
    $('#' + linkOrder[index + 1]).removeAttr('disabled');
});




function validateForm() {
    var errorCount = 0;

    if ($('#txtCarNumber').val() == '') {
        $('#txtCarNumberError').html("Please enter your vehicle's registration number.");
        //document.getElementById('txtCarNumberError').style.color = 'red';
        $('#txtCarNumberError').css({ 'display': 'block' });
    } else {
        $('#txtCarNumberError').html('');
        $('#txtCarNumberError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#txtMilage').val() == '') {
        $('#txtMilageError').html("Please enter your vehicle's milage.");
        //document.getElementById('txtMilageError').style.color = 'red';
        $('#txtMilageError').css({ 'display': 'block' });
    } else {
        $('#txtMilageError').html('');
        $('#txtMilageError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbMake').val() == '0') {
        $('#cmbMakeError').html("Please select your vehicle's  make.");
        //document.getElementById('cmbMakeError').style.color = 'red';
        $('#cmbMakeError').css({ 'display': 'block' });
    } else {
        $('#cmbMakeError').html('');
        $('#cmbMakeError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbModel').val() == '0') {
        $('#cmbModelError').html("Please select your vehicle's model.");
        //document.getElementById('cmbModelError').style.color = 'red';
        $('#cmbModelError').css({ 'display': 'block' });
    } else {
        $('#cmbModelError').html('');
        $('#cmbModelError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbVariant').val() == '0') {
        $('#cmbVariantError').html("Please select your vehicle's variant.");
        document.getElementById('cmbVariantError').style.color = 'red';
        $('#cmbVariantError').css({ 'display': 'block' });
    } else {
        $('#cmbVariantError').html('');
        $('#cmbVariantError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbTrim').val() == '0') {
        $('#cmbTrimError').html("Please select your vehicle's Trim.");
        //document.getElementById('cmbTrimError').style.color = 'red';
        $('#cmbTrimError').css({ 'display': 'block' });
    } else {
        $('#cmbTrimError').html('');
        $('#cmbTrimError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbDerivative').val() == '0') {
        $('#cmbDerivativeError').html("Please select your vehicle's derivative.");
        //document.getElementById('cmbDerivativeError').style.color = 'red';
        $('#cmbDerivativeError').css({ 'display': 'block' });
    } else {
        $('#cmbDerivativeError').html('');
        $('#cmbDerivativeError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbBodyType').val() == '0') {
        $('#cmbBodyTypeError').html("Please select your vehicle's body type.");
        //document.getElementById('cmbBodyTypeError').style.color = 'red';
        $('#cmbBodyTypeError').css({ 'display': 'block' });
    } else {
        $('#cmbBodyTypeError').html('');
        $('#cmbBodyTypeError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbTransmission').val() == '0') {
        $('#cmbTransmissionError').html("Please select your vehicle's transmission.");
        //document.getElementById('cmbTransmissionError').style.color = 'red';
        $('#cmbTransmissionError').css({ 'display': 'block' });
    } else {
        $('#cmbTransmissionError').html('');
        $('#cmbTransmissionError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbFuelType').val() == '0') {
        $('#cmbFuelTypeError').html("Please select your vehicle's fuel type.");
        //document.getElementById('cmbFuelTypeError').style.color = 'red';
        $('#cmbFuelTypeError').css({ 'display': 'block' });
    } else {
        $('#cmbFuelTypeError').html('');
        $('#cmbFuelTypeError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#cmbColour').val() == '0') {
        $('#cmbColourError').html("Please select your vehicle's colour.");
        //document.getElementById('cmbColourError').style.color = 'red';
        $('#cmbColourError').css({ 'display': 'block' });
    } else {
        $('#cmbColourError').html('');
        $('#cmbColourError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#txtCarRegistrationDate').val() == '') {
        $('#txtCarRegistrationDateError').html("Please enter your vehicle's first registration date.");
        //document.getElementById('txtCarRegistrationDateError').style.color = 'red';
        $('#txtCarRegistrationDateError').css({ 'display': 'block' });
    } else {
        $('#txtCarRegistrationNumberError').html('');
        $('#txtCarRegistrationDateError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if ($('#txtenginecc').val() == '') {
        $('#txtengineccError').html("Please enter your vehicle's CC power.");
        //document.getElementById('txtCarRegistrationDateError').style.color = 'red';
        $('#txtengineccError').css({ 'display': 'block' });
    } else {
        $('#txtengineccError').html('');
        $('#txtengineccError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }

    if (errorCount == 13) {

        insert_car_ad_data();


        //document.location.href = '../price/xyz?id='+result;

    }



}






$.ajax({
    type: "GET",
    url: "../ajax/ajax_get_carregistrationstep1data.php?type_id=" + $("#vtype_id").val(),
    dataType: "json",
    success: function(data) {

        $.each(data.make, function(i, obj) {
            var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
            $(div_data).appendTo('#cmbMake');
        });

        $.each(data.bodytype, function(i, obj) {
            var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
            $(div_data).appendTo('#cmbBodyType');
        });

        $.each(data.transmission, function(i, obj) {
            var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
            $(div_data).appendTo('#cmbTransmission');
        });

        $.each(data.fueltype, function(i, obj) {
            var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
            $(div_data).appendTo('#cmbFuelType');
        });

        $.each(data.colour, function(i, obj) {
            var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
            $(div_data).appendTo('#cmbColour');
        });
    }
});

function FillCarModels() {
    $.ajax({
        type: "GET",
        url: "../ajax/ajax_get_carmodel.php?makeid=" + $("#cmbMake").val() + "&type_id=" + $("#vtype_id").val(),
        dataType: "json",
        success: function(data) {
            var dropdown = $('#cmbModel');
            dropdown.empty();
            $('<option value="0">Please select</option>').appendTo('#cmbModel');
            $.each(data.model, function(i, obj) {
                var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                $(div_data).appendTo('#cmbModel');
            });
        }
    });
}


function FillCarVariant() {
    $.ajax({
        type: "GET",
        url: "../ajax/ajax_get_carvariant.php?modelid=" + $("#cmbModel").val() + "&type_id=" + $("#vtype_id").val(),
        dataType: "json",
        success: function(data) {
            var dropdown = $('#cmbVariant');
            dropdown.empty();
            $('<option value="0">Please select</option>').appendTo('#cmbVariant');
            $.each(data.variant, function(i, obj) {
                var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                $(div_data).appendTo('#cmbVariant');
            });
        }
    });
}

function FillCarTrim() {
    $.ajax({
        type: "GET",
        url: "../ajax/ajax_get_cartrim.php?variantid=" + $("#cmbVariant").val() + "&type_id=" + $("#vtype_id").val(),
        dataType: "json",
        success: function(data) {
            var dropdown = $('#cmbTrim');
            dropdown.empty();
            $('<option value="0">Please select</option>').appendTo('#cmbTrim');
            $('<option value="1">Not sure</option>').appendTo('#cmbTrim');
            $.each(data.trim, function(i, obj) {
                var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                $(div_data).appendTo('#cmbTrim');
            });

            var dropdown2 = $('#cmbDerivative');
            dropdown2.empty();
            $('<option value="0">Please select</option>').appendTo('#cmbDerivative');
            $('<option value="1">Not sure</option>').appendTo('#cmbDerivative');
            $.each(data.derivative, function(i, obj) {
                var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                $(div_data).appendTo('#cmbDerivative');
            });
        }
    });


}


function insert_car_ad_data() {
    //alert($("#type_id").val());

    if ($("#vtype_id").val() == 1) {

        //--- dataString for CAR------------------------------

        var dataString = "txtCarNumber=" + document.getElementById('txtCarNumber').value +
            "&txtMilage=" + document.getElementById('txtMilage').value +
            "&cmbMake=" + document.getElementById('cmbMake').value +
            "&cmbModel=" + document.getElementById('cmbModel').value +
            "&cmbVariant=" + document.getElementById('cmbVariant').value +
            "&cmbTrim=" + document.getElementById('cmbTrim').value +
            "&cmbDerivative=" + document.getElementById('cmbDerivative').value +
            "&cmbBodyType=" + document.getElementById('cmbBodyType').value +
            "&cmbTransmission=" + document.getElementById('cmbTransmission').value +
            "&hcaradid=" + document.getElementById('hcaradid').value +
            "&cmbFuelType=" + document.getElementById('cmbFuelType').value +
            "&cmbColour=" + document.getElementById('cmbColour').value +
            "&txtCarRegistrationDate=" + document.getElementById('txtCarRegistrationDate').value +
            "&type_id=" + $("#vtype_id").val() +
            "&newOrUsed=" + $("[name=NewOrUsed]:checked").val();

    } else if ($("#vtype_id").val() == 2) {

        //--- dataString for Bike ------------------------------

        var dataString = "txtCarNumber=" + document.getElementById('txtCarNumber').value +
            "&txtMilage=" + document.getElementById('txtMilage').value +
            "&cmbMake=" + document.getElementById('cmbMake').value +
            "&cmbModel=" + document.getElementById('cmbModel').value +
            "&cmbBodyType=" + document.getElementById('cmbBodyType').value +
            "&hcaradid=" + document.getElementById('hcaradid').value +
            "&cmbColour=" + document.getElementById('cmbColour').value +
            "&txtCarRegistrationDate=" + document.getElementById('txtCarRegistrationDate').value +
            "&type_id=" + $("#vtype_id").val() +
            "&enginecc=" + $("#txtenginecc").val() +
            "&newOrUsed=" + $("[name=NewOrUsed]:checked").val();


    } else if ($("#vtype_id").val() == 3) {

        //--- dataString for CAR------------------------------

        var dataString = "txtCarNumber=" + document.getElementById('txtCarNumber').value +
            "&txtMilage=" + document.getElementById('txtMilage').value +
            "&cmbMake=" + document.getElementById('cmbMake').value +
            "&cmbModel=" + document.getElementById('cmbModel').value +
            "&cmbVariant=" + document.getElementById('cmbVariant').value +
            "&cmbTrim=" + document.getElementById('cmbTrim').value +
            "&cmbDerivative=" + document.getElementById('cmbDerivative').value +
            "&cmbBodyType=" + document.getElementById('cmbBodyType').value +
            "&cmbTransmission=" + document.getElementById('cmbTransmission').value +
            "&hcaradid=" + document.getElementById('hcaradid').value +
            "&cmbFuelType=" + document.getElementById('cmbFuelType').value +
            "&cmbColour=" + document.getElementById('cmbColour').value +
            "&txtCarRegistrationDate=" + document.getElementById('txtCarRegistrationDate').value +
            "&type_id=" + $("#vtype_id").val() +
            "&newOrUsed=" + $("[name=NewOrUsed]:checked").val();

    } else if ($("#vtype_id").val() == 4) {

        //--- dataString for VAN--------------------------

        var dataString = "txtCarNumber=" + document.getElementById('txtCarNumber').value +
            "&txtMilage=" + document.getElementById('txtMilage').value +
            "&cmbMake=" + document.getElementById('cmbMake').value +
            "&cmbModel=" + document.getElementById('cmbModel').value +
            "&cmbDerivative=" + document.getElementById('cmbDerivative').value +
            "&cmbBodyType=" + document.getElementById('cmbBodyType').value +
            "&cmbTransmission=" + document.getElementById('cmbTransmission').value +
            "&hcaradid=" + document.getElementById('hcaradid').value +
            "&cmbFuelType=" + document.getElementById('cmbFuelType').value +
            "&cmbColour=" + document.getElementById('cmbColour').value +
            "&enginecc=" + $("#txtenginecc").val() +
            "&txtCarRegistrationDate=" + document.getElementById('txtCarRegistrationDate').value +
            "&type_id=" + $("#vtype_id").val() +
            "&newOrUsed=" + $("[name=NewOrUsed]:checked").val();

    }




    // alert("ajax_insert_ad_data.php?"+dataString);

    $.ajax({
        type: "POST",
        url: "../ajax/ajax_insert_ad_data.php",
        data: dataString,
        cache: false,
        success: function(result) {

            document.location.href = '../price/?regnum=' + $('#txtCarNumber').val() + "&type_id=" + $("#vtype_id").val();
        },
    });

}








$(function() {
    $('#txtCarRegistrationDate').datepicker({
        format: 'yyyy-mm-dd',
        endDate: '+0d',
        autoclose: true
    });
});
//$("#txtCarRegistrationDate").datepicker();