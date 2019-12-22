function cekdaftar() {
    if (!$('#email1').val()) {
        alert('Email tidak boleh kosong  ');
        $("#email1").focus();
        return false;
    }
    if (!$('#no_hp').val()) {
        alert('No hp tidak boleh kosong  ');
        $("#no_hp").focus();
        return false;
    }
    if (!$('#password1').val()) {
        alert('Password tidak boleh kosong  ');
        $("#password1").focus();
        return false;
    }
    if ($('#password1').val().length != 6) {
        alert('Password minimal 6 karakter');
        $("#password1").focus();
        return false;
    }
}

function cekedituser() {
    if (!$('#emailu').val()) {
        alert('Email tidak boleh kosong  ');
        $("#emailu").focus();
        return false;
    }
    if (!$('#no_hpu').val()) {
        alert('No Hp tidak boleh kosong  ');
        $("#no_hpu").focus();
        return false;
    }
}

function ceklogin() {
    if (!$('#email').val()) {
        alert('Email tidak boleh kosong  ');
        $("#email").focus();
        return false;
    }
    if (!$('#password').val()) {
        alert('Password tidak boleh kosong  ');
        $("#password").focus();
        return false;
    }
    if ($('#password').val().length != 6) {
        alert('Password minimal 6 karakter');
        $("#password").focus();
        return false;
    }
}