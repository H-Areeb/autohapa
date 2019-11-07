$(document).ready(function() {
$('#Rpwd').keyup(function() {
$('#strengthcount').html(checkStrength($('#Rpwd').val()))
})
function checkStrength(password) {
var strength = 0;
if (password.length < 8) {
$('#meter').removeClass();
$('#meter').addClass('short');
return strength;
}
if (password.length > 8) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2

if (strength < 2) {
$('#meter').removeClass();
$('#meter').addClass('weak');
} else if (strength == 2 || strength == 3) {
$('#meter').removeClass();
$('#meter').addClass('good');
} else if (strength == 4) {
$('#meter').removeClass();
$('#meter').addClass('strong');
} else if (strength == 5) {
$('#meter').removeClass();
$('#meter').addClass('strong');
$('#meter').addClass('full');
}
return strength;
}
});