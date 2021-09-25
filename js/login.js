$('#pt').click(function () {
  var type = $('#pass').attr('type')
  if (type === 'password') {
    $('#pass').attr('type', 'text')
  } else {
    $('#pass').attr('type', 'password')
  }
})

$('#submit').click(function (e) {
  e.preventDefault()
  const email = $('#email').val()
  const pass = $('#pass').val()

  if (!email || !pass) {
    console.log('PLEASE FILL ALL FIELDS')
    $('.show').toggleClass('hide show')
    $('#error4').toggleClass('hide show')
  } else if (ValidateEmail(email)) {
    console.log('enter valid email address')
    $('.show').toggleClass('hide show')
    $('#error3').toggleClass('hide show')
  } else {
    $.ajax({
      url: '../php/login.php',
      type: 'POST',
      data: {
        email: email,
        pass: pass,
      },
      cache: false,
      success: function (dataResult) {
        console.log(dataResult)
        var dataResult = JSON.parse(dataResult)
        if (dataResult.statusCode == 200) {
          console.log('Login Successful')
          window.location = '../index.php'
        } else if (dataResult.statusCode == 201) {
          $('.show').toggleClass('hide show')
          $('#error2').toggleClass('hide show')
        } else if (dataResult.statusCode == 202) {
          $('.show').toggleClass('hide show')
          $('#error1').toggleClass('hide show')
        } else if (dataResult.statusCode == 203) {
          $('.show').toggleClass('hide show')
          $('#error5').toggleClass('hide show')
        }
      },
      error: function (ts) {
        console.log(ts)
      },
    })
  }
})

function ValidateEmail(mail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
    return false
  }
  return true
}
