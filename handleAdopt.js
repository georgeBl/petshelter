
//wait for the document (DOM) to load - HTML Tags and PHP code and then run the script

$( document ).ready(function() {
    
    const   fullname = $('#fullname'),
            address1 = $('#address1'),
            address2 = $('#address2'),
            city = $('#city'),
            eircode = $('#eircode'),
            dob = $('#dob');

    const   fullnameError = $('#fullnameError'),
            address1Error = $('#address1Error'),
            address2Error = $('#address2Error'),
            cityError= $('#cityError'),
            eircodeError = $('#eircodeError'),
            dobError = $('#dobError');

            
    $("form").submit(function(e){
        fullnameError.text('');
        address1Error.text('');
        address2Error.text('');
        cityError.text('');
        eircodeError.text('');
        dobError.text('');

        // reasons to sanitize the input
        // XSS attacks - see https://remarkablemark.org/blog/2019/11/29/javascript-sanitize-html/
        // input value is too small - too big (a large amount of characters)
        // php insertion - etc. 

        let valid = true;
        if(fullname.val() === ''){
            // console.log('Full Name field is required');
            fullnameError.text("Full Name field is required");
            valid = false;
        }
        if(address1.val() === ''){
            // console.log('Address 1 field is required');
            address1Error.text('Address 1 field is required');
            valid = false;
        }
        if(city.val() === ''){
            // console.log('City field is required');
            cityError.text('City field is required');
            valid = false;
        }

        //check to see if dob is right format 
        if(dob.val() === ''){
            // console.log('Date of birth field is required');
            dobError.text('Date of birth field is required');
            valid = false;
        } else if (!isValidDate(dob.val())) {

            dobError.text('Date of birth field is invalid (DD/MM/YYYY)');
            valid = false;
        }

        if(valid === false){
            e.preventDefault();
        }
    });



});
// you could also use MOMENT JS
// Validates that the input string is a valid date formatted as "mm/dd/yyyy"
function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};