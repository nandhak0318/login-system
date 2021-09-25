$(document).ready(view)

$('#edit').click(function () {
  $('.index-content').toggleClass('hide show')
})
$('#close').click(function () {
  $('.index-content').toggleClass('hide show')
})

function inputValidator(name) {
  if (!name) {
    return ''
  } else {
    return name
  }
}

$('#update').click(function () {
  let name = inputValidator($('#uname').val())
  let age = inputValidator($('#uage').val())
  let gender = inputValidator($('#ugender').val())
  let dob = inputValidator($('#udob').val())
  let contact = inputValidator($('#ucontact').val())
  let city = inputValidator($('#ucity').val())
  console.log(name, age, gender, dob)
  $.ajax({
    type: 'POST',
    url: './php/update.php',
    data: {
      name: name,
      age: age,
      gender: gender,
      city: city,
      dob: dob,
      contact: contact,
    },
    cache: false,
    success: function (response) {
      console.log(response)
      $('.index-content').toggleClass('hide show')
      view()
    },
  })
})

function view() {
  $.ajax({
    url: './php/view_data.php',
    type: 'POST',
    cache: false,
    success: function (dataResult) {
      console.log(dataResult)
      var dataResult = JSON.parse(dataResult)
      if (dataResult.statusCode == 200) {
        console.log('SUCCESBUL')
      } else if (dataResult.statusCode == 203) {
        console.log('Something went wrong')
      } else if (dataResult.res) {
        console.log(dataResult.res)
        let nName = 'Name: ' + dataResult.res.name
        let nAge = 'Age: ' + dataResult.res.age
        let nDob = 'DOB: ' + dataResult.res.dob
        let nGender = 'Gender: ' + dataResult.res.gender
        let nContact = 'Contact: ' + dataResult.res.contact
        let nCity = 'City: ' + dataResult.res.city
        $('#name').text(nName)
        $('#uname').val(dataResult.res.name)
        if (dataResult.res.age != null) {
          $('#age').text(nAge)
          $('#uage').val(dataResult.res.age)
        }
        if (dataResult.res.gender != null) {
          $('#gender').text(nGender)
          $('#ugender').val(dataResult.res.gender)
        }
        if (dataResult.res.dob != null) {
          $('#dob').text(nDob)
          $('#udob').val(dataResult.res.dob)
        }
        if (dataResult.res.contact != null) {
          $('#contact').text(nContact)
          $('#ucontact').val(dataResult.res.contact)
        }
        if (dataResult.res.city != null) {
          $('#city').text(nCity)
          $('#ucity').val(dataResult.res.city)
        }
      }
    },
  })
}
