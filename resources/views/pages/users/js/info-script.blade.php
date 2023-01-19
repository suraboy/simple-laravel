<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script >
    let users = @json($users);
    $(document).ready(function () {
        //add class active for this menu
        $('#profile').addClass('active');

        initialInputUser(users)
    });

    function initialInputUser(users) {
        var idInput = $("input[name='_id']")
        var firstNameInput = $("input[name='firstname']")
        var lastNameInput = $("input[name='lastname']")
        var identityNumberInput = $('input[name="identity_number"]')
        var emailInput = $("input[name='email']")
        var mobileInput = $('input[name="telephone"]')
        var genderSelect = $('select[name="gender"]')
        var usernameInput = $("input[name='username']")
        var passwordInput = $('input[name="password"]')
        var confirmInput = $('input[name="confirm"]')
        var addressInput = $('input[name="address"]')
        var zipcodeInput = $('input[name="postcode"]')
        idInput.val(users._id);
        usernameInput.val(users.username);
        passwordInput.removeAttr('required');
        confirmInput.removeAttr('required');
        firstNameInput.val(users.firstname);
        lastNameInput.val(users.lastname);
        identityNumberInput.val(users.identity_number)
        genderSelect.val(users.gender).trigger('change')
        // nickNameInput.val(users.nick_name)
        emailInput.val(users.email)
        mobileInput.val(users.telephone)
        addressInput.val(users.address)
        zipcodeInput.val(users.postcode)
    }

</script>
